<?php

namespace App\Http\Controllers;

use App\Models\PendingOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PendingOrderController extends Controller
{
    //
    public function increaseQty($id)
    {
        if (!Gate::allows('authorizeDashboard', 'cashier')) {
            return back();
        }
        $order = PendingOrder::find($id);
        $order->quantity++;
        $order->total += $order->price;
        $order->save();
        return redirect()->route('confirmOrder', $order->table->id);
    }

    public function decreaseQty($id)
    {
        if (!Gate::allows('authorizeDashboard', 'cashier')) {
            return back();
        }
        $order = PendingOrder::find($id);
        $order->quantity--;
        if ($order->quantity == 0) {
            $order->delete();
        } else {

            $order->total -= $order->price;
            $order->save();
        }
        return redirect()->route('confirmOrder', $order->table->id);
    }
}
