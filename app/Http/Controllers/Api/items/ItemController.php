<?php

namespace App\Http\Controllers\api\items;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\items;
use App\Http\Traits\Helpers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Items\ItemCreation;

class ItemController extends Controller
{
    use Helpers;

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
}
