<?php

namespace App\Rules\Seller;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Services;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

class CheckServiceList implements Rule
{
    public $product;
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function passes($attribute, $value)
    {
        $response  = false;
        $services = ($this->request->get('service') ?? array());
        $sellerId = (Auth::id() ?? 0);
        if (!empty($services)) {
            $response =  true;
            foreach ($this->request->get('service') as $item):
                if (!isset($item["id"]) || empty($item["id"]) || !is_numeric($item["id"])) {
                    $response = false;
                    $this->message();
                    break;
                } else {
                    $record = Services::where([['seller_id', '=', $sellerId],['id', '=', ($item["id"] ?? "")]])->first();
                    if (!isset($record->id) || empty($record->id)) {
                        $response = false;
                        $this->message();
                        break;
                    }
                }
            endforeach;
        }
        return $response;
    }
    public function message()
    {
        return 'Select the service or selected service not available';
    }
}
