<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CashierController extends Controller
{
    //
    public function create()
    {
        return view('frontend.adminPanel.cashier.dashboard');
    }
}
