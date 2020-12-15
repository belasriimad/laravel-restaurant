<?php

namespace App\Exports;

use App\Sales;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SalesExport implements FromView
{
    private $from;
    private $to;
    private $sales;
    private $total;

    public function __construct($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
        $this->sales = Sales::whereBetween("created_at", [$from, $to])
            ->where("payment_status", "paid")->get();
        $this->total = $this->sales->sum("total_received");
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('reports.export', [
            'total' => $this->total,
            'sales' => $this->sales,
            'to' => $this->to,
            'from' => $this->from,
        ]);
    }
}
