<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function create()
    {
        return view('frontend.adminPanel.order.dashboard');
    }
}