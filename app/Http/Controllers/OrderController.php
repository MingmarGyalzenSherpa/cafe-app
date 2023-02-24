<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Img;
use App\Models\Items;
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

            $items = Categories::find($categoryPK)->items;
            $images = array();
            foreach ($items as $item) {
                array_push($images, Items::find($item->id)->img);
            }

            // dd(Items::find(1)->img);
            return view('frontend.adminPanel.order.dashboard', compact('categories', 'categoryPK', 'items', 'images'));
        } else {
            return back();
        }
    }
}
