<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class LanguageController extends Controller
{
    public function reauth_stripe(){
        return view('admin.module.stripacount.reauthstrip');
    }
    //
    public function swap($locale){
         // available language in template array
        $availLocale=['en'=>'en', 'fr'=>'fr','de'=>'de','pt'=>'pt','ru'=>'ru','ch'=>'ch'];
        // check for existing language
        if(array_key_exists($locale,$availLocale)){
            session()->put('locale',$locale);
        }
         return redirect()->back();
    }
    public function cache_clear(){
        $type="error";
        $clear=Artisan::call('cache:clear');
        if(isset($clear) && $clear == 0){
            $type="success";
            $message="Cache Cleared Succefully";
        }
        return response()->json(['type'=>$type,'message'=>$message]); 
        // Artisan::call('route:cache');
        // Artisan::call('view:clear');
        // Artisan::call('config:cache');
    }
}
