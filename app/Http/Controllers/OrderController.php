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

            $items = Categories::find($categoryPK)->items;
            dd($items);
            return view('frontend.adminPanel.order.dashboard', compact('categories', 'categoryPK', 'items'));
        } else {
            return back();
        }
    }
}
