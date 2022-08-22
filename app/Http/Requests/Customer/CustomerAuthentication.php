<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAuthentication extends FormRequest
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
            'email' => 'required|email|exists:customers,email',
            'macaddress' => 'required|MacAddress',
            'otp' => 'required|min:6|max:6',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => __('Email is required.'),
            'email.email' => __('You need to provide valid email address.'),
            'email.exists' => __('Email not exist.'),
            'macaddress.required' => __('Mac address required'),
            'macaddress.MacAddress' => __('Mac address is not valid'),
            'otp.required' => __('OTP code is required'),
            'otp.min' => __('OTP should be 6 digit'),
            'otp.max' => __('OTP should be 6 digit'),
        ];
    }
}
