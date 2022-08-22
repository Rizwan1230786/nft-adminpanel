<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\Barber;
use App\Models\SellerLinks;
use App\Models\Services;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SellersController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:seller-list|goldseller-list|personalseller-list|sellerlink-list|services-list', ['only' => ['index','show','gold','personal','link','services_list']]);
    }
    public function index()
    {
        $pageConfigs = ['pageHeader' => false];
        $client = Seller::all();
        $header = 'All Sellers';
        return view('/admin/module/seller/clients-list', compact('client','header'));
    }
    public function gold()
    { 
        $pageConfigs = ['pageHeader' => false];
        $client = Seller::where('plan','gold')->get();
        $header = 'Gold Sellers';
        return view('/admin/module/seller/clients-list', compact('client','header'));
    }
    public function personal()
    {
        $pageConfigs = ['pageHeader' => false];
        $client = Seller::where('plan','personal')->get();
        $header = 'Personal Sellers';
        return view('/admin/module/seller/clients-list', compact('client','header'));
    }
    public function link()
    {
        $pageConfigs = ['pageHeader' => false];
        $client = SellerLinks::all();
        $header = 'Personal Sellers';
        return view('/admin/module/seller/sellerlink-list', compact('client','header'));
    }
    public function services_list()
    {
        $pageConfigs = ['pageHeader' => false];
        $client= DB::table('sellers')
        ->select('services.id','services.product_name','services.price','services.status','sellers.fullname','sellers.image')
        ->join('services','services.seller_id','=','sellers.id')->get();
        return view('/admin/module/services/services-list', compact('client'));
    }
    
    ////Function for Delete data
    public function destory($id)
    {
        $data = Seller::findOrFail($id);
        $oldimage = public_path('images/' . $data->image);
        if (File::exists($oldimage)) {
            File::delete($oldimage);
        }
        $user = $data->delete();
        if ($user) {
            return response(['status' => true]);
        } else {
            return response(['status' => false]);
        }
    }
    ///////status function///////
    public function status(Request $request)
    {
        $user = Seller::find($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['status' => true]);
    }
    /////barber list/////
}
