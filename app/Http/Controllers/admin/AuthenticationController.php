<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function login_cover()
    {
        $pageConfigs = ['blankPage' => true];
        return view('admin.module.authentication.auth-login-cover', ['pageConfigs' => $pageConfigs]);
    }
    // public function forgotpassword(){
    //     return view('admin.module.authentication.auth-reset-password-basic');
    // }
    public function login(Request $request)
    {
        $type = 'error';
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|min:4',
            'password' => 'required|min:6',
        ]);
        if ($validator->passes()) {
            $credentials = $request->only('email', 'password');
            if (Auth::guard('web')->attempt($credentials)) {
                $status = Auth::guard('web')->user()->status;
                if (isset($status) && $status != 0) {
                    $type = 'success';
                    $message = "User Login Successfully";
                } else {
                    Auth::guard('web')->logout();
                    $message = "User is Unactive";
                }
            } else {
                $message = "Invalid Email/Password";
            }
        } else {
            $message = $validator->errors()->first();
        }
        return response()->json(['type' => $type, 'message' => $message]);
    }
    // logout funvtion
    public function logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect("/")->with('message', 'User logout');
        }
    }
    // status function
    public function status(Request $request)
    {
        $user = User::find($request->id);
        if (isset($user->role) && $user->role == 'admin') {
            return response(['status' => false]);
        } else {
            $user->status = $request->status;
            $user->save();
            return response()->json(['status' => true]);
        }
    }
}
