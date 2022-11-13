<?php

namespace App\Http\Controllers\Api\payment;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\payment\CustomerPayment;

class CustomerPaymentController extends Controller
{
    public function payment(CustomerPayment $request){
        $data=$request->all();
        $query=Payment::create($data);
        if(isset($query) && !empty($query)){
            return response(['status'=>true,'message'=>'Data inserted Successfully']);
        }else{
            return response(['status',true,'message'=>'Data Not Found']);
        }
    }
}
