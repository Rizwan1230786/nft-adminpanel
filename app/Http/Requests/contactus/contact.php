<?php

namespace App\Http\Requests\contactus;

use Illuminate\Foundation\Http\FormRequest;

class contact extends FormRequest
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
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Name is required.'),
            'name.min' => __('Minimum length should be 4.'),
            'email.required' => __('Email is required.'),
            'subject.required' => __('Please enter subject.'),
            'message.required' => __('Message is required.'),
        ];
    }
}
