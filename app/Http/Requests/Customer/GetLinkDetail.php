<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class GetLinkDetail extends FormRequest
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
            'link' => 'min:2|required|exists:seller_links,link',
        ];
    }
    public function messages()
    {
        return [
            'link.required' => __('Link is required'),
            'link.min' => __('Link should be greater then 2'),
            'link.exists' => __('The given link is not available'),
        ];
    }
}
