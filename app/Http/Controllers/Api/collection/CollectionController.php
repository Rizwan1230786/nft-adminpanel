<?php

namespace App\Http\Controllers\Api\collection;

use App\Models\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\collection\Collections;


class CollectionController extends Controller
{
    public function index(){
        $customerid=Auth::user()->id;
        $collection=Collection::where('customer_id',$customerid)->get();
        if(isset($collection) && !empty($collection)){
            foreach($collection as $value){
                $value->image = asset('images/collection/logo/'.$value->image);
                $value->banner_image = asset('images/collection/banner/'.$value->banner_image);
            }
        }
        return response(['status'=>true,'message'=>$collection]);
    }
    public function submit(Collections $request)
    {
        $message="Fill the data in proper way!";
        $floder = date('M-y');
        $customerid = Auth::user()->id;
        $data = $request->all();
        $data = array_merge($data, array("name" => ($data["name"] ?? null)), array("image" => ($data["image"] ?? null)), array("banner_image" => ($data["banner_image"] ?? null)), array("category_id" => ($data["category_id"] ?? null)),array("customer_id" => ($customerid ?? null)));
        if (isset($data['image']) && !empty($data['image'])) {
            $imageName = time() . '.' . $data['image']->extension();
            $data['image'] = $floder . '/' . $imageName;
            $request->image->move(public_path('images/collection/logo/' . $floder), $imageName);
        }
        if (isset($data['banner_image']) && !empty($data['banner_image'])) {
            $imageName = time() . '.' . $data['banner_image']->extension();
            $data['banner_image'] = $floder . '/' . $imageName;
            $request->banner_image->move(public_path('images/collection/banners/' . $floder), $imageName);
        }
        $query = Collection::create($data);
        if (isset($query) && !empty($query)) {
            $message = "Collections Added Successfully";
            return response(['sataus' =>true, 'message' => $message]);
        }else{
            return response(['sataus' =>true, 'message' => $message]);
        }
    }
}
