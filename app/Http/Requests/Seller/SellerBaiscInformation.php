<?php

namespace App\Http\Requests\Seller;

use Illuminate\Foundation\Http\FormRequest;

class SellerBaiscInformation extends FormRequest
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
            'fullname' => 'required_without_all:displayname,theme,plan|min:1|max:191',
            'displayname' => 'required_without_all:fullname,theme,plan|min:1|max:191',
            'theme' => 'required_without_all:fullname,displayname,plan|in:light,dark',
            'plan' => 'required_without_all:fullname,displayname,theme|in:personal,gold',
        ];
    }
    public function messages()
    {
        return [
            'fullname.required' => __('Seller full name is required.'),
            'fullname.required_without_all' => __('Seller full name is required, if display name, theme or plan not given.'),
            'fullname.min' => __('Full name length should be 1.'),
            'fullname.max' => __('Full name length should be less then 191.'),
            'displayname.required' => __('Seller display name is required.'),
            'displayname.required_without_all' => __('Seller display name is required, if full name, theme or plan not given.'),
            'displayname.min' => __('Display name length should be 1.'),
            'displayname.max' => __('Display name length should be less then 191.'),
            'theme.required' => __('Select the app theme.'),
            'theme.required_without_all' => __('Theme is required if full name, display name or plan not given.'),
            'theme.in' => __('Theme should be light or dark'),
            'plan.required' => __('Select the plan'),
            'plan.required_without_all' => __('Plan is required if full name, display name or theme not given.'),
            'plan.in' => __('Plan should be personal or gold'),
        ];
    }
}
