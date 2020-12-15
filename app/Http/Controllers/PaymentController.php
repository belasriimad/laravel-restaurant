<?php

namespace App\Http\Controllers;

use App\Category;
use App\Servants;
use App\Table;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function index()
    {
        return view("payments.index")->with([
            "tables" => Table::all(),
            "categories" => Category::all(),
            "servants" => Servants::all()
        ]);
    }
}
