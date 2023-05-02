<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Items;
use App\Models\Order;
use App\Models\Sale;
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
        $orders = DB::table('orders')->where(['table_id' => $id, 'completed' => false])->get();
        $count = $orders->count();
        $subTotal = 0;
        $items = array();
        foreach ($orders as $order) { //getting item name by accessing item_id from order

            array_push($items, DB::table('items')->find($order->item_id)->name);
            $subTotal += $order->total;
        }
        $charges = Charge::all();

        $total = $subTotal;
        foreach ($charges as $charge) {
            if ($charge->type == 'A') {
                $total += $charge->amount;
            } else if ($charge->type == 'D') {
                $total -= $charge->amount;
            } else if ($charge->type == 'P') {
                $total += ($subTotal * $charge->amount) / 100;
            }
        }

        return view('frontend.adminPanel.cashier.bill', compact('id', 'orders', 'items', 'count', 'subTotal', 'charges', 'total'));
    }


    public function increaseQty($id)
    {
        if (!Gate::allows('authorizeDashboard', 'cashier')) {
            return back();
        }
        $order = Order::find($id);
        $order->quantity++;
        $unitPrice = DB::table('items')->find($order->item_id)->price;
        $order->total += $unitPrice;
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

            $unitPrice = DB::table('items')->find($order->id)->price;
            $order->total -= $unitPrice;
            $order->save();
        }
        return redirect()->route('billDashboard', $order->table->id);
    }

    public function billPayment($id, $total)
    {
        return view('frontend.adminPanel.cashier.billPayment', compact('id', 'total'));
    }

    public function confirmPayment(Request $req)
    {
        $req->validate([
            'tendered' => 'required',
            'charged' => 'required',
        ]);

        $tendered = $req->tendered;
        $saleID = Sale::Create(['amount' => $req->charged])->id;


        $orders = Order::where(['table_id' => $req->tableID, 'completed' => false])->get();
        // $orders = DB::table('orders')->where(['table_id' => $req->tableID, 'completed' => false])->get();
        foreach ($orders as $order) {
            $order->completed = true;
            $order->sale_id = $saleID;
            $order->save();
        }
        // return redirect()->route('invoice', [$saleID, $tendered]);
        return redirect()->route('confirmBill', compact('saleID', 'tendered')); 

        // return redirect()->route('cashierDashboard');
    }

    public function confirmedBill($saleID, $tendered)
    {
        return view('frontend.adminPanel.cashier.billConfirmed', compact('saleID', 'tendered'));
    }
}