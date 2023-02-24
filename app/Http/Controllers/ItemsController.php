<?php

namespace App\Http\Controllers;

use App\Models\Img;
use App\Models\Items;
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

        if ($img = $req->File('img')) {
            $item_id = Items::Create([
                'name' => $req->name,
                'categories_id' => $req->categories_id,
                'price' => $req->price,
            ])->id;

            $response = $img->store('images', 'public');
            Img::Create([
                'img_path' => $response,
                'items_id' => $item_id,
            ]);
        }
    }
}
