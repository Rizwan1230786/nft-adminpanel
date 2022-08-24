<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NfcRequest;
use App\Models\Seller;
use App\Models\Income;
use App\Models\GoldClient;
use App\Models\SellerLinks;
use App\Models\Customer;
use App\Models\Generalsetting;
use carbon\Carbon;
use Charts;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
  public function dashboardAnalytics()
  {

    $pageConfigs = ['pageHeader' => false];
    return view('admin/module/dashboard/dashboard-analytics', ['pageConfigs' => $pageConfigs]);
  }
  // Dashboard - Ecommerce
  public function dashboardEcommerce()
  {
    if (Auth::user()->role == 'admin') {
      Auth::user()->assignRole('admin');
    } else {
      Auth::user()->assignRole('subadmin');
    }
    $user = User::count();
    $customer = Customer::count();
    ////for getting total revenue
    $data = DB::table("incomes")->sum('revenue');
    ////for getting the last month revenue
    $date = Carbon::now()->subMonth()->startOfDay();
    $revenue = Income::where('month', '>=', $date)->latest()->value('revenue');
    /////for Calculating the profit
    // $date=GoldClient::latest()->value('order_date');
    // $profit=GoldClient::latest()->value('orders_payment');
    // $profit=$profit*0.05;
    ////for getting total data
    // $order=GoldClient::count('no_of_orders');
    // $total =GoldClient::sum('orders_payment');
    // $total=5/100*$total;
    $profit = 'test';
    $order = 'test';
    $total = 'test';
    $pageConfigs = ['pageHeader' => false];
    $allclient=Seller::count();
    $goldclient=Seller::where('plan','gold')->count();
    $personalclient=Seller::where('plan','personal')->count();
    $viewer =Seller::where('plan','gold')->count();
    $click = Seller::where('plan','personal')->count();
    $sellerlink=SellerLinks::count();
    return view('admin/module/dashboard/dashboard-ecommerce', ['pageConfigs' => $pageConfigs, 'user' => $user, 'customer' => $customer, 'revenue' => $revenue,  'data' => $data, 'profit' => $profit, 'order' => $order,'allclient'=>$allclient,'goldclient'=>$goldclient,'personalclient'=>$personalclient,'date' => $date,'total'=>$total,'viewer'=>$viewer,'click'=>$click,'sellerlink'=>$sellerlink]);
  }

}
  //






