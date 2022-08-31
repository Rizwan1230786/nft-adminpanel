<?php

namespace App\Http\Controllers\admin\customer;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:customer-list', ['only' => ['customer_list', 'show']]);
    }
    public function customer_list(){
        $pageConfigs = ['pageHeader' => false];
        $client = Customer::all();
        return view('admin.module.customer.customer-list', compact('client'));
    }
    public function create()
    {
        return view('admin.module.customer.create');
    }
    public function submit(Request $request)
    {
        $type = 'error';
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'phoneno' => 'required',
            'dob' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            $message = $validator->errors()->first();
        } else {
            $data = $request->except('_token');
            $imageName = time() . '.' . $request->image->extension();
            $data['image'] = $imageName;
            $data['password'] = Hash::make($data['password']);
            Customer::create($data);
            $request->image->move(public_path('uploads/seller-profile/'), $imageName);
            $type = "success";
            $message = "Customer Added Successfully";
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    public function edit($id)
    {
        $breadcrumbs = [
            ['link' => "/", 'name' => "Home"], ['link' => "javascript:void(0)", 'name' => "Forms"], ['name' => "Form Layouts"]
        ];
        $users = Customer::find($id);
        return view('admin.module.customer.create', [
            'breadcrumbs' => $breadcrumbs, 'users' => $users
        ]);
    }

}
