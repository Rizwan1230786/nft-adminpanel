<?php

namespace App\Http\Controllers\Api\Barber\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Barber\BarberProfile;
use App\Http\Requests\Barber\BarberSocialLinks;
use Illuminate\Http\Request;
use App\Rules\Seller\CheckBarberSocialLink;
use App\Models\Barber;
use App\Models\Seller;
use App\Models\SellerLinks;
use App\Http\Traits\Helpers;
use App\Models\Services;
use Illuminate\Support\Facades\File;

/**
 * @group Barber profile app
 *
 * APIs endpoints for managing barber profile
 */
class BarberController extends Controller
{
    use Helpers;
    public function barber_profile(BarberSocialLinks $request)
    {
        // $request->validate(
        //     [
        //         'data.*.social_link' => ['required', new CheckBarberSocialLink($request)],
        //         'data' => ['required'],
        //     ],
        //     ["data.*.social_link.required" => "Fill that data", "data.required" => "fill that data"],
        // );
        // $statusCode = 401;
        // $message = "Fill the data in proper way!";
        // $sellerId = $request->user()->id;
        // $updateCounter = $addCounter = 0;
        // if (!empty($sellerId) && is_numeric($sellerId) && $sellerId > 0) {
        //     if (isset($request->data) && !empty($request->data)) {
        //         foreach ($request->data as $item) :
        //             $storeData = array("seller_id" => $sellerId, "social_link" => (isset($item["social_link"]) && !empty($item["social_link"]) ? $item["social_link"] : null), "is_deleted" => 0);
        //             if (isset($item["id"]) && !empty($item["id"])) {
        //                 $updateCounter++;
        //                 Barber::where("id", $item["id"])->update($storeData);
        //             } else {
        //                 $addCounter++;
        //                 Barber::create($storeData);
        //             }
        //         endforeach;
        //         $statusCode = 200;
        //         $message = ($updateCounter > 0 ? $updateCounter . " link update" . ($addCounter > 0 ? " and " : "") : "") . ($addCounter > 0 ? $addCounter . " link added" : "") . " successfully!";
        //     } else {
        //         $statusCode = 403;
        //         $message = "Fill the data";
        //     }
        // } else {
        //     $statusCode = 403;
        //     $message = "Please login again";
        // }
        // return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message], $statusCode);

        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $link = $request->all();
        $seller_id = $request->user()->id;
        $links = Barber::where("seller_id", $seller_id)->select('id', 'facebook_link', 'instagram_link', 'tiktok_link', 'twitter_link')->first();
        if (isset($link) && !empty($link)) {
            $link = array_merge($link, array("facebook_link" => ($link["facebook_link"] ?? null)), array("instagram_link" => ($link["instagram_link"] ?? null)), array("twitter_link" => ($link["twitter_link"] ?? null)), array("tiktok_link" => ($link["tiktok_link"] ?? null)), array("seller_id" => ($seller_id ?? null)));

            if (isset($links->id) && !empty($links->id)) {
                Barber::where("seller_id", $seller_id)->update($link);
                $data = Barber::where("seller_id", $seller_id)->select('id',  'facebook_link', 'instagram_link', 'tiktok_link', 'twitter_link')->first();
                $statusCode = 200;
                $message = "Seller Social Links Updated!";
            } else {
                Barber::create($link);
                $data = Barber::where("seller_id", $seller_id)->select('id',  'facebook_link', 'instagram_link', 'tiktok_link', 'twitter_link')->first();
                $statusCode = 200;
                $message = "Seller Social Links Added!!";
            }
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 && $message == null ?: $message), "data" => ($data ?? array())], $statusCode);
    }
    public function barber_data(Request $request)
    {
        $statusCode = 200;
        $message = "Barber social links and services Data!";
        $seller_id = $request->user()->id;
        $social = Barber::where('seller_id', $seller_id)->get();
        $services = Services::where('seller_id', $seller_id)->get();
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 && $message == null ?: $message), "social" => ($social ?? array()), "services" => ($services ?? array())], $statusCode);
    }
    public function get_profile_data(Request $request)
    {
        $statusCode = 200;
        $message = "Barber profile data!";
        $seller_id = $request->user()->id;
        $data = Seller::select('id', 'fullname', 'email', 'image', 'phoneno', 'dob', 'plan')->where('id', $seller_id)->first();
        $social = Barber::select('id', 'facebook_link', 'instagram_link', 'tiktok_link', 'twitter_link')->where('seller_id', $seller_id)->first();
        if(isset($data->image) && !empty($data->image)){
            $data->image = $this->imageDefaultPath(Config('constants.seller_profile_directory'), ($data->image ?? ""), Config('constants.seller_profile_directory'), $data->image);
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 && $message == null ?: $message), "data" => ($data ?? array()), "social" => ($social ?? array())], $statusCode);
    }
    public function update_profile_data(Request $request)
    {
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $data = $request->except('facebook_link', 'instagram_link', 'tiktok_link', 'twitter_link');
        $link = $request->all(['facebook_link', 'instagram_link', 'tiktok_link', 'twitter_link']);
        $seller_id = $request->user()->id;
        if (isset($data['image']) && !empty($data['image'])) {
            $postImage['image'] = $data['image'];
            $oldimage =  Seller::find($seller_id);
            if (isset($oldimage->image) && !empty($oldimage->image)) {
                $oldimage = public_path(Config('constants.seller_profile_directory') . $oldimage->image);
                if (File::exists($oldimage)) {
                    File::delete($oldimage);
                }
            }
            $data['image'] = $imageName = time() . '.' . $data['image']->extension();
            $postImage['image']->move(public_path(Config('constants.seller_profile_directory')), $imageName);
        }
        $seller = Seller::where("id", $seller_id)->select('id', 'fullname', 'phoneno', 'email', 'dob', 'image')->first();
        $links = Barber::where("seller_id", $seller_id)->select('id', 'facebook_link', 'instagram_link', 'tiktok_link', 'twitter_link')->first();
        if (isset($seller->id) && !empty($seller->id)) {
            $seller = array_merge($data, array("fullname" => ($data["fullname"] ?? null)), array("email" => ($data["email"] ?? null)), array("phoneno" => ($data["phoneno"] ?? null)), array("dob" => ($data["dob"] ?? null)), array("image" => ($data["image"] ?? null)));
            Seller::where("id", $seller_id)->update($seller);
            $seller = Seller::where("id", $seller_id)->select('id', 'fullname', 'phoneno', 'email', 'dob', 'image')->first();
            $statusCode = 200;
            $message = "Profile updated successfully!";
            if (isset($seller->image) && !empty($seller->image)) {
                $seller->image = $this->imageDefaultPath(Config('constants.seller_profile_directory'), ($seller->image ?? ""), Config('constants.seller_profile_directory'), $seller->image);
            }
        }
        if (isset($link) && !empty($link)) {
            $link = array_merge($link, array("facebook_link" => ($link["facebook_link"] ?? null)), array("instagram_link" => ($link["instagram_link"] ?? null)), array("twitter_link" => ($link["twitter_link"] ?? null)), array("tiktok_link" => ($link["tiktok_link"] ?? null)), array("seller_id" => ($seller_id ?? null)));

            if (isset($links->id) && !empty($links->id)) {
                Barber::where("seller_id", $seller_id)->update($link);
                $links = Barber::where("seller_id", $seller_id)->select('id',  'facebook_link', 'instagram_link', 'tiktok_link', 'twitter_link')->first();
                $statusCode = 200;
                $message = "Profile updated successfully!";
            } else {
                Barber::create($link);
                $links = Barber::where("seller_id", $seller_id)->select('id',  'facebook_link', 'instagram_link', 'tiktok_link', 'twitter_link')->first();
                $statusCode = 200;
                $message = "Profile updated successfully!";
            }
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 && $message == null ?: $message), "seller" => ($seller ?? array()), "links" => ($links ?? array())], $statusCode);
    }
}
