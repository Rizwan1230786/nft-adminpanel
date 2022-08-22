<?php
namespace App\Http\Requests\Seller;
use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Seller\CheckServiceList;
use App\Rules\Seller\GetSellerDetailFromLink;
use Illuminate\Http\Request;
class DeleteServicesFromLink extends FormRequest
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
            'linkId' => ["required", "numeric", new GetSellerDetailFromLink($this->request)],
            'service.*.id' => ['required', new CheckServiceList($this->request)],
            'service' => 'required|array|between:1,3',
        ];
    }
    public function messages()
    {
        return [
            'linkId.required' => __('Link ID is required'),
            'linkId.numeric' => __('Link ID must be numeric'),
            "service.*.id.required" => "Select the service",
            "service.required" => "Select the service",
            "service.array" => "Service detail should be in array",
            "service.between" => "Services link should be between 1 to 3",
        ];
    }
}
