<?php

namespace App\Http\Controllers\Api\Webpages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Web;

/**
 * @group Webpages app
 *
 * APIs endpoints for managing webpages
 */
class WebController extends Controller
{
  public function webpages_show_provider($provider)
  {
    $statusCode = 401;
    $message = "Fill the data in proper way!";
    if (isset($provider) && !empty($provider)) {
      $data = Web::select('page_content')->where("page_title", $provider)->first();
      if(isset($data) && !empty($data->page_content)){
        $statusCode = 200;
        $message = "Here is your" ." ". $provider ." "."HTML!";
      }
    }
    return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message, "data" => ($data ?? array())], $statusCode);
  }
  public function webpages_show()
  {
    $statusCode = 200;
    $message = "Here is your HTML!";
    $data = Web::select('page_content')->get();
    if(!$data){
      $statusCode = 401;
    $message = "Opss nothing to show!";
    }
    return response(['status' => ($statusCode == 200 ? true : false), 'message' => $message, "data" => ($data ?? array())], $statusCode);
  }
}
