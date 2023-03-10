<?php

namespace App\Http\Controllers;

use App\Models\Img;
use App\Models\Items;
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

        return view('frontend.adminPanel.manager.index');
    }

    public function showItems(Request $req)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $categories = DB::table('categories')->get();
        $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')
            ->select('items.id as itemID', 'items.*', 'categories.*')->get();
        if ($req->catID && $req->catID != "all") {
            // $items = DB::table('items')->where('categories_id', '=', $req->catID)->get();
            $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')->where('items.categories_id', '=', $req->catID)
                ->select('items.id as itemID', 'items.*', 'categories.*')->get();
            return view('frontend.adminPanel.manager.items', compact('items', 'categories'));
        } else if ($req->dishName) {
            $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')->where('items.name', 'like', '%' . $req->dishName . '%')
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
        $item = Items::find($req->id);
        $item->delete();
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
        $categories = DB::table('categories')->get();

        return view('frontend.adminPanel.manager.categories', compact('categories'));
    }
}
