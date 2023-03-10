<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CashierController extends Controller
{
    //
    public function create()
    {
        if (!Gate::allows('authorizeDashboard', 'cashier')) {
            return back();
        }

        $tables = Table::all();
        return view('frontend.adminPanel.cashier.dashboard', compact('tables'));
    }

    public function billDashboard($id)
    {
        if (!Gate::allows('authorizeDashboard', 'cashier')) {
            return back();
        }
        $orders = Table::find($id)->orders;
        $count = $orders->count();
        $subTotal = 0;
        $items = array();
        foreach ($orders as $order) { //getting item name by accessing item_id from order

            array_push($items, DB::table('items')->find($order->item_id)->name);
            $subTotal += $order->total;
        }
        return view('frontend.adminPanel.cashier.bill', compact('orders', 'items', 'count', 'subTotal'));
    }


    public function increaseQty($id)
    {
        if (!Gate::allows('authorizeDashboard', 'cashier')) {
            return back();
        }
        $order = Order::find($id);
        $order->quantity++;
        $unitPrice = Items::find($order->item_id)->first()->item_id;
        dd($unitPrice);
        $order->save();
        return redirect()->route('billDashboard', $order->table->id);
    }

    public function decreaseQty($id)
    {
        if (!Gate::allows('authorizeDashboard', 'cashier')) {
            return back();
        }
        $order = Order::find($id);
        $order->quantity--;
        // dd($order->quantity);
        if ($order->quantity == 0) {
            $order->delete();
        } else {
            $order->save();
        }
        return redirect()->route('billDashboard', $order->table->id);
    }
}
