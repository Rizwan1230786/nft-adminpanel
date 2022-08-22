<?php

namespace App\Http\Controllers\Api\Seller\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\ChangePassword;
use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change_password(ChangePassword $request)
    {
        $statusCode = 401;
        $message = "Invalid information";
        $postData = $request->all();
        $email['email'] = $request->user()->email;
        $data = Seller::select(['id', 'email', 'password'])->where($email)->first();
        if (isset($data->id) && !empty($data->id)) {
            if (isset($email["email"]) && !empty($email["email"])) {
                if (isset($postData["old_password"]) && !empty($postData["old_password"])) {
                    $nextContinue = Hash::check($postData["old_password"], $data->password);
                }
            }
            if ($nextContinue == true) {
                $password = Hash::make($postData["new_password"]);
                Seller::where("id", $data->id)->update(array("password" => $password));
                $data = Seller::select(['id', 'fullname', 'email', 'password'])->where('id', $data->id)->first();
                $message = "Password changed!";
                $statusCode = 200;
            } else {
                $message = "Invalid Old Password!";
            }
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 ? $message : $message), "data" => ($data ?? array())], $statusCode);
    }
}
