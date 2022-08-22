<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Carbon\Carbon;
class ProductController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    public function index(){
        // $now = Carbon::now()->toDatetimeString();
        // echo $now;              // 2020-03-22 17:45:58
        dd('ok');        
        $user=product::all();
        return view('admin.module.apps.rolesPermission.app-access-permission',compact('user'));
    }
    public function create()
    {
        return view('admin.module.product.create');
    }
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        Product::create($request->all());
        return redirect('admin/product/list')
        ->with('success','Product created successfully.');
    } 
}
