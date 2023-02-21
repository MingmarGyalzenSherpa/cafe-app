<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function create()
    {
        $categories = DB::table('categories')->get();
        $items = DB::table('items')->get();
        return view('frontend.adminPanel.order.dashboard', ['categories' => $categories, 'items' => $items]);
    }
}
