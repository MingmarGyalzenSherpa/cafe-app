<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
        $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')->get();
        if ($req->catID && $req->catID != "all") {
            // $items = DB::table('items')->where('categories_id', '=', $req->catID)->get();
            $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')->where('items.categories_id', '=', $req->catID)->get();
            return view('frontend.adminPanel.manager.items', compact('items', 'categories'));
        } else if ($req->dishName) {
            $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')->where('items.name', 'like', '%' . $req->dishName . '%')->get();
        } {
            return view('frontend.adminPanel.manager.items', compact('items', 'categories'));
        }
    }

    public function editItem($id)
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $categories = DB::table('categories')->get();
        $img = DB::table('imgs')->where('items_id', '=', $id)->get();

        return view('frontend.adminPanel.manager.edit-items', compact('id', 'categories'));
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
