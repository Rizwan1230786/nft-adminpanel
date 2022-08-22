<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

class SellerSubscription extends FormRequest
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
            'profile' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'theme' => 'required',
            'account_type' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'profile.required' => __('Picture is required.'),
            'profile.mimes' => __('Image extension must be jpeg,png,jpg,gif,svg.'),
            'profile.max' => __('Image size must be lower then 2048kb.'),
            'theme.required' => __('Theme color is required.'),
            'account_type.required' => __('Account type is required gold/personal.'),
        
        ];
    }
}
