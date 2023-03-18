<?php

namespace App\Http\Controllers;

use App\Models\Order;
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

    public function submitPendingOrders($id)
    {
        $pendingOrders = PendingOrder::where('table_id', '=', $id)->get();

        foreach ($pendingOrders as $pendingOrder) {

            $hasOrder = Order::where(['completed' => 0, 'table_id' => $id, 'item_id' => $pendingOrder->item_id])->first();
            if ($hasOrder) {
                $hasOrder->quantity += $pendingOrder->quantity;
                $hasOrder->total += $pendingOrder->total;
                $hasOrder->save();
            } else {
                Order::Create([
                    'item_id' => $pendingOrder->item_id,
                    'table_id' => $pendingOrder->table_id,
                    'quantity' => $pendingOrder->quantity,
                    'price' => $pendingOrder->price,
                    'total' => $pendingOrder->total,
                    'completed' => 0
                ]);
            }

            $pendingOrder->delete();
        }

        return redirect()->route('orderTableDashboard');
    }
}
