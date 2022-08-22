<?php
namespace App\Rules\Seller;
use Illuminate\Contracts\Validation\Rule;
class CheckBarberSocialLink implements Rule
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
                if(!isset($item["social_link"]) || empty($item["social_link"])) {
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
