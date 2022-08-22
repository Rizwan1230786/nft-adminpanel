<?php

namespace App\Http\Controllers\Api\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\StripeClient;

class StripeController extends Controller
{
    public function payment_history()
    {
        $stripe = new StripeClient(config('services.stripe.secret'));
        return $stripe->issuing->transactions->all(['limit' => 3,]);
    }
}
