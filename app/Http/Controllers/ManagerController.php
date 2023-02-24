<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ManagerController extends Controller
{
    //
    public function create()
    {
        if (Gate::allows('authorizeDashboard', 'admin')) {
            return view('frontend.adminPanel.manager.dashboard');
        } else {
            return back();
        }
    }
}
