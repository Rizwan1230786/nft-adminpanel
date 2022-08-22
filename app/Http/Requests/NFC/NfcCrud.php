<?php
namespace App\Http\Requests\NFC;
use Illuminate\Foundation\Http\FormRequest;
class NfcCrud extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:nfc_requests',
            'contact' => 'required',
            'detail' => 'required',
            'shop_name' => 'required',
            'address' => 'required', 
        ];
    }
    public function messages()
    {
        return [
            'name.required' => __('The name is required.'),
            'email.required' => __('The Email is required.'),
            'email.unique' => __('Provided email is already taken.'),
            'contact.required' => __('The contact is required.'),
            'detail.required' => __('The detail is required.'),
            'shop_name.required' => __('The shope name is required.'),
            'address.required' => __('The Address is required.'),
        ];
    }
}