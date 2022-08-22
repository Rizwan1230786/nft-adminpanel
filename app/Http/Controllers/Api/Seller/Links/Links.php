<?php

namespace App\Http\Controllers\Api\Seller\Links;

use App\Http\Controllers\Controller;
use App\Http\Requests\Seller\CreateSellerLinks;
use App\Http\Requests\Seller\DeleteSellerLink;
use App\Http\Requests\Seller\DeleteServicesFromLink;
use App\Http\Traits\Helpers;
use App\Models\Seller;
use App\Models\SellerLinks;
use App\Models\LinksService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
/**
 * @group Seller Links
 *
 * APIs endpoints for managing seller
 */
class Links extends Controller
{
    use Helpers;
    /**
     * Create or Update Seller Links
     *
     * @bodyParam image file required Seller profile picture.
     *
     * @response {
     *   "status": true/false,
     *   "message": string,
     * }
     *
     */
    public function createLink(CreateSellerLinks $request)
    {
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $sellerId = $request->user()->id;
        $postData = $request->all();
        $sellerDetail =  Seller::find($sellerId, ['status', 'plan']);
        if (isset($sellerDetail->status) && !empty($sellerDetail->status)) {
            if ($sellerDetail->status == 1) {
                $storedData = array("seller_id" => $sellerId, "fullname" => ($postData["fullName"] ?? null), "displayname" => ($postData["displayName"] ?? null), "link" => ($postData["link"] ?? null), "link" => ($postData["link"] ?? null), "is_deleted" => (0 ?? null),);
                if (isset($postData["id"]) && !empty($postData["id"])) {
                    $statusCode = 200;
                    $message = "Link update successfully";
                    SellerLinks::where("id", $postData["id"])->update($storedData);

                    $data = SellerLinks::select('id', 'link', 'fullname')->where('id', $postData["id"])->first();
                } else {
                    $continue = false;
                    if (isset($sellerDetail->plan) && !empty($sellerDetail->plan)) {
                        $previousLinks =  SellerLinks::where('seller_id', '=', $sellerId)->get();
                        if ($sellerDetail->plan == "gold" || $previousLinks->count() < 1) {
                            $continue = true;
                            $message = "Link create successfully";
                        } else {
                            $message = "You reached your exceeded limit, upgrade your plan";
                        }
                    }
                    if ($continue == true) {
                        $statusCode = 200;
                        $postData["id"] = SellerLinks::create($storedData)->id;
                        $data = SellerLinks::select('id', 'link', 'fullname', 'image')->where('id', $postData["id"])->first();
                    }
                }
                if ($statusCode == 200 && isset($postData["id"]) && !empty($postData["id"])) {
                    if (isset($request->image) && !empty($request->image)) {
                        $oldImage =  SellerLinks::find($postData["id"], ["image"]);
                        if (isset($oldImage->image) && !empty($oldImage->image)) {
                            $oldImage = public_path(Config('constants.seller_link_directory') . '/' . $oldImage->image);
                            if (File::exists($oldImage)) {
                                File::delete($oldImage);
                            }
                        }
                        $dataa['image'] = $imageName = time() . '.' . $request->image->extension();
                        $request->image->move(public_path(Config('constants.seller_link_directory')), $imageName);
                        $data = SellerLinks::where("id", $postData["id"])->update($dataa);
                        $data = SellerLinks::select('id', 'link', 'fullname', 'image')->where('id', $postData["id"])->first();
                        $image_path = 'public/uploads/seller-link';
                        $image_name = $dataa['image'];
                        $path = null;
                        if (isset($image_name) && !empty($image_name)) {
                            if (filter_var($image_name, FILTER_VALIDATE_URL)) {
                                $client = new Client();
                                $response = $client->request('get', $image_name);
                                if (!empty($response)) {
                                    return $response;
                                } else if (file_exists($image_name))
                                    $path = $image_name;
                            } else if (file_exists($image_path . '/' .  $image_name))
                                $path = $image_path . '/' . $image_name;
                        }
                        if (!empty($dataa['image'])) {
                            $data['image'] = 'https://allset.itsumar.com' . '/' . $path;
                        } else {
                            $data['image'] = $path;
                        }
                    }
                }
            } else {
                $message = "Unfortunately, you are blocked by the admin. Contact with the support team.";
            }
        } else {
            $message = "Unfortunately, you are blocked by the admin. Contact with the support team.";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message, "data" => ($data ?? array()),], $statusCode);
    }
    /**
     * Get Seller Links List
     *
     * @bodyParam page Its an optional, by default its consider as 1. Example: 1
     * @bodyParam limit Its an optional, by default its consider as 20. Example: 20
     *
     * @response {
     *   "status": true/false,
     *   "message": string/null,
     *   "data": [
     *   {
     *       "id": number/null,
     *       "link": string/null,
     *       "fullname": string/null,
     *       "displayname": string/null,
     *       "image": string/null,
     *       "services": [
     *           {
     *               "linkServiceId": number/null,
     *               "serviceId": number/null,
     *               "name": string/null,
     *               "price": string/null
     *           }
     *       ]
     *  }
     *  ],
     *   "nextPage": true/false,
     *   "limit": number/20
     *  }
     */
    public function getLinksList(Request $request)
    {
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $sellerId = $request->user()->id;
        $limit = (isset($request->limit) && !empty($request->limit) && is_numeric($request->limit) ? (int)$request->limit : 20);
        $nextPage = false;
        $data = array();
        if (isset($sellerId) && !empty($sellerId)) {
            $paginate = SellerLinks::select('id', 'link', 'fullname', 'displayname', 'image')->where(array('seller_id' => $sellerId, "is_deleted" => "0"))->paginate($limit);
            $data = $paginate->items();
            $nextLink = $paginate->nextPageUrl();
            $nextPage = (isset($nextLink) && !empty($nextLink) ? true : $nextPage);
            if (isset($data) && !empty($data)) {
                foreach ($data as $item) :
                    $services = LinksService::where('link_id', $item->id)->with('getLinkServices')->get();
                    if (!empty($services)) {
                        $temp = array();
                        foreach ($services as $innerItem) :
                            if (isset($innerItem["getLinkServices"]) && !empty($innerItem["getLinkServices"])) {
                                foreach ($innerItem["getLinkServices"] as $linkItem) :
                                    $temp[] = array("linkServiceId" => ($innerItem["id"] ?? 0), "serviceId" => ($innerItem["service_id"] ?? 0), "name" => ($linkItem["product_name"] ?? null), "price" => ($linkItem["price"] ?? 0.00));
                                endforeach;
                            }
                        endforeach;
                        $services = $temp;
                    }
                    $item->services = $services;
                    $item['image'] = $this->imageDefaultPath(Config('constants.seller_link_directory'), ($item['image'] ?? ""), Config('constants.api_images_link'),  Config('constants.seller_default_link_name'));
                endforeach;
            }
            $statusCode = 200;
            $message = "Here is your services and links!";
        } else {
            $message = "Please login first";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => ($statusCode == 200 ?  $message : $message), "data" => ($data ?? array()), 'nextPage' => $nextPage, 'limit' => $limit], $statusCode);
    }
    /**
     * Delete Seller Link
     *
     * @bodyParam linkId string required Full name of the Seller. Example: 1
     *
     * @response {
     *   "status": true/false,
     *   "message": string
     * }
     *
     */
    function deleteSellerLink(DeleteSellerLink $request)
    {
        $message = "Fill the data in proper way!";
        $linkId = $request->linkId;
        if (!empty($linkId)) {
            $statusCode = 200;
            $message = "Link delete successfully";
            LinksService::where("link_id", $linkId)->delete();
            SellerLinks::where("id", $linkId)->delete();
        } else {
            $message = "Select the link";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message], $statusCode);
    }
    /**
     * Attach Product With Links
     *
     * @bodyParam LinkId and service parameter are required. Service should be array type and each row should be exist on id parameter. Example: {"linkId": 1,"service": [{"id": 1},{"id": 2},{"id": 3}]}
     *
     * @response {
     *   "status": true/false,
     *   "message": string,
     * }
     *
     */
    public function attachProductWithLinks(Request $request)
    {
        $statusCode = 401;
        $message = "Fill the data in proper way!";
        $sellerId = $request->user()->id;
        if (!empty($sellerId) && is_numeric($sellerId) && $sellerId > 0) {
            $linkId = $request->linkId;
            $service = array_map("unserialize", array_unique(array_map("serialize", $request->service)));

            $tempservice = array();
            foreach ($service as $item) :
                $tempservice[] = $item['id'];
            endforeach;
            $previousCounter =  LinksService::where('link_id', $linkId)->whereNotIn("service_id", $tempservice)->count();
            $totalCounter = count($request->service) + $previousCounter;
            if ($totalCounter <= 3) {
                $statusCode = 200;
                $message = "Service add successfully";
                foreach ($service as $item) :
                    LinksService::updateOrCreate(
                        ['link_id' => $linkId, 'service_id' => $item["id"]],
                        ['link_id' => $linkId, 'service_id' => $item["id"]]
                    );
                endforeach;
            } else {
                $previousCounter =  LinksService::where('link_id', $linkId)->count();
                $message = "You already attach " . $previousCounter . " services, you can attach " . (3 - $previousCounter) . " more";
            }
        } else {
            $statusCode = 403;
            $message = "Please login again";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message], $statusCode);
    }
    /**
     * Delete Services From Link
     *
     * @bodyParam LinkId and service parameter are required. Service should be array type and each row should be exist on id. Example: {"linkId": 1,"service": [{"id": 1},{"id": 2},{"id": 3}]}
     *
     * @response {
     *   "status": true/false,
     *   "message": string,
     * }
     *
     */
    function deleteServiceFromLink(DeleteServicesFromLink $request)
    {
        $message = "Fill the data in proper way!";
        $linkId = $request->linkId;

        $service = array_map("unserialize", array_unique(array_map("serialize", $request->service)));
        if (!empty($service)) {
            $statusCode = 200;
            $message = "Service delete successfully";
            $tempservice = array();
            foreach ($service as $item) :
                $tempservice[] = $item['id'];
            endforeach;
            LinksService::where("link_id", $linkId)->whereIn("service_id", $tempservice)->delete();
        } else {
            $message = "Select the services in valid format";
        }
        return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message], $statusCode);
    }
}
