<?php
namespace App\Http\Requests\Seller;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Seller\GetSellerDetailFromLink;
class DeleteSellerLink extends FormRequest
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
            'linkId' => ["required", "numeric", new GetSellerDetailFromLink($this->request)]
        ];
    }
    public function messages()
    {
        return [
            'linkId.required' => __('Link ID is required'),
            'linkId.numeric' => __('Link ID must be numeric'),
        ];
    }
}
