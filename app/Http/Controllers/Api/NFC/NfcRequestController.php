<?php

namespace App\Http\Controllers\Api\NFC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NFC\NfcCrud;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;
use App\Models\NfcRequest;

/**
 * @group NFC request app
 *
 * APIs endpoints for managing NFC requests
 */
class NfcRequestController extends Controller
{
    public function submit(NfcCrud $request){
        $data=$request->all();
        if(isset($data) && !empty($data)){
            $email_data = array( 'email' => "rizwan.13347@gmail.com", 'data'  => $data);
            Mail::send('admin.module.email.contactus', $email_data, function ($message) use ($email_data) {
                $message->to($email_data['email'])->subject('Request from customer for Nfc Cart');
            });
            $query=NfcRequest::create($data);
            $receiverNumber = "+923047122971";
            $message = "Thank you Mr.$query->name for contact us and Allset team contact you after 24 hours's.";
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");
            $client = new Client($account_sid, $auth_token);
            $client->messages->create($receiverNumber, [
                'from' => $twilio_number,
                'body' => $message,
            ]);
        }
        if (isset($query) && !empty($query)) {
            return response(['status' => true, 'message' => 'Thank You For Sending Nfc Request']);
        } else {
            return response(['status' => false, 'message' => 'Somethings went wrong']);
        }
    }
}
