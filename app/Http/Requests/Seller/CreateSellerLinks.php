<?php
namespace App\Http\Requests\Seller;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Seller\CheckUniqueLink;
class CreateSellerLinks extends FormRequest
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
        $a = new CheckUniqueLink($this->request);
        return [
            'fullName' => "required|min:1|max:191",
            'displayName' => "required|min:1|max:191",
            'link' => ['required', new CheckUniqueLink($this->request)],
            'image' => 'nullable|sometimes|image|mimes:jpeg,jpg,png|max:2048',
            'updateId' => "nullable|numeric",
        ];
    }
    public function messages()
    {
        return [
            'fullName.required' => __('Full Name is required'),
            'fullName.min' => __('Full Name should be between 1 to 191 characters'),
            'fullName.max' => __('Full Name should be between 1 to 191 characters'),
            'displayName.required' => __('Display Name is required'),
            'displayName.min' => __('Display Name should be between 1 to 191 characters'),
            'displayName.max' => __('Display Name should be between 1 to 191 characters'),
            'link.required' => __('Link is required'),
            'image.mimes' => __('link should be jpeg, jpg or png'),
            'image.max' => __('link should be less then 2Mb.'),
            'updateId.numeric' => __('Update ID should be numeric'),
        ];
    }
}
