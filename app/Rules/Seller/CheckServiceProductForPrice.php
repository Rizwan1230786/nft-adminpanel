<?php
namespace App\Rules\Seller;
use Illuminate\Contracts\Validation\Rule;
class CheckServiceProductForPrice implements Rule
{
    public function __construct($request)
    {
        $this->request = $request;
    }
    public function passes($attribute, $value)
    {
        $response  = true;
        if(isset($this->request->data) && !empty($this->request->data)) {
            foreach($this->request->data as $item):
                if(!isset($item["price"]) || empty($item["price"])) {
                    $response = true;
                    $this->message();
                    break;
                }
            endforeach;
        }
        return $response;
    }
    public function message()
    {
        return '.';
    }
}
