<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
    //

    public function login()
    {
        return view('authentication.login');
    }

    public function authorizeDashboard($user, $dashboard) //function to authorize user for accessing dashboards
    {
        // switch ($dashboard) {
        //     case 'admin':
        //         return $user->type == 'admin';
        //         break;
        //     case 'waiter':
        //         return $user->type == 'waiter';
        //         break;
        //     case 'cashier':
        //         return $user->type == 'cashier';
        //         break;
        //     default:
        //         return false;
        //         break;
        // }
        return true;
    }

    public function submitLogin(Request $req)
    {
        $req->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($req->only('email', 'password'))) {
            $user = User::where('email', $req->email)->first();
            $type = $user->type;
            if ($type == "waiter") {
                return redirect()->route('orderTableDashboard');
            } else if ($type == "cashier") {
                return redirect()->route('cashierDashboard');
            } else {
                return redirect()->route('managerDashboard');
            }
        } else {
            return back()->with('failed', 'Email or Password is Incorrect');
        }
    }
}
