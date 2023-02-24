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
    public function create($categoryPK = null)
    {

        if (Gate::allows('authorizeDashboard', 'waiter')) {
            $categories = Categories::all();
            if (!$categoryPK) {
                $categoryPK = $categories[0]->id;
            }
            dd($categoryPK);
            // $item = array();
            // $item['hi'] = [1, 2, 3];
            // dd($item);
            $itemsPerCategory = array();
            // foreach ($categories as $category) {

            //     // $itemsArr = array();
            //     $items = Categories::find($category->id)->items;
            //     $itemsPerCategory[$category->cat_name] = array();
            //     foreach ($items as $item) {
            //         $itemsArr = array();
            //         $itemsArr['id'] = $item->id;
            //         $itemsArr['name']  = $item->name;
            //         $itemsArr['categories_id'] = $item->categories_id;
            //         $itemsArr['price'] = $item->price;
            //         array_push($itemsPerCategory[$category->cat_name], $itemsArr);
            //     }
            // }

            return view('frontend.adminPanel.order.dashboard', compact('categories', 'itemsPerCategory'));
        } else {
            return back();
        }
    }
}
