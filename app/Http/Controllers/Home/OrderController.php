<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\friend;
use App\Http\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        //        获取友情链接
        $friend = friend::get();
        return view('Home/order',compact('friend'));

    }
}
