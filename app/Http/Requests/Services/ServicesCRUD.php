<?php
namespace App\Http\Requests\Services;
use Illuminate\Foundation\Http\FormRequest;
class ServicesCRUD extends FormRequest
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
            'product_name' => 'required',
            'price' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' => __('Product name is required.'),
            'price.required' => __('Price is required.')
        ];
    }
}