<?php
namespace App\Http\Traits;
use Illuminate\Support\Facades\Request;
use GuzzleHttp\Client;
trait Helpers {
    function imageDefaultPath($imagePath,$imageName,$defaultPath,$defaultName)
    {
        $path = $defaultPath.'/'.$defaultName;
        if (isset($imageName) && !empty($imageName) && isset($imagePath) && !empty($imagePath)) {
            if (filter_var($imageName, FILTER_VALIDATE_URL)) {
                $client = new Client();
                $response = $client->request('get', $imageName);
                if (!empty($response)) {
                    return $response;
                }
            } else if (file_exists($imagePath.'/'.$imageName))
                $path = $imagePath.'/'.$imageName;
        }
        $path = Request::root() . '/' . $path;
        return $path;
    }
}
