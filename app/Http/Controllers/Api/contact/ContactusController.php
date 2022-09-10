<?php

namespace App\Http\Controllers\Api\contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contactus;
use App\Http\Requests\contactus\contact;

class ContactusController extends Controller
{
    public function contactus(contact $request){
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $data = $request->all();
        $data = array_merge($data, array("name" => ($data["name"] ?? null)), array("email" => ($data["email"] ?? null)), array("subject" => ($data["subject"] ?? null)), array("message" => ($data["message"] ?? null)));
        $data = contactus::create($data);
        $statusCode = 200;
        $message = "Your request has been submited Support team contact you soon!";
        if(isset($data) && !empty($data)){
            return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 && $message == null ?: $message)], $statusCode);
        }else{
            return response(['status'=>true,'message'=>$message]);
        }
    }
}
