<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class CustomerOrder extends FormRequest
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
            'amount'=>'required',
            'email'=>'required|email',
            'firstname'=>'required',
            'lastname'=>'required',
            'phoneno'=>'required',
            'card_number'=>'required',
            'expiry_date'=>'required',
            'cvc'=>'required',
            'zip_code'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => __('Email is required.'),
            'email.email' => __('You need to provide valid email address.'),
            'firstname.required' => __('Firstname is required.'),
            'lastname.required' => __('lastname is required.'),
            'phoneno.required' => __('phoneno is required.'),
            'card_number.required' => __('card_number is required.'),
            'expiry_date.required' => __('expiry_date is required.'),
            'cvc.required' => __('cvc is required.'),
            'zip_code.required' => __('zip_code is required.'),
        ];
    }
}
