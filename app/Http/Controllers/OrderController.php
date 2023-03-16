<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Img;
use App\Models\Items;
use App\Models\Order;
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
        $orders = Order::all()->where('completed', '=', 0);
        $images = array();
        foreach ($items as $item) {
            array_push($images, Items::find($item->id)->img);
        }


        // dd(Items::find(1)->img);
        return view('frontend.adminPanel.order.dashboard', compact('categories', 'categoryPK', 'items', 'images', 'count', 'tableID', 'orders'));
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
        if ($order = Order::where(['table_id' => $table_id, 'item_id' => $item_id, 'completed' => false])->first()) {

            $order->quantity += $item_quantity;
            $order->total = $order->quantity * $order->price;
            $order->save();
        } else { // else create a new order
            Order::create(['item_id' => $item_id, 'table_id' => $table_id, 'quantity' => $item_quantity, 'price' => $price, 'total' => $total, 'completed' => false]);
        }

        return back();
    }

    public function increaseQty($id)
    {
        if (!Gate::allows('authorizeDashboard', 'cashier')) {
            return back();
        }
        $order = Order::find($id);
        $order->quantity++;
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
        $order->save();
        return redirect()->route('billDashboard', $order->table->id);
    }
}
