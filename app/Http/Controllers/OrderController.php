<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Img;
use App\Models\Items;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Nette\Utils\Arrays;
use PhpParser\Node\Expr\Cast\Array_;

class OrderController extends Controller
{
    //
    public function create($categoryPK = null)
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

        $images = array();
        foreach ($items as $item) {
            array_push($images, Items::find($item->id)->img);
        }


        // dd(Items::find(1)->img);
        return view('frontend.adminPanel.order.dashboard', compact('categories', 'categoryPK', 'items', 'images', 'count'));
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