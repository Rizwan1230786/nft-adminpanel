<?php

namespace App\Http\Requests\Seller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Seller\CheckServiceProductForName;

class ServicesProducts extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function __construct($request)
    {
        $this->request = $request;
    }
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
            'data' => ['required', new CheckServiceProductForName($this->request)],
        ];
    }
    public function messages()
    {
        return [
            'data.required' => __('Fill the form properly'),
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
