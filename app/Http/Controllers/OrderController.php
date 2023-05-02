<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Img;
use App\Models\Items;
use App\Models\Order;
use App\Models\PendingOrder;
use App\Models\Table;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Nette\Utils\Arrays;
use PhpParser\Node\Expr\Cast\Array_;

class OrderController extends Controller
{
    //

    public function createOrderTable()
    {
        if (!Gate::allows('authorizeDashboard', 'waiter')) {
            return back();
        }
        $tables = Table::all();
        return view('frontend.adminPanel.order.orderTableDashboard', compact('tables'));
    }

    public function createOrder($tableID, $categoryPK = null)
    {
        if (!Gate::allows('authorizeDashboard', 'waiter')) {
            return back();
        }
        $categories = Categories::all();
        //initially loading the view wont have categoryID so 
        //assigning it with the first category id if its null

        if (!$categoryPK) {
            $categoryPK = $categories[0]->id;
        }

        $items = Categories::find($categoryPK)->items;
        $count = Categories::find($categoryPK)->items->count();
        $hasOrders = DB::table('pending_orders')->where(['table_id' => $tableID])->first();
        $images = array();
        foreach ($items as $item) {
            array_push($images, Items::find($item->id)->img);
        }


        return view('frontend.adminPanel.order.dashboard', compact('categories', 'categoryPK', 'items', 'images', 'count', 'tableID', 'hasOrders'));
    }

    public function addOrder(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'waiter')) {
            return back();
        }
        $table_id = $req->tableID;
        $item_id = $req->itemID;
        $item_quantity = $req->quantity;
        $price = Items::find($item_id)->price;
        $total = $price * $item_quantity;


        //if the item is already ordered on the same table add it and calculate total
        if ($order = PendingOrder::where(['table_id' => $table_id, 'item_id' => $item_id])->first()) {

            $order->quantity += $item_quantity;
            $order->total = $order->quantity * $order->price;
            $order->save();
        } else { // else create a new order
            PendingOrder::create(['item_id' => $item_id, 'table_id' => $table_id, 'quantity' => $item_quantity, 'price' => $price, 'total' => $total]);
        }

        return back();
    }

    public function confirmOrder($tableID)
    {
        if (!Gate::allows('authorizeDashboard', 'waiter')) {
            return back();
        }
        $orders = DB::table('pending_orders')->join('imgs', 'pending_orders.item_id', '=', 'imgs.items_id')->join('items', 'items.id', '=', 'pending_orders.item_id')->select('pending_orders.id as id', 'items.name', 'pending_orders.quantity', 'img_path')->where(['table_id' => $tableID])->get();

        return view('frontend.adminPanel.order.confirmOrder', compact('orders', 'tableID'));
    }
}
