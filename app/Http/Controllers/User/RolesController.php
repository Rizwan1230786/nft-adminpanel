<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class RolesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index', 'submit']]);
        $this->middleware('permission:role-create', ['only' => ['create', 'submit']]);
        $this->middleware('permission:role-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $roles = Role::all();
        return view('admin/module/apps/user/roles', compact('roles'));
    }
    public function create()
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "Form Layouts"]
        ];
        $permission = Permission::get();
        return view('admin/module/forms/roles-form', compact('permission'));
    }
    public function submit(Request $request)
    {
        $type = 'error';
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        if ($validator->fails()) {
            $message = "This name is already exist";
        } else {
            $role = Role::create(array('name' => $request->input('name')));
            $role->syncPermissions($request->input('permission'));
            $type = 'success';
            $message = "Data Add Successfully";
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    public function edit($id)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "Form Layouts"]
        ];
        $roles = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin/module/forms/roles-form', [
            'breadcrumbs' => $breadcrumbs, 'roles' => $roles, 'permission' => $permission, 'rolePermissions' => $rolePermissions
        ]);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $type = 'error';
        if ($validator->fails()) {
            $message = $validator->errors()->first();
        } else {
            $role = Role::find($id);
            $role->name = $request->input('name');
            $role->save();
            $role->syncPermissions($request->input('permission'));
            $type = 'success';
            $message = "Data Updated Successfully";
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    public function destroy($id)
    {
        $data = Role::findOrFail($id);
        if(isset($data->name) && $data->name !='admin'){
            $user = $data->delete();
            if (isset($user) && !empty($user)) {
                return response(['status' => true]);
            } else {
                return response(['status' => false]);
            }
        }else{
            return response(['status' => false]);  
        }
       
    }
}
