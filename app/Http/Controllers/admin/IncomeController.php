<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Income;
use Illuminate\Support\Facades\DB;
use PDF;
use PdfReport;

class IncomeController extends Controller 
{
    private $user;
    function __construct(Income $user)
    {
        $this->user = $user;
        $this->middleware('permission:incomereport-list|incomereport-create|incomereport-edit|incomereport-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:incomereport-create', ['only' => ['create', 'submit']]);
        $this->middleware('permission:incomereport-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:incomereport-delete', ['only' => ['destroy']]);
    }
    //// function for view income list  
    public function index()
    {
        $pageConfigs = ['pageHeader' => false];
        $user=$this->user->index();
        return view('admin/module/IncomeReport/income-list', compact('pageConfigs', 'user'));
    }
    ////function of view page of form
    public function create()
    {
        return view('admin/module/IncomeReport/form-income');
    }
    ////function for inserting data
    public function submit(Request $request)
    {
        $variable = new Income();
        $variable->month = $request->month;
        $variable->no_card_sell = $request->no_card_sell;
        $variable->revenue = $request->revenue;
        $variable->expences = $request->expences;
        if ($request->expences > $request->revenue) {
            $variable->profit = 0;
            $variable->loss = $request->expences - $variable->revenue;
        } else {
            $variable->profit = $request->revenue - $request->expences;
            $variable->loss = 0;
        }
        $variable->save();
        return redirect('/admin/IncomeReport/list');
    }
    //// function for status
    public function status(Request $request)
    {
        $user = Income::find($request->id);
        $user->status = $request->status;
        $user->save();
        return response()->json(['status' => true]);
    }
    public function displayReport(Request $request)
    {
        // Retrieve any filters
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
        $sortBy = $request->input('genrated_by');
        $startDate = date('d-m-Y', strtotime($fromDate));
        $endDate = date('d-m-Y', strtotime($toDate));
        date_default_timezone_set("asia/karachi");
        // Report title
        $title = 'Income Report';
        $meta = [
            'Created at' => $startDate . ' To ' . $endDate,
            'Generated By' => $sortBy,
            'Date' => date('d M Y'),
            'Time' => date('h:i:sa')
        ];
        // Do some querying..
        $queryBuilder = Income::select(['revenue', 'expences', 'profit', 'loss', 'month'])
            ->whereBetween('month', [$fromDate, $toDate]);
        $columns = [
            'Date' => 'month',
            'Revenue' => 'revenue',
            'Expences' => 'expences',
            'Profit' => 'profit',
            'Loss' => 'loss',
            'Total Profit' => 'profit',
            'Status' => function ($result) {
                if ($result->profit) {
                    return ($result->profit > 10000) ? 'Good' : 'Normal';
                } else {
                    return 'Loss';
                }
            }
        ];
        return PdfReport::of($title, $meta, $queryBuilder, $columns)
            ->editColumn('Date', [
                'displayAs' => function ($result) {
                    $month = date("d M Y", strtotime($result->month));
                    return $month;
                }
            ])
            ->editColumn('Loss', [
                'displayAs' => function ($result) {
                    return $result->loss;
                },
                'class' => 'center'
            ])
            ->editColumn('Total Profit', [
                'displayAs' => function ($result) {
                    return $result->profit;
                }
            ])
            ->editColumns(['Total Profit', 'Status'], [
                'class' => 'right bold'
            ])
            ->showTotal([
                'Total Profit' => '$' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
            ])
            ->stream(); // or download('filename here..') to download pdf
    }
}
