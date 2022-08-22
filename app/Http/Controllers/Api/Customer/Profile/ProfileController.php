<?php

namespace App\Http\Controllers\Api\Customer\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Customercreation;
use Illuminate\Http\Request;
use App\Models\Customer;

/**
 * @group Customer app
 *
 * APIs endpoints for managing customer registration updation and login using otp
 */
class ProfileController extends Controller
{
    public function customer(Request $request)
    {
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $data = $request->all();
        $customerid = $request->user()->id;
        $data["is_verified"] = 1;
        $dataa = Customer::where("id", $customerid)->select('id', 'firstname', 'lastname', 'phoneno', 'email', 'dob')->first();
        if (isset($dataa->id) && !empty($dataa->id)) {
            $data = array_merge($data, array("firstname" => ($data["firstname"] ?? null)), array("lastname" => ($data["lastname"] ?? null)), array("phoneno" => ($data["phoneno"] ?? null)), array("dob" => ($data["dob"] ?? null)));
            $data["is_deleted"] = 0;
            $data = Customer::where("id", $customerid)->update($data);
            $data = Customer::where("id", $customerid)->select('id', 'firstname', 'lastname', 'phoneno', 'email', 'dob')->first();
            $statusCode = 200;
            $message = "Customer updated successfully!";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 && $message == null ?: $message), "data" => ($data ?? array())], $statusCode);
    }
    public function customer_profile(Request $request)
    {
        $statusCode = 401;
        $message = "User not found!";
        $customer_id = $request->user()->id;
        if (isset($customer_id) && !empty($customer_id)) {
            $customer = Customer::where("id", $customer_id)->select('id', 'firstname', 'lastname', 'phoneno', 'email', 'dob')->first();
            $statusCode = 200;
            $message = "Here is your profile detail!";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 && $message == null ?: $message), "customer" => ($customer ?? array())], $statusCode);
    }
}
