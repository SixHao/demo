<?php

namespace App\Http\Controllers\Admin\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class IndexController extends Controller
{
    /**
     * 后台模板首页
     * @author  SixHao
     * @date 2017-11-28
     * return view
     */

    public function index()
    {
        Session::get('users');
        return view('Admin/Index/index');
    }

}
