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
            'password' => 'required|min:6|',
        ];
    }
    public function messages()
    {
        return [
            'email.required' => __('Email is required.'),
            'email.email' => __('You need to provide valid email address.'),
            'email.exists' => __('Email not exist.'),
            'password.required' => __('Password is required'),
            'password.min' => __('Password should be atleast 6 digit'),
        ];
    }
}
