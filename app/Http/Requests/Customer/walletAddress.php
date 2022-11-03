<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class walletAddress extends FormRequest
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
            'wallet_address' => 'required|unique:customers',
        ];
    }
    public function messages()
    {
        return [
            'wallet_address.required' => __('Wallet address is required.'),
            'wallet_address.unique' => __('Wallet address alredy exist.')
        ];
    }
}
