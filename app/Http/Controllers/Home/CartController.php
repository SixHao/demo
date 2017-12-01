<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //
    public function shopcart()
    {
        return view('Home/shopcart');
    }

    public function cart()
    {
        $data = \DB::table('goods')->get();
        return view('Home/shopcart',['data' => $data]);
    }
}
