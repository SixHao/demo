<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {

        return view('Home/order',setTimeout('home/index',5000));

    }
}
