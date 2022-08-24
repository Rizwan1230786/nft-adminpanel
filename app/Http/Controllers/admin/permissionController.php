<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class permissionController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index','show']]);
         $this->middleware('permission:permission-create', ['only' => ['create','submit']]);
         $this->middleware('permission:permission-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
    }
    public function index(){
        $assign =Permission::all();
        return view('admin.module.permission.index',compact('assign'));
    }
    public function create(){
        return view('admin.module.permission.edit-modal');
    }
    public function submit(Request $request){
        $request->validate([
            'name'=> 'required'
        ]);
        $type="error";
        $data=$request->all();
        $query=Permission::create($data);
        if(isset($query) && !empty($query)){
            $type="success";
            $message="Data Add Successfully";
        }
        return response()->json(['type'=>$type,'message'=>$message]);
    }
    public function edit($id){
        $permission=Permission::find($id);
        return view('admin.module.permission.create',compact('permission'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ]);
        $type="error";
        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->update();
        if(isset($permission) && !empty($permission)){
            $type="success";
            $message="Data Updated Successfully";
        }
        return response()->json(['type'=>$type,'message'=>$message]);
    }
    public function destroy($id){
        $delete=Permission::findorfail($id);
        $user=$delete->delete();
        if(isset($user) && !empty($user)){
            return response(['status' => true]);
        }else {
            return response(['status' => false]);
        }
    }
}
