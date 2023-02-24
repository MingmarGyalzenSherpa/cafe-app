<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemsController extends Controller
{
    //
    public function addItem(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'categories_id' => 'required',
            'img' => 'required',
            'price' => 'required',
        ]);

        $img = $req->hasFile('img');
    }
}
