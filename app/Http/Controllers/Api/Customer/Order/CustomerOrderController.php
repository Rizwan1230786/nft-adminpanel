<?php

namespace App\Http\Controllers\Api\Customer\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CustomerOrder;
use App\Models\Order;
use Illuminate\Http\Request;

class CustomerOrderController extends Controller
{
    public function customer_order(CustomerOrder $request){
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $data = $request->all();
        $customer_id = $request->user()->id;
        // $dataa = Order::select(['id', 'firstname', 'lastname', 'email', 'phoneno','card_number','expiry_date', 'cvc', 'zip_code', 'customer_id','amount'])->Where(['email' => $data["email"]])->first();
        // if (empty($dataa)) {
            $data = array_merge($data, array("firstname" => ($data["firstname"] ?? null)), array("lastname" => ($data["lastname"] ?? null)), array("email" => ($data["email"] ?? null)), array("amount" => ($data["amount"] ?? null)), array("phoneno" => ($data["phoneno"] ?? null)), array("card_number" => ($data["card_number"] ?? null)), array("expiry_date" => ($data["expiry_date"] ?? null)), array("cvc" => ($data["cvc"] ?? null)), array("zip_code" => ($data["zip_code"] ?? null)), array("customer_id" => ($customer_id ?? null)),);
            $data = Order::create($data);
            $data = Order::select('id', 'email', 'firstname', 'amount', 'phoneno')->where('id', $data->id)->first();
        // } else {
        //     $data = array_merge($data, array("firstname" => ($data["firstname"] ?? null)), array("lastname" => ($data["lastname"] ?? null)), array("email" => ($data["email"] ?? null)), array("amount" => ($data["amount"] ?? null)), array("phoneno" => ($data["phoneno"] ?? null)), array("card_number" => ($data["card_number"] ?? null)), array("expiry_date" => ($data["expiry_date"] ?? null)), array("cvc" => ($data["cvc"] ?? null)), array("zip_code" => ($data["zip_code"] ?? null)));
        //     $data = Order::where('id',$dataa->id)->update($data);
        //     $data = Order::select('id', 'email', 'firstname', 'amount', 'phoneno')->where('id', $data->id)->first();
        // }
        $statusCode = 200;
        $message = "Your payment is done!";
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 && $message == null ?: $message), "data" => ($data ?? array())], $statusCode);
    }
}
