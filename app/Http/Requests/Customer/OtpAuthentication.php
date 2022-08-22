<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class OtpAuthentication extends FormRequest
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
            'email' => 'required|email|exists:customers',
            'macaddress' => 'required|MacAddress',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => __('Email is required.'),
            'email.email' => __('You need to provide valid email address.'),
            'email.exists' => __('Email not exist.'),
            'macaddress.required' => __('Mac address is required'),
            'macaddress.MacAddress' => __('Mac address is not valid'),
        ];
    }
}
