<?php

namespace App\Http\Requests\collection;

use Illuminate\Foundation\Http\FormRequest;

class Collections extends FormRequest
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
            'name' => 'required|min:4',
            'image' => 'required',
            'banner_image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('The name is required.'),
            'name.min' => __('The minimum length should be 4.'),
            'image.required' => __('Logo image is required.'),
            'banner_image.required' => __('Banner image is required.'),
        ];
    }
}
