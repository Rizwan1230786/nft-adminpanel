<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class Customercreation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => 'required|min:3',
            'lastname' => 'required',
            'email' => 'required|email|unique:customers',
            'phoneno' => 'required',
            'dob' => 'required',
            'password' => 'required|min:6',
        ];
    }
    public function messages()
    {
        return [
            'firstname.required' => __('First name is required.'),
            'firstname.min' => __('Minimum length should be 3.'),
            'lastname.required' => __('Last name is required.'),
            'email.required' => __('Email is required'),
            'email.email' => __('You need to provide valid email address.'),
            'email.unique' => __('Provided email is already taken.'),
            'phoneno.required' => __('Phone number is required.'),
            'dob.required' => __('Date of birth is required.'),
            'password.required' => __('Password is Required'),
            'password.min' => __('Minimum length should be 6 of password.'),
        ];
    }
}
