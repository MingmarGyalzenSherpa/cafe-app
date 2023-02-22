<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class CashierController extends Controller
{
    //
    public function create()
    {
        if (Gate::allows('authorizeDashboard', 'cashier')) {
            return view('frontend.adminPanel.cashier.dashboard');
        } else {
            return back();
        }
    }
}
