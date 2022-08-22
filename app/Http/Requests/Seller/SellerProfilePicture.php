<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

class SellerProfilePicture extends FormRequest
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
            'image' => 'image|required|mimes:jpeg,jpg,png|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'image.required' => __('Profile image is required.'),
            'image.mimes' => __('Image should be jpeg, jpg or png'),
            'image.max' => __('Image should be less then 2Mb.'),
        ];
    }
}
