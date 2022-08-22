<?php

namespace App\Http\Controllers\Api\Seller\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Rules\Seller\CheckServiceProductForName;
use App\Rules\Seller\CheckServiceProductForPrice;
use Illuminate\Support\Facades\Auth;

/**
 * @group Services app
 *
 * APIs endpoints for managing Services creation, updation, deletion and showing data.
 */
class ServicesController extends Controller
{
    /**
     * Listing Of Services
     * @bodyParam page Its an optional, by default its consider as 1. Example: 1
     * @bodyParam limit Its an optional, by default its consider as 20. Example: 20
     *
     * @response {
     *   "status": true/false,
     *   "message": string/null,
     *   "data": [
     *       {
     *           "id": string/null,
     *           "product_name": string/null,
     *           "price": string/null,
     *           "status": "1/0"
     *       }
     *   ],
     *   "nextPage": false,
     *   "limit": number/20
     *  }
     */
    public function servicesList(Request $request)
    {
        $statusCode = 401;
        $message = "Fill the data in proper way";
        $id = Auth::user()->id;
        $limit = (isset($request->limit) && !empty($request->limit) && is_numeric($request->limit) ? (int)$request->limit : 20);
        $nextPage = false;
        if (isset($id) && !empty($id)) {
            $paginate = Services::select('id', 'product_name', 'price', 'status')->where(array('seller_id' => $id, "is_deleted" => "0"))->paginate($limit);
            $data = $paginate->items();
            $nextLink = $paginate->nextPageUrl();
            $nextPage = (isset($nextLink) && !empty($nextLink) ? true : $nextPage);
            $statusCode = 200;
            $message = "Here is your services or products!";
        } else {
            $message = "Please login first";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 ?  $message : $message), "data" => ($data ?? array()), 'nextPage' => $nextPage, 'limit' => $limit], $statusCode);
    }
    /**
     * Add OR Update The Services
     * @bodyParam data required Its required parameter and must has product_name,price,status parameters in each row. Pass the id parameter if service record has to update. Example: [{"id":string/null,"product_name":string/null,"price":string/null,"status":"1/0"}]
     *
     * @response {
     *   "status": true/false,
     *   "message": string/null,
     *  }
     */
    public function addService(Request $request)
    {
        $request->validate(
            [
                'data.*.product_name' => ['required', new CheckServiceProductForName($request)],
                'data.*.price' => ['required', new CheckServiceProductForPrice($request)],
                'data' => ['required'],
            ],
            ["data.*.product_name.required" => "Fill that data", "data.*.price.required" => "fill that data", "data.required" => "fill that data"],
        );
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $sellerId = $request->user()->id;
        $updateCounter = $addCounter = 0;
        if (!empty($sellerId) && is_numeric($sellerId) && $sellerId > 0) {
            if (isset($request->data) && !empty($request->data)) {
                foreach ($request->data as $item) :
                    $storeData = array("seller_id" => $sellerId, "product_name" => (isset($item["product_name"]) && !empty($item["product_name"]) ? $item["product_name"] : null), "price" => (isset($item["price"]) && !empty($item["price"]) ? $item["price"] : 0), "status" => (isset($item["status"]) && !empty($item["status"]) ? ($item["status"] == 1 ? 1 : 0) : 0), "is_deleted" => 0);
                    if (isset($item["id"]) && !empty($item["id"])) {
                        $updateCounter++;
                        Services::where("id", $item["id"])->update($storeData);
                    } else {
                        $addCounter++;
                        Services::create($storeData);
                    }
                endforeach;
                $statusCode = 200;
                $message = ($updateCounter > 0 ? $updateCounter . " services update" . ($addCounter > 0 ? " and " : "") : "") . ($addCounter > 0 ? $addCounter . " services added" : "") . " successfully!";
            } else {
                $statusCode = 403;
                $message = "Fill the data";
            }
        } else {
            $statusCode = 403;
            $message = "Please login again";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message], $statusCode);
    }
    /**
     * Delete Of Services
     *
     * @response {
     *   "status": true/false,
     *   "message": string/null,
     *  }
     */
    public function deleteService(Request $request)
    {
        $statusCode = 401;
        $message = "Select the valid service";
        $sellerId = $request->user()->id;
        if (!empty($sellerId) && is_numeric($sellerId) && $sellerId > 0) {
            if (isset($request->id) && !empty($request->id) && is_numeric($request->id) && $request->id > 0) {
                $serviceData = Services::find($request->id);
                if (isset($serviceData->id) && !empty($serviceData->id)) {
                    if (isset($serviceData->seller_id) && !empty($serviceData->seller_id)) {
                        if ($serviceData->seller_id == $sellerId) {
                            $serviceData->where('id',$sellerId)->update(array("is_deleted"=>1));
                            $statusCode = 200;
                            $message = "Service deleted successfully!";
                        } else {
                            $message = "You don't have permission to delete this product";
                        }
                    } else {
                        $message = "You don't have permission to delete this product";
                    }
                } else {
                    $message = "Unfortunately, service detail not available";
                }
            }
        } else {
            $statusCode = 403;
            $message = "Please login again";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message], $statusCode);
    }
}
