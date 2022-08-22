<?php

namespace App\Repositories;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class SellerRepository
{
    public function create($request)
    {
        $loginData = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:admins',
            'phoneno' => 'required|min:11|unique:admins',
            'gender' => 'required',
            'password' => 'required|min:4',
        ]);
        if (isset($loginData) && $loginData->fails()) {
            return response()->json(['status' => false, 'message' => $loginData->errors()->first()]);
        } else {
            $data = $request->all();
            $data['password'] = Hash::make($request->password);
            $user = Admin::create($data);
        }
        return $user;
    }
    public function update($request, $id)
    {

        return;
    }
    public function delete($id)
    {
        $data = User::findOrFail($id);
        $user = $data->delete();
        return $user;
    }
}
