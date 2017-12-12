<?php

namespace App\Http\Controllers\Admin\Order;

use App\Http\Controllers\Controller;
use App\Http\Model\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        // $data = Order::table('orders');
        // //加载模板
        return view('admin.order.index');
    }

}
