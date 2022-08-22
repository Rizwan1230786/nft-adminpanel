<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

class SellerRegistration extends FormRequest
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
            'email' => 'required_without_all:google_id,apple_id|email',
            'google_id' => 'required_without_all:email,apple_id',
            'apple_id' => 'required_without_all:email,google_id',
            'password' => 'required_with:email|min:4|max:100',
            'account_type' => 'required|in:seller',
            'image' => 'nullable'
        ];
    }
    public function messages()
    {
        return [
            'password.required_with' => __('Password is required with provided email.'),
            'email.required_without_all' => __('The email field is required when none of google_id / apple_id are present.'),
            'google_id.required_without_all' => __('The google_id field is required when none of email / apple_id are present.'),
            'apple_id.required_without_all' => __('The apple_id field is required when none of email / google_id are present.'),
            'email.email' => __('You need to provide valid email address.'),
            'email.unique' => __('Provided email is already taken.'),
            'google_id.unique' => __('Provided google account is already linked.'),
            'apple_id.unique' => __('Provided apple account is already linked.'),
            'password.min' => __('Password length should be 4.'),
            'password.max' => __('Password length should be less then 100.'),
            'password.required' => __('Password length should be less then 100.'),
            'account_type.required' => __('Account Type is required.'),
            'account_type.in' => __('Account Type should be seller')
        ];
    }
}
