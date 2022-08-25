<?php

namespace App\Http\Controllers\Api\Customer\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Customercreation;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Http\Traits\Helpers;
use Illuminate\Support\Facades\File;

/**
 * @group Customer app
 *
 * APIs endpoints for managing customer registration updation and login using otp
 */
class ProfileController extends Controller
{
    use Helpers;

    public function customer(Request $request)
    {
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $data = $request->all();
        $customerid = $request->user()->id;
        $data["is_verified"] = 1;
        $dataa = Customer::where("id", $customerid)->select('id', 'firstname', 'lastname', 'phoneno', 'email', 'dob', 'image')->first();
        if (isset($dataa->id) && !empty($dataa->id)) {
            $data = array_merge($data, array("firstname" => ($data["firstname"] ?? null)), array("lastname" => ($data["lastname"] ?? null)), array("phoneno" => ($data["phoneno"] ?? null)), array("dob" => ($data["dob"] ?? null)), array("image" => ($data["image"] ?? null)));
            $data["is_deleted"] = 0;
            if (isset($data['image']) && !empty($data['image'])) {
                $postImage['image'] = $data['image'];
                $oldimage =  Customer::find($customerid);
                if (isset($oldimage->image) && !empty($oldimage->image)) {
                    $oldimage = public_path(Config('constants.seller_profile_directory') . $oldimage->image);
                    if (File::exists($oldimage)) {
                        File::delete($oldimage);
                    }
                }
                $data['image'] = $imageName = time() . '.' . $data['image']->extension();
                $postImage['image']->move(public_path(Config('constants.seller_profile_directory')), $imageName);
            }
            $data = Customer::where("id", $customerid)->update($data);
            $data = Customer::where("id", $customerid)->select('id', 'firstname', 'lastname', 'phoneno', 'email', 'dob', 'image')->first();
            $statusCode = 200;
            $message = "Customer updated successfully!";
            if (isset($data->image) && !empty($data->image)) {
                $data->image = $this->imageDefaultPath(Config('constants.seller_profile_directory'), ($data->image ?? ""), Config('constants.seller_profile_directory'), $data->image);
            }
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 && $message == null ?: $message), "data" => ($data ?? array())], $statusCode);
    }
    public function customer_profile(Request $request)
    {
        $statusCode = 401;
        $message = "User not found!";
        $customer_id = $request->user()->id;
        if (isset($customer_id) && !empty($customer_id)) {
            $customer = Customer::where("id", $customer_id)->select('id', 'firstname', 'lastname', 'phoneno', 'email', 'dob', 'image')->first();
            $statusCode = 200;
            $message = "Here is your profile detail!";
            if (isset($customer) && !empty($customer)) {
                $customer->image = asset('/uploads/seller-profile/') . '/' . $customer->image;
            }
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 && $message == null ?: $message), "customer" => ($customer ?? array())], $statusCode);
    }
}
