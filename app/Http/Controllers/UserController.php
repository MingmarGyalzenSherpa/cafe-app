<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function loginUser(Request $req)
    {

        return view('home');
    }
}
