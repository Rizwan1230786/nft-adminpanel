<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerAuthenticationPIN extends FormRequest
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
        ];
    }
    public function messages()
    {
        return [
            'firstname.required' => __('First name is required.'),
            'lastname.required' => __('Last name is required.'),
            'email.required' => __('Email is required.'),
            'email.email' => __('You need to provide valid email address.'),
        ];
    }
}
