<?php

namespace App\Rules\Seller;

use Illuminate\Contracts\Validation\Rule;
use App\Models\SellerLinks;

class CheckUniqueLink implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $record = SellerLinks::where([['id', '!=', ($this->request->get("id") ?? 0)],['link', '=', ($this->request->get("link") ?? "")]])->first();
        if(!isset($record->id) || empty($record->id)) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Link already reserved, choose the another.';
    }
}
