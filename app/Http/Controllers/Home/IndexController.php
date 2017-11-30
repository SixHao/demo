<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /*
     *前台首页模块
     * return view
     */
    public function index()
    {
        return view('Home/index');
    }
}
