<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Img;
use App\Models\Items;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ManagerController extends Controller
{
    //
    public function create()
    {

        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }

        return view('frontend.adminPanel.manager.dashboard');
    }

    public function showItems(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $categories = DB::table('categories')->whereNull('deleted_at')->get();
        $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')
            ->select('items.id as itemID', 'items.*', 'categories.*')->whereNull('items.deleted_at')->get();
        if ($req->catID && $req->catID != "all") {
            // $items = DB::table('items')->where('categories_id', '=', $req->catID)->get();
            $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')->where('items.categories_id', '=', $req->catID)->whereNull('items.deleted_at')
                ->select('items.id as itemID', 'items.*', 'categories.*')->get();
            return view('frontend.adminPanel.manager.items', compact('items', 'categories'));
        } else if ($req->dishName) {
            $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')->where('items.name', 'like', '%' . $req->dishName . '%')->whereNull('items.deleted_at')
                ->select('items.id as itemID', 'items.*', 'categories.*')->get();
        } {
            return view('frontend.adminPanel.manager.items', compact('items', 'categories'));
        }
    }

    public function editItem($id)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }

        $item = Items::find($id);
        $categories = DB::table('categories')->get();
        $img = DB::table('imgs')->where('items_id', '=', $id)->first();
        return view('frontend.adminPanel.manager.edit-items', compact('id', 'categories', 'img', 'item'));
    }

    public function saveEditItem(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $item = Items::find($req->id);
        $item->name = $req->name;
        $item->categories_id = $req->categories_id;
        $item->price = $req->price;
        $item->save();
        if ($img = $req->File('img')) {

            $imgDB = Img::where('items_id', '=', $req->id)->first();
            if (Storage::delete('/public/' . $imgDB->img_path)) {
                $response = $img->store('images', 'public');
                $imgDB->img_path = $response;
                $imgDB->save();
            }
        }
        return redirect()->route('showItems');
    }

    public function deleteItem(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $item = Items::find($req->id);
        $item->delete();
        return redirect()->route('showItems');
    }

    public function showEmployees()
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $employees = DB::table('employees')->join('employee_contacts', 'employees.id', '=', 'employee_contacts.employee_id')->get();
        return view('frontend.adminPanel.manager.employees', compact('employees'));
    }

    public function showCategories()
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $categories = DB::table('categories')->whereNull('deleted_at')->get();
        $counts = array();
        foreach ($categories as $category) {
            $count = DB::table('items')->whereNull('deleted_at')->where('categories_id', '=', $category->id)->count();
            array_push($counts, $count);
        }
        return view('frontend.adminPanel.manager.categories', compact('categories', 'counts'));
    }

    public function addCategory(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $req->validate([
            'name' => 'required',
        ]);
        Categories::Create([
            "cat_name" => $req->name
        ]);
        return back();
    }

    public function editCategory($id)
    {
        $category = Categories::find($id);
        return view('frontend.adminPanel.manager.edit-categories', compact('category'));
    }

    public function saveEditCategory(Request $req)
    {
        $req->validate([
            'name' => 'required',
        ]);
        $category = Categories::find($req->id);
        $category->cat_name = $req->name;
        $category->save();
        return redirect()->route('showCategories');
    }

    public function deleteCategory(Request $req)
    {
        $category = Categories::find($req->id);
        $category->delete();
        return redirect()->route('showCategories');
    }

    //show-reservations
    public function showReservations()
    {
        $reservations = Reservations::all();
        return view('frontend.adminPanel.manager.reservations', compact('reservations'));
    }
}
