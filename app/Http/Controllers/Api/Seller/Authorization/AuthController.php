<?php

namespace App\Http\Controllers\Api\Seller\Authorization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\SellerBaiscInformation;
use App\Http\Requests\Seller\SellerProfilePicture;
use App\Http\Traits\Helpers;
use App\Http\Traits\PaymentStripe;
use App\Models\Seller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

/**
 * @group Seller Profile app
 *
 * APIs endpoints for managing seller
 */
class AuthController extends Controller
{
    use Helpers;
    use PaymentStripe;
    /**
     * Basic Detail Update
     *
     * @bodyParam fullname string required Full name of the Seller. Example: abc
     * @bodyParam displayname string required Display name of the Seller. Example: abc
     *
     * @response {
     *   "status": true/false,
     *   "message": string,
     *   "data": {
     *      "id": number/null,
     *      "fullname": string/null,
     *      "displayname": string/null
     *   }
     *   }
     *
     */
    public function updateBasicDetail(SellerBaiscInformation $request)
    {
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $sellerId = $request->user()->id;
        $postData = $request->all();
        if (isset($postData['image']) && !empty($postData['image'])) {
            $oldimage =  Seller::find($sellerId);
            if (isset($oldimage->image) && !empty($oldimage->image)) {
                $oldimage = public_path(Config('constants.seller_profile_directory') . $oldimage->image);
                if (File::exists($oldimage)) {
                    File::delete($oldimage);
                }
            }
            $postImage['image'] = $imageName = time() . '.' . $postData['image']->extension();
            $postData['image']->move(public_path(Config('constants.seller_profile_directory')), $imageName);
        }
        $sellerDetail = Seller::where("id", $sellerId)->select('id', 'fullname', 'displayname', "plan", "theme", 'status')->first();
        if (isset($sellerDetail->id) && !empty($sellerDetail->id)) {
            if (isset($sellerDetail->id) && !empty($sellerDetail->id)) {
                $sellerDetail = array_merge(array("fullname" => (isset($postData["fullname"]) && !empty($postData["fullname"]) ? $postData["fullname"] : ($sellerDetail->fullname ?? null))), array("image" => (isset($postData["image"]) && !empty($postData["image"]) ? $postImage["image"] : ($sellerDetail->image ?? null))), array("displayname" => (isset($postData["displayname"]) && !empty($postData["displayname"]) ? $postData["displayname"] : ($sellerDetail->displayname ?? null))), array("plan" => (isset($postData["plan"]) && !empty($postData["plan"]) ? ($postData["plan"] == "personal" || $postData["plan"] == "gold" ? $postData["plan"] : "personal") : ($sellerDetail->plan ?? "personal"))), array("theme" => (isset($postData["theme"]) && !empty($postData["theme"]) ? ($postData["theme"] == "light" || $postData["theme"] == "dark" ? $postData["theme"] : "light") : ($sellerDetail->theme ?? "light"))));
                Seller::where("id", $sellerId)->update($sellerDetail);
                $statusCode = 200;
                $message = "Seller update successfully!";
            } else {
                $message = "Unfortunately, you are blocked by the admin. Contact with the support team.";
            }
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message], $statusCode);
    }
    /**
     * Update Seller Image
     *
     * @bodyParam fullname string required Full name of the Seller. Example: abc
     * @bodyParam displayname string required Display name of the Seller. Example: abc
     *
     * @response {
     *   "status": true/false,
     *   "message": string,
     *   "data": {
     *      "id": number/null,
     *      "fullname": string/null,
     *      "displayname": string/null
     *   }
     *   }
     *
     */
    public function updateSellerProfile(SellerProfilePicture $request)
    {
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $sellerId = $request->user()->id;
        if (isset($sellerId) && !empty($sellerId) && is_numeric($sellerId) && $sellerId > 0) {
            if (isset($request->image) && !empty($request->image)) {
                $oldimage =  Seller::find($sellerId);
                if (isset($oldimage->image) && !empty($oldimage->image)) {
                    $oldimage = public_path(Config('constants.seller_profile_directory') . $oldimage->image);
                    if (File::exists($oldimage)) {
                        File::delete($oldimage);
                    }
                }
                $data['image'] = $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path(Config('constants.seller_profile_directory')), $imageName);
                Seller::where("id", $sellerId)->update($data);

                $data['image'] = $this->imageDefaultPath(Config('constants.seller_profile_directory'), ($data['image'] ?? ""), Config('constants.seller_profile_directory'), $data['image']);
                $statusCode = 200;
                $message = "Profile image update successfully!";
            } else {
                $message = "Unfortunately, you are blocked by the admin. Contact with the support team.";
            }
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message, "data" => ($data ?? array())], $statusCode);
    }
    /**
     * Check Seller Stripe Status
     *
     */
    public function checkStripeStatus(Request $request)
    {
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $sellerId = $request->user()->id;
        $data = Seller::where("id", $sellerId)->select(['id', "email", "stripe_account_id", "stripe_status"])->first();
        if (isset($data->id) && !empty($data->id)) {
            $statusCode = 200;
            $message = "Seller stripe account detail!";
            $accountLink =  null;
            $stripeStatus = (isset($data->stripe_status) && !empty($data->stripe_status) ? ($data->stripe_status == true ? true : false) : false);
            $accountId = (isset($data->stripe_account_id) && !empty($data->stripe_account_id) ? $data->stripe_account_id : null);
            if (empty($accountId)) {
                $stripeAccount = $this->getOrCreateAccount((isset($data->email) && !empty($data->email) ? array("email" => $data->email) : array()), array());
                $accountId = $accountLink =  null;
                if (isset($stripeAccount["api_status"]) && !empty($stripeAccount["api_status"])) {
                    if ($stripeAccount["api_status"] == true) {
                        if (isset($stripeAccount["data"]["account_id"]) && !empty($stripeAccount["data"]["account_id"])) {
                            $accountId = $stripeAccount["data"]["account_id"];
                            $linkDetail = $this->createAccountLink($stripeAccount["data"]["account_id"], [
                                "return_url" => config('constants.stripe_return_url'),
                                "refresh_url" => config('constants.stripe_return_url')
                            ]);
                            $accountLink = (isset($linkDetail["api_status"]) && !empty($linkDetail["api_status"]) ? ($linkDetail["api_status"] == true ? (isset($linkDetail["data"]["account_link"]["url"]) && !empty($linkDetail["data"]["account_link"]["url"]) ? $linkDetail["data"]["account_link"]["url"] : $accountLink) : $accountLink) : $accountLink);
                        }
                    }
                }
                Seller::where("id", $data->id)->update(array("stripe_account_id" => $accountId, "stripe_link" => $accountLink));
            } else {
                if ($stripeStatus == false) {
                    $statusCheck = $this->checkStripeConnectedAccountStatus($accountId);
                    $stripeStatus = (isset($statusCheck["status"]) && !empty($statusCheck["status"]) ? (isset($statusCheck["data"]["stripe_connect"]) && !empty($statusCheck["data"]["stripe_connect"]) ? ($statusCheck["data"]["stripe_connect"] == true ? true : $stripeStatus) : $stripeStatus) : $stripeStatus);
                    if ($stripeStatus == false) {
                        $linkDetail = $this->createAccountLink($accountId, [
                            "return_url" => Config::get('constants.stripe_return_url'),
                            "refresh_url" => Config::get('constants.stripe_return_url')
                        ]);
                        $accountLink = (isset($linkDetail["api_status"]) && !empty($linkDetail["api_status"]) ? ($linkDetail["api_status"] == true ? (isset($linkDetail["data"]["account_link"]["url"]) && !empty($linkDetail["data"]["account_link"]["url"]) ? $linkDetail["data"]["account_link"]["url"] : $accountLink) : $accountLink) : $accountLink);
                        Seller::where("id", $data->id)->update(array("stripe_account_id" => $accountId, "stripe_link" => $accountLink));
                    }
                };
            }
            $data->accountLink = $accountLink;
            $data->stripe_status = $stripeStatus;
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message, "data" => ($data ?? array())], $statusCode);
    }
    public function image_path_with_default(Request $request)
    {
        $image_path = $request->image_path;
        $image_name = $request->image_name;
        $default_path = "default_path";
        $default_name = "default_name";
        $path = $default_path . '/' . $default_name;
        if (isset($image_name) && !empty($image_name)) {
            if (filter_var($image_name, FILTER_VALIDATE_URL)) {
                $client = new Client();
                $response = $client->request('get', $image_name);
                if (!empty($response)) {
                    return $response;
                }
            } else if (file_exists($image_path . '/' .  $image_name))
                $path = $image_path . '/' . $image_name;
        }
        $path = $request->root() . '/' . $path;
        return $path;
    }
}
