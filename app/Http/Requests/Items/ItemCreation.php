<?php

namespace App\Http\Requests\Items;

use Illuminate\Foundation\Http\FormRequest;

class ItemCreation extends FormRequest
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
            'name' => 'min:4|required',
            'price' => 'required',
            'size' => 'required',
            'image' => 'required',
            'no_of_copies' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Name is required.'),
            'name.min' => __('Minimum length should be 4.'),
            'price.required' => __('Price is required.'),
            'size.required' => __('Size is required.'),
            'image.required' => __('Image is required.'),
            'no_of_copies.required' => __('No of copies is required.'),
        ];
    }
}
