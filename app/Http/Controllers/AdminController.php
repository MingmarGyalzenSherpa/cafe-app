<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function login()
    {
        return view('authentication.login');
    }

    public function loginSubmit(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    }
}
