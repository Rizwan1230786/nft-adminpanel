<?php

namespace App\Http\Controllers\api\items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\items;
use App\Http\Traits\Helpers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Items\ItemCreation;
use App\Models\Customer;

class ItemController extends Controller
{
    use Helpers;
    public function index(){
        $items = items::where('status',1)->with('customer')->get();
        if(isset($items) && !empty($items)){
            foreach($items as $value){
                $value->image = asset('images/items/' . $value->image);
                foreach($value->customer as $customer){
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
        $recentitems=items::where('status',1)->with('customer')->latest()->take(4)->get();
        if(isset($recentitems) && !empty($recentitems)){
            foreach($recentitems as $value){
                $value->image = asset('images/items/' . $value->image);
                foreach($value->customer as $customer){
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
        return response(['status'=>true,'items'=>$items,'recent'=>$recentitems]);
    }
    public function submit(ItemCreation $request){
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $floder=date('M-y');
        $data = $request->all();
        $customerid = Auth::user()->id;
        $data = array_merge($data, array("name" => ($data["name"] ?? null)), array("detail" => ($data["detail"] ?? null)), array("royality" => ($data["royality"] ?? null)), array("size" => ($data["size"] ?? null)), array("image" => ($data["image"] ?? null)),array("no_of_copies" => ($data["no_of_copies"] ?? null)),array("put_on_sale" => ($data["put_on_sale"] ?? null)),array("sale_prize" => ($data["sale_prize"] ?? null)),array("unlock_purchased" => ($data["unlock_purchased"] ?? null)),array("user_id" => ($customerid ?? null)));
        if (isset($data['image']) && !empty($data['image'])) {
            $imageName = time() .'_'. $data['image']->getClientOriginalName();
            $data['image'] = $floder.'/'.$imageName;
            $request->image->move(public_path('images/items/'.$floder), $imageName);
        }
        $data = items::create($data);
        $statusCode = 200;
        $message = "Items created successfully!";
        if(isset($data) && !empty($data)){
            return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 && $message == null ?: $message)], $statusCode);
        }else{
            return response(['status'=>true,'message'=>'Please check the cridinals']);
        }
    }
    public function items_detail($id){
        $itemsdetail=items::where('id',$id)->with('customer')->first();
        if(isset($itemsdetail) && !empty($itemsdetail)){
            $itemsdetail->image= asset('images/items/'.$itemsdetail->image);
        }
        return response(['status'=>true,'itemsdetail'=>$itemsdetail]);
    }
}
