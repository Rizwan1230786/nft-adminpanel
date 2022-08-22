<?php

namespace App\Http\Requests\Barber;

use Illuminate\Foundation\Http\FormRequest;

class BarberProfile extends FormRequest
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
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'social_link' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'image.required' => __('Image is required.'),
            'image.mimes' => __('Image extension must be jpeg,png,jpg,gif,svg.'),
            'image.max' => __('Image size must be lower then 2048kb.'),
            'social_link.required' => __('Social links are required.'),
        ];
    }
}
