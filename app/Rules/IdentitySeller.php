<?php

namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;
// use App\Models\Seller;
use Illuminate\Http\Request;

class IdentitySeller implements Rule
{

    public function passes($attribute, $value)
    {
        $value = "";
        if((isset($this->request->email) && !empty($this->request->email)) || (isset($this->request->googleId) && !empty($this->request->googleId)) || (isset($this->request->appleId) && !empty($this->request->appleId))) {
            return true;
        }
        return false;
        // $user = User::where([['id', '!=', $this->request->updateId],['email', '=', $this->request->email]])->first();
        // if(!isset($user->id) || empty($user->id)) {
        //     return true;
        // }
    }
    public function message()
    {
        return '.';
    }
}
