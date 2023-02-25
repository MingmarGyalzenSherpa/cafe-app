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
        $items = array();
        foreach ($orders as $order) {

            array_push($items, DB::table('items')->find($order->item_id)->name);
        }
        if (Gate::allows('authorizeDashboard', 'cashier')) {
            return view('frontend.adminPanel.cashier.bill', compact('orders', 'items', 'count'));
        } else {
            return back();
        }
    }
}
