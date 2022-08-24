<?php

namespace App\Http\Controllers\admin\customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:customer-list', ['only' => ['customer_list', 'show']]);
    }
    public function customer_list(){
        $pageConfigs = ['pageHeader' => false];
        $client = Customer::all();
        return view('/admin/module/customer/customer-list', compact('client'));
    }
    public function create()
    {
        return view('/admin/module/customer/create');
    }
}
