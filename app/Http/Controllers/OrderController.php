<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Nette\Utils\Arrays;
use PhpParser\Node\Expr\Cast\Array_;

class OrderController extends Controller
{
    //
    public function create()
    {


        if (Gate::allows('authorizeDashboard', 'waiter')) {
            $categories = Categories::all();
            $items = Categories::find(1)->items;
            // $items = array();
            dd($items);

            // $categories = DB::table('categories')->get();

            // $items = DB::table('items')->get();
            // return view('frontend.adminPanel.order.dashboard', compact('categories', 'items'));
        } else {
            return back();
        }
    }
}