<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function login()
    {
        return view('authentication.login');
    }

    public function submitLogin(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($req->only('email', 'password'))) {
            return redirect()->route('orderDashboard');
        } else {
            return back()->with('failed', 'Email or Password is Incorrect');
        }
    }
}