<?php

namespace App\Http\Controllers\api\front;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Generalsetting;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $customer=Customer::latest()->take(6)->get();
        $app_seetings=Generalsetting::where('id',1)->first();
        if(isset($app_seetings) && !empty($app_seetings)){
            $app_seetings->favicon_image= asset('setting/header/'.$app_seetings->favicon_image);
            $app_seetings->website_logo= asset('setting/header/'.$app_seetings->website_logo);
            $app_seetings->header_bg_img= asset('setting/header/'.$app_seetings->header_bg_img);
            $app_seetings->footer_bg_img= asset('setting/header/'.$app_seetings->footer_bg_img);
        }
        if(isset($customer) && !empty($customer)){
            foreach($customer as $value){
                $value->image= asset('uploads/seller-profile/'.$value->image);
            }
            return response(['status'=>true,'customer'=>$customer,'app_setting'=>$app_seetings]);
        }else{
            return response(['status'=>true,'message'=>'Data not Found']);
        }
    }
}
