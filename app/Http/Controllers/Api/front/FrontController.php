<?php

namespace App\Http\Controllers\api\front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
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
            return response(['status' => true, 'customer' => $customer,'popular_collection' => $collection]);
        } else {
            return response(['status' => true, 'message' => 'Data not Found']);
        }
    }
    public function general_setting()
    {
        $app_seetings = GeneralSetting::where('id', 1)->first();
        if (isset($app_seetings) && !empty($app_seetings)) {
            $app_seetings->header_logo = asset('setting/header/' . $app_seetings->header_logo);
            $app_seetings->favicon_image = asset('setting/header/' . $app_seetings->favicon_image);
            $app_seetings->website_logo = asset('setting/header/' . $app_seetings->website_logo);
            $app_seetings->header_bg_img = asset('setting/header/' . $app_seetings->header_bg_img);
            $app_seetings->footer_bg_img = asset('setting/header/' . $app_seetings->footer_bg_img);
        }
        return response(['status' => true, 'app_setting' => $app_seetings]);
    }
    public function blog()
    {
        $blog = Blog::OrderBy('id','desc')->get();
        if (isset($blog) && !empty($blog)) {
            foreach ($blog as $value) {
                $value->image = asset('images/blog/' . $value->image);
            }
        }
        return response(['status' => true, 'Blog_data' => $blog]);
    }
    public function blog_detail($id)
    {
        $blog_detail = Blog::where('id', $id)->first();
        $category=Category::select('id','name')->get();
        if (isset($blog_detail) && !empty($blog_detail)) {
            $blog_detail->image = asset('images/blog/' . $blog_detail->image);
        }
        return response(['status' => true, 'blogdetail' => $blog_detail,'category'=>$category]);
    }
    public function explore()
    {
        $explore = items::where('status', 1)->latest()->take(4)->with('customer')->get();
        if (isset($explore) && !empty($explore)) {
            foreach ($explore as $value) {
                $value->image = asset('images/items/' . $value->image);
                foreach ($value->customer as $customer) {
                    $customer->firstname;
                    $customer->lastname;
                    unset($customer->email);
                    unset($customer->phoneno);
                    unset($customer->dob);
                    unset($customer->image);
                    unset($customer->is_verified);
                    unset($customer->is_deleted);
                }
            }
        }
        return response(['status' => true, 'explore' => $explore]);
    }
    public function author()
    {
        $author = Collection::select('id','customer_id','banner_image')->with('customer')->get();
        if (isset($author) && !empty($author)) {
            foreach ($author as $value) {
                $value->banner_image = asset('images/collection/banners/' . $value->banner_image);
                foreach ($value->customer as $customers) {
                    unset($customers->created_at);
                    unset($customers->updated_at);
                    unset($customers->dob);
                    unset($customers->email);
                    unset($customers->phoneno);
                    unset($customers->is_verified);
                    unset($customers->is_deleted);
                    $customers->image= asset('uploads/seller-profile/'.$customers->image);
                }
            }
        }
        return response(['status' => true, 'Author' => $author]);
    }
}
