<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;


class CashierController extends Controller
{
    //
    public function create()
    {
        if (Gate::allows('authorizeDashboard', 'cashier')) {
            $tables = Table::all();
            return view('frontend.adminPanel.cashier.dashboard', compact('tables'));
        } else {
            return back();
        }
    }

    public function billDashboard($id)
    {
        $orders = Table::find($id)->orders;
        $count = $orders->count();
        $subTotal = 0;
        $items = array();
        foreach ($orders as $order) { //getting item name by accessing item_id from order

            array_push($items, DB::table('items')->find($order->item_id)->name);
            $subTotal += $order->total;
        }

        if (Gate::allows('authorizeDashboard', 'cashier')) {
            return view('frontend.adminPanel.cashier.bill', compact('orders', 'items', 'count', 'subTotal'));
        } else {
            return back();
        }
    }
}
