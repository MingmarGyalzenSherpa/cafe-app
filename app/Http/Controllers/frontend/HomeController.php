<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index($catID = null)
    {
        $categories = Categories::all()->whereNull('deleted_at');
        if (!$catID) {
            $activeID = $categories[0]->id;
        } else {
            $activeID = $catID;
        }

        // dd($categories);
        $items = DB::table('items')->join('imgs', 'items.id', '=', 'imgs.items_id')->whereNull('items.deleted_at')->get();
        // dd($items);
        return view('frontend.index', compact('categories', 'items', 'activeID'));
    }
}
