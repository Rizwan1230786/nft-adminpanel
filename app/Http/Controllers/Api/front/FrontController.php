<?php

namespace App\Http\Controllers\api\front;

use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Customer;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;


class FrontController extends Controller
{
    /**
     * @group front app
     *
     * APIs endpoints for managing frontpage
     */
    public function index()
    {
        $customer = Customer::latest()->take(6)->get();
        $app_seetings = GeneralSetting::where('id', 1)->first();
        $collection=Collection::latest()->take(8)->get();
        if (isset($app_seetings) && !empty($app_seetings)) {
            $app_seetings->header_logo = asset('setting/header/' . $app_seetings->header_logo);
            $app_seetings->favicon_image = asset('setting/header/' . $app_seetings->favicon_image);
            $app_seetings->website_logo = asset('setting/header/' . $app_seetings->website_logo);
            $app_seetings->header_bg_img = asset('setting/header/' . $app_seetings->header_bg_img);
            $app_seetings->footer_bg_img = asset('setting/header/' . $app_seetings->footer_bg_img);
        }
        if(isset($collection) && !empty($collection)){
            foreach($collection as $value){
                $value->image=asset('images/collection/logo/'.$value->image);
                $value->banner_image=asset('images/collection/banners/'.$value->banner_image);
            }
        }
        if (isset($customer) && !empty($customer)) {
            foreach ($customer as $value) {
                $value->image = asset('uploads/seller-profile/' . $value->image);
            }
            return response(['status' => true, 'customer' => $customer, 'app_setting' => $app_seetings,'popular_collection'=>$collection]);
        } else {
            return response(['status' => true, 'message' => 'Data not Found']);
        }
    }
}
