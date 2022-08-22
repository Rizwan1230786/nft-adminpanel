<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }
    public function index()
    {

        $pageConfigs = ['pageHeader' => false];
        $user = User::all();
        return view('admin/module/apps/user/app-user-list', compact('pageConfigs', 'user'));
    }
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "Form Layouts"]
        ];
        $roles = Role::all();
        return view('admin/module/forms/user-form', [
            'breadcrumbs' => $breadcrumbs, 'roles' => $roles
        ]);
    }
    public function submit(Request $request)
    {
        $type = 'error';
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required|unique:users',
            'contact' => 'required',
            'company' => 'required',
            'country' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            $message = $validator->errors()->first();
        } else {
            $data = $request->except('_token');
            $imageName = time() . '.' . $request->photo->extension();
            $data['photo'] = $imageName;
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            $request->photo->move(public_path('profile'), $imageName);
            $type = "success";
            $message = "User Added Successfully";
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    public function edit($id)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "Form Layouts"]
        ];
        $roles = Role::all();
        $users = User::find($id);
        return view('admin/module/forms/user-form', [
            'breadcrumbs' => $breadcrumbs, 'roles' => $roles, 'users' => $users
        ]);
    }
    public function update(Request $request, $id)
    {
        $type = 'error';
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'username' => 'required',
            'contact' => 'required',
            'company' => 'required',
            'country' => 'required',
            'role' => 'required',
        ]);
        if ($validator->passes()) {
            $data = $request->except('_token');
            if (isset($data['photo']) && !empty($data['photo'])) {
                $oldimage=User::find($id);
                if(isset($oldimage->photo) && !empty($oldimage->photo)){
                    $oldimage = public_path('profile/' .$oldimage->photo);
                    if (File::exists($oldimage)) {
                        File::delete($oldimage);
                    }
                }
                $imageName = time() . '.' .$data['photo']->extension();
                $data['photo'] = $imageName;
                $request->photo->move(public_path('profile'), $imageName);
            }
            $query = User::where("id", $id)->update($data);
            if (isset($query) && !empty($query)) {
                $type = 'success';
                $message = "Data Updated Successfully";
            }
        } else {
            $message = $validator->errors()->toArray();
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    public function destory($id)
    {
        $data = User::findOrFail($id);
        if (isset($data->role) && $data->role != 'admin') {
            $oldimage = public_path('profile/' . $data->photo);
            if (File::exists($oldimage)) {
                File::delete($oldimage);
            }
            $user = $data->delete();
            if ($user) {
                return response(['status' => true]);
            } else {
                return response(['status' => false]);
            }
        } else {
            return response(['status' => false]);
        }
    }
}
