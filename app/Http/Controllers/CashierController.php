<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class CashierController extends Controller
{
    //
    public function create()
    {
        if (Gate::allows('authorizeDashboard', 'cashier')) {
            $tables = Table::all();
            return view('frontend.adminPanel.cashier.dashboard', compact('tables'));
        } else {
            return back();
        }
    }

    public function billDashboard($id)
    {
        dd($id);
    }
}
