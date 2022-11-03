<?php

namespace App\Http\Controllers\Api\Customer\Guest;

use Carbon\Carbon;
use App\Models\Customer;
use App\Models\DeviceOtp;
use App\Models\SellerLinks;
use App\Http\Traits\Helpers;
use App\Models\LinksService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Customer\GetLinkDetail;
use App\Http\Requests\Customer\OtpAuthentication;
use App\Http\Requests\Customer\CustomerAuthentication;
use App\Http\Requests\Customer\CustomerCreation;
use App\Http\Requests\Customer\walletAddress;
use Svg\Tag\Rect;

class CustomerGuestController extends Controller
{
    use Helpers;
    /**
     * Customer Login
     *
     * @bodyParam email email required Email address of customer. Example: abc@gmail.com
     * @bodyParam password string required password the customer. Example: 123456
     *
     * @response {
     *   "status": true/false,
     *   "message": string,
     *   "data": {
     *      "id": integer/null,
     *      "firstname": string/null,
     *      "lastname": string/null,
     *      "email": string/null,
     *      "phoneno": string/null,
     *      "dob": string/null
     *   },
     *   "access_token": string/null,
     *   "token_type": string/null
     * }
     *
     */

    public function signup(CustomerCreation $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $query = Customer::create($data);
        if ($query) {
            return response(['status' => true, 'message' => 'You are register successfully !!',]);
        } else {
            return response(['status' => false, 'message' => 'Fill the data in proper way!']);
        }
    }

    public function login(CustomerAuthentication $request)
    {

        if (Auth::guard('sellerService')->attempt(['email' => $request->email, 'password' => $request->password])) {

            $customer = Customer::select(["id", "firstname", "lastname", "email", "phoneno", "dob"])->Where(['email' => $request["email"]])->first();
            $data = Auth::guard('sellerService')->user();
            $token = $data->createToken('myapp')->accessToken;
            return response(['status' => true, 'message' => 'You are login successfully!!', 'user' => $customer, 'access_token' => $token ,'token_type' => 'Bearer']);
        } else {
            return response(['status' => false, 'message' => 'Please enter a correct email or password']);
        }
    }
    public function update_user(walletAddress $request){
        $id=Auth::user()->id;
        Customer::where('id',$id)->update(['wallet_address'=>$request->wallet_address]);
        return response(['status' => true, 'message' => 'Wallet Address updated successfully']);
    }
    // public function login(CustomerAuthentication $request)
    // {
    //     dd('ok');
    //     $statusCode = 401;
    //     $message = "Fill the data in proper way!";
    //     $token = "";
    //     $request = $request->all();
    //     $customer = Customer::select(["id", "firstname", "lastname", "email", "phoneno", "dob"])->Where(['email' => $request["email"]])->first();
    //     if (isset($customer->id) && !empty($customer->id) && isset($request['macaddress']) && !empty($request['macaddress']) && isset($request['otp']) && !empty($request['otp'])) {
    //         $deviceOtp = DeviceOtp::select(['id', 'code_expiry'])->Where(['customer_id' => $customer->id, "macaddress" => $request['macaddress'], "otp" => $request['otp']])->first();
    //         if (isset($deviceOtp->code_expiry) && !empty($deviceOtp->code_expiry) && $deviceOtp->code_expiry >= Carbon::now()->toDateTimeString()) {
    //             $statusCode = 200;
    //             $message = "Login successfully";
    //             Auth::guard('customer')->login($customer);
    //             $data = Auth::guard('customer')->user();
    //             $token = $data->createToken('auth_token')->accessToken;
    //             DeviceOtp::where("id", $deviceOtp->id)->update(array("is_verified" => "1"));
    //         } else {
    //             $customer = array();
    //             $message = "OTP code is expired";
    //         }
    //     }
    //     return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 ? 'Login Successfully' : $message), "data" => ($customer ?? array()), 'access_token' => $token, 'token_type' => 'Bearer'], $statusCode);
    // }
    /**
     * Send OTP Code
     *
     * @bodyParam email email required Email address of customer. Example: abc@gmail.com
     * @bodyParam macaddress string required Mac Address of customer device. Example: 96-D5-9E-67-40-AB
     *
     * @response {
     *   "status": true/false,
     *   "message": string/null,
     *   "deviceVerified": true/false,
     *   "data": {
     *       "id": integer/null,
     *       "firstname": string/null,
     *       "lastname": string/null,
     *       "email": string/null,
     *       "phoneno": string/null,
     *       "dob": string/null
     *   },
     *   "access_token": string/null,
     *   "token_type": string/null
     * }
     */
    public function sendOTPCode(OtpAuthentication $request)
    {
        $statusCode = 401;
        $token = "";
        $deviceVerified = false;
        $message = "Fill the data in proper way!";
        $request = $request->all();
        $email = $request["email"];
        $customer = Customer::select(["id", "firstname", "lastname", "email", "phoneno", "dob"])->Where(['email' => $request["email"]])->first();
        if (isset($customer->id) && !empty($customer->id) && isset($request['macaddress']) && !empty($request['macaddress'])) {
            $macAddress = $request["macaddress"];
            $statusCode = 200;
            $deviceOtp = DeviceOtp::select(['id', 'code_expiry', 'is_verified'])->Where(['customer_id' => $customer->id, "macaddress" => $request['macaddress']])->first();
            $sendOTP = true;
            $otpCode = rand(100000, 999999);
            if (isset($deviceOtp->id) && !empty($deviceOtp->id)) {
                if (isset($deviceOtp->is_verified) && !empty($deviceOtp->is_verified) && is_numeric($deviceOtp->is_verified) && $deviceOtp->is_verified > 0) {
                    $deviceVerified = true;
                    $sendOTP = false;
                    $message = "Device already verified";
                    Auth::guard('customer')->login($customer);
                    $data = Auth::guard('customer')->user();
                    $token = $data->createToken('auth_token')->accessToken;
                } else {
                    DeviceOtp::where('id', $deviceOtp->id)->update(array("otp" => $otpCode, "code_expiry" => Carbon::now()->addMinute(10), "is_verified" => "0"));
                    $message = "OTP code has been send to your email";
                    $customer = array();
                }
            } else {
                DeviceOtp::create(array("customer_id" => $customer->id, "email" => $email, "macaddress" => $macAddress, "otp" => $token, "code_expiry" => Carbon::now()->addMinute(10), "is_verified" => "0"));
                $message = "OTP code has been send to your email";
                $customer = array();
            }
            if ($sendOTP == true) {
                Mail::send('admin.email.Pin', ['token' => $otpCode], function ($message) use ($request) {
                    $message->to($request["email"]);
                    $message->subject('Verify Pin');
                });
            }
        } else {
            $customer = array();
            $message = "Server is unavailable, please try later.";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message, "deviceVerified" => $deviceVerified, "data" => ($customer ?? array()), 'access_token' => $token, 'token_type' => 'Bearer'], $statusCode);
    }
    /**
     * Get Link Detail
     *
     * @bodyParam LinkId and service parameter are required. Service should be array type and each row should be exist on id. Example: {"linkId": 1,"service": [{"id": 1},{"id": 2},{"id": 3}]}
     *
     * @response {
     *   "status": true/false,
     *   "message": string,
     * }
     *
     */
    function getLinkDetail(GetLinkDetail $request)
    {
        $statusCode = 401;
        $message = "Invalid information";
        $request = $request->all();
        if (isset($request['link']) && !empty($request['link'])) {
            $link  = $request['link'];
            $data = SellerLinks::select('id', 'link', 'fullname', 'displayname', 'image')->where(array('link' => $link))->first();
            if (isset($data) && !empty($data)) {
                $services = LinksService::where('link_id', $data->id)->with('getLinkServices')->get();
                if (!empty($services)) {
                    $temp = array();
                    foreach ($services as $innerItem) :
                        if (isset($innerItem["getLinkServices"]) && !empty($innerItem["getLinkServices"])) {
                            foreach ($innerItem["getLinkServices"] as $linkItem) :
                                $temp[] = array("linkServiceId" => ($innerItem["id"] ?? 0), "serviceId" => ($innerItem["service_id"] ?? 0), "name" => ($linkItem["product_name"] ?? null), "price" => ($linkItem["price"] ?? 0.00));
                            endforeach;
                        }
                    endforeach;
                    $services = $temp;
                }
                $data->services = $services;
                if (isset($data->image) && !empty($data->image)) {
                    $data->image = $this->imageDefaultPath(Config('constants.seller_link_directory'), ($data->image ?? ""), Config('constants.seller_link_directory'), $data->image);
                }
            }
            $statusCode = 200;
            $message = "Here is your links and services!";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 ? $message : $message), "data" => ($data ?? array())], $statusCode);
    }
}
