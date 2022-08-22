<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NfcRequest;
use PDF;
use PdfReport;
use carbon\Carbon;
class NfcRequestController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:NfcRequest-list|NfcRequest-create|NfcRequest-edit|NfcRequest-delete', ['only' => ['index','show']]);
         $this->middleware('permission:NfcRequest-create', ['only' => ['create','submit']]);
         $this->middleware('permission:NfcRequest-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:NfcRequest-delete', ['only' => ['destroy']]);
    }
    public function index(){
        $user=NfcRequest::orderBy('id', 'DESC')->get();
        return view('admin.module.NfcRequest.index',compact('user'));
    }
    public function detail(Request $req){
        $detail=NfcRequest::where('id',"=", $req->id)->first();
        return view('admin.module.NfcRequest.detail',compact('detail'));
    }
    public function destory($id){
        $user=NfcRequest::find($id);
        $user->delete();
        if(isset($user) && !empty($user)){
            return response(['status'=>true]);
        }else{
            return response(['status'=>false]);
        }
    }
    public function weeklypdf() {
        $date = Carbon::now()->subDays(7)->startOfDay();
        $data = NfcRequest::where('created_at', '>=', $date)->get();
        $pdf = PDF::loadView('mypdf', compact('data'));
        return $pdf->download('file.pdf');
    } 
    public function monthlypdf() {
        $date = Carbon::now()->subMonth()->startOfDay();
        $data = NfcRequest::where('created_at', '>=', $date)->get();
        $pdf = PDF::loadView('mypdf', compact('data'));
        return $pdf->download('file.pdf');
    }   
}
