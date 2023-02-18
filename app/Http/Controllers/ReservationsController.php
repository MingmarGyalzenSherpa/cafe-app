<?php

namespace App\Http\Controllers;

use App\Models\Reservations;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    //reserve a table
    public function reserveTable(Request $req)
    {

        $req->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'date' => 'required',
                'time' => 'required',
                'people' => 'required'
            ]
        );

        $name = $req->name;
        $email = $req->email;
        $phone = $req->phone;
        $date = $req->date;
        $time = $req->time;
        $people = $req->people;
        $message = $req->message;


        Reservations::create([
            'name' => $name, 'email' => $email, 'phone_no' => $phone, 'date' => $date, 'time' => $time,
            'guests' => $people, 'message' => $message
        ]);
    }
}
