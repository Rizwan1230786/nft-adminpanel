<?php

namespace App\Http\Requests\payment;

use Illuminate\Foundation\Http\FormRequest;

class CustomerPayment extends FormRequest
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
            'wallet_from' => 'required',
            'wallet_to' => 'required',
            'payment' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'wallet_from.required' => __('Wallet from is required.'),
            'wallet_to.required' => __('Wallet to is required'),
            'payment.required' => __('Payment to is required'),

        ];
    }
}
