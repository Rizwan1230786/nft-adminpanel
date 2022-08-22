<?php
namespace App\Http\Traits;
use Stripe\Account;
use Stripe\AccountLink;
use Stripe\Exception;
use Stripe\Stripe;
trait PaymentStripe {
    public static function prepare()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }
    public static function getStripeValue()
    {
        self::prepare();
        return "asdfsadfa";
    }
    public static function getOrCreateAccount($params = [], $config = [])
    {
        self::prepare();
        $response['api_status'] = false;
        try {
            $params = array_merge([
                "type" => $config['account_type'] ?? 'standard'
            ], $params);
            $session = Account::create($params);
            $response['api_status'] = true;
            $response['message'] = "Account Created Successfully";
            $response['data'] = array("account_id" => $session->id);
        } catch(\Stripe\Exception\CardException $e) {
            $response['message'] = $e->getError()->message;
        }
        catch (\Stripe\Exception\RateLimitException $e) {
            $response['message'] = "Too many requests made to the API too quickly";
        }
        catch (\Stripe\Exception\InvalidRequestException $e) {
            $response['message'] = $e->getError()->message;
        }
        catch (\Stripe\Exception\AuthenticationException $e) {
            $response['message'] = "Authentication with Stripe's API failed";
        }
        catch (\Stripe\Exception\ApiConnectionException $e) {
            $response['message'] = "Network communication with Stripe failed";
        }
        catch (\Stripe\Exception\ApiErrorException $e) {
            $response['message'] =$e->getError()->message;
        }
        catch (Exception $e) {
            $response['message'] = "Something else happened, completely unrelated to Payment";
        }
        return $response;
    }
    public static function createAccountLink( $vendorId, $config = [] ) {
        self::prepare();
        $response['api_status'] = false;
        try {
            $account_links = AccountLink::create([
                'account' => $vendorId,
                'refresh_url' => $config['refresh_url'] ?? '',
                'return_url' => $config['return_url'] ?? '',
                'type' => 'account_onboarding',
              ]);
            $response['api_status'] = true;
            $response['message'] = "Account Created Successfully";
            $response['data'] = array("account_link" => $account_links);
        } catch(\Stripe\Exception\CardException $e) {
            $response['message'] = $e->getError()->message;
        }
        catch (\Stripe\Exception\RateLimitException $e) {
            $response['message'] = "Too many requests made to the API too quickly";
        }
        catch (\Stripe\Exception\InvalidRequestException $e) {
            $response['message'] = $e->getError()->message;
        }
        catch (\Stripe\Exception\AuthenticationException $e) {
            $response['message'] = "Authentication with Stripe's API failed";
        }
        catch (\Stripe\Exception\ApiConnectionException $e) {
            $response['message'] = "Network communication with Stripe failed";
        }
        catch (\Stripe\Exception\ApiErrorException $e) {
            $response['message'] =$e->getError()->message;
        }
        catch (Exception $e) {
            $response['message'] = "Something else happened, completely unrelated to Payment";
        }
        return $response;
    }
    public static function checkStripeConnectedAccountStatus($stripeConnectedId) {
        self::prepare();
        $response['api_status'] = false;
        try {
            $ch = Account::retrieve($stripeConnectedId, []);
            $response['api_status'] = true;
            $response['message'] = "account status";
            $response['data'] = array("disabled_reason" => ($ch->requirements->disabled_reason ?? null) , "stripe_connect" => ($ch->payouts_enabled ?? null));
        } catch(\Stripe\Exception\CardException $e) {
            $response['message'] = $e->getError()->message;
        }
        catch (\Stripe\Exception\RateLimitException $e) {
            $response['message'] = "Too many requests made to the API too quickly";
        }
        catch (\Stripe\Exception\InvalidRequestException $e) {
            $response['message'] = $e->getError()->message;
        }
        catch (\Stripe\Exception\AuthenticationException $e) {
            $response['message'] = "Authentication with Stripe's API failed";
        }
        catch (\Stripe\Exception\ApiConnectionException $e) {
            $response['message'] = "Network communication with Stripe failed";
        }
        catch (\Stripe\Exception\ApiErrorException $e) {
            $response['message'] =$e->getError()->message;
        }
        catch (Exception $e) {
            $response['message'] = "Something else happened, completely unrelated to Payment";
        }
        return $response;
    }
    private static function create($user, $id_key, $callback) {
        $vendor = $user->stripeAccount;
        if (!$vendor || !$vendor->$id_key) {
            $id = call_user_func($callback)->id;
            if (!$vendor) {
                $vendor = $user->stripeAccount()->create([$id_key => $id]);
            } else {
                $vendor->$id_key = $id;
                $vendor->save();
            }
        }
        return $vendor;
    }
}
