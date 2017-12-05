<?php

namespace App\Http\Controllers\Admin\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function list(Request $request)
    {
        $count=$request->input('count',10);
        $search=$request->input('search','');
        $request=$request->all();
        //查询数据并分页
        $data = Order::where('post_number','like','%'.$search.'%')->paginate($count);
        //加载模板
        return view('admin.order.list',['data'=>$data,'request'=>$request]);
    }



}
