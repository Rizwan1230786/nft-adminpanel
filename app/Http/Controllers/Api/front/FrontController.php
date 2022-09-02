<?php

namespace App\Http\Controllers\api\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Collection;
use App\Models\Customer;
use App\Models\GeneralSetting;
use App\Models\items;
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
        if (isset($app_seetings) && !empty($app_seetings)) {
            $app_seetings->header_logo = asset('setting/header/' . $app_seetings->header_logo);
            $app_seetings->favicon_image = asset('setting/header/' . $app_seetings->favicon_image);
            $app_seetings->website_logo = asset('setting/header/' . $app_seetings->website_logo);
            $app_seetings->header_bg_img = asset('setting/header/' . $app_seetings->header_bg_img);
            $app_seetings->footer_bg_img = asset('setting/header/' . $app_seetings->footer_bg_img);
        }
        $collection = Collection::latest()->take(8)->get();
        if (isset($collection) && !empty($collection)) {
            foreach ($collection as $value) {
                $value->image = asset('images/collection/logo/' . $value->image);
                $value->banner_image = asset('images/collection/banners/' . $value->banner_image);
            }
        }
        if (isset($customer) && !empty($customer)) {
            foreach ($customer as $value) {
                $value->image = asset('uploads/seller-profile/' . $value->image);
            }
            return response(['status' => true, 'customer' => $customer, 'app_setting' => $app_seetings, 'popular_collection' => $collection]);
        } else {
            return response(['status' => true, 'message' => 'Data not Found']);
        }
    }
    public function blog()
    {
        $blog = Blog::all();
        if (isset($blog) && !empty($blog)) {
            foreach ($blog as $value) {
                $value->image = asset('images/blog/' . $value->image);
            }
        }
        return response(['status' => true, 'Bloag_data' => $blog]);
    }
    public function blog_detail($slug){
        $blog_detail=Blog::where('title',$slug)->first();
        if(isset($blog_detail) && !empty($blog_detail)){
            $blog_detail->image=asset('images/blog/'.$blog_detail->image);
        }
        return response(['status'=>true,'blogdetail'=>$blog_detail]);
    }
    public function explore()
    {
        $explore = items::where('status',1)->latest()->take(4)->get();
        if (isset($explore) && !empty($explore)) {
            foreach ($explore as $value) {
                $value->image = asset('images/items/' . $value->image);
            }
        }
        return response(['status' => true, 'explore' => $explore]);
    }
    public function author()
    {
        $author = Customer::select('id', 'image', 'firstname', 'lastname')->with('collection')->get();
        if (isset($author) && !empty($author)) {
            foreach ($author as $value) {
                $value->image = asset('/uploads/seller-profile/' . $value->image);
                foreach ($value->collection as $collections) {
                    unset($collections->name);
                    unset($collections->detail);
                    unset($collections->image);
                    unset($collections->category_id);
                    unset($collections->created_at);
                    unset($collections->updated_at);
                    $collections->banner_image = asset('images/collection/banners/' . $collections->banner_image);
                }
            }
        }
        return response(['status' => true, 'Author' => $author]);
    }
}
