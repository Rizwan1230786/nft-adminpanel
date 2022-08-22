<?php

namespace App\Rules\Seller;

use Illuminate\Contracts\Validation\Rule;
use App\Models\SellerLinks;
use Illuminate\Support\Facades\Auth;
class GetSellerDetailFromLink implements Rule
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
        $record = SellerLinks::where([['seller_id', '=', Auth::id()],['id', '=', ($this->request->get('linkId') ?? "")]])->first();
        if(isset($record->id) && !empty($record->id)) {
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
        return "You don't have permission to change this link.";
    }
}
