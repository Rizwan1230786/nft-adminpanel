<?php

namespace App\Http\Requests\Barber;

use Illuminate\Foundation\Http\FormRequest;

class BarberSocialLinks extends FormRequest
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
            'facebook_link' => 'required',
            'instagram_link' => 'required',
            'tiktok_link' => 'required',
            'twitter_link' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'facebook_link.required' => __('Facebook link is required.'),
            'instagram_link.required' => __('Instagram link is required.'),
            'tiktok_link.required' => __('Tiktok link is required.'),
            'twitter_link.required' => __('Twitter link is required.'),
        ];
    }
}
