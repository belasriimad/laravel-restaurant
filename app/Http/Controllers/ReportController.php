<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use App\Sales;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index()
    {
        return view("reports.index");
    }

    public function generate(Request $request)
    {
        //validation
        $this->validate($request, [
            "from" => "required",
            "to" => "required"
        ]);
        //get data
        $startDate = date("Y-m-d H:i:s", strtotime($request->from . "00:00:00"));
        $endDate = date("Y-m-d H:i:s", strtotime($request->to . "23:59:59"));
        $sales = Sales::whereBetween("created_at", [$startDate, $endDate])
            ->where("payment_status", "paid")->get();
        //return data
        return view("reports.index")->with([
            "startDate" => $startDate,
            "endDate" => $endDate,
            "total" => $sales->sum('total_received'),
            "sales" => $sales
        ]);
    }

    public function export(Request $request)
    {
        return Excel::download(new SalesExport($request->from, $request->to), "sales.xlsx");
    }
}
