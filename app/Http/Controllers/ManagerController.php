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

    public function showItems()
    {
        if (!Gate::allows('authorizeDashboard', 'admin')) {
            return back();
        }
        $categories = DB::table('categories')->get();

        $items = DB::table('items')->join('categories', 'items.categories_id', '=', 'categories.id')->get();

        return view('frontend.adminPanel.manager.items', compact('items', 'categories'));
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