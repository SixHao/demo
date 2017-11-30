<?php

namespace App\Http\Controllers\Admin\Goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    public function add()
    {
    	return view('admin/goods/add');
    }
}
