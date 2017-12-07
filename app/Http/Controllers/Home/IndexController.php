<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends CommonController
{
    /*
     *前台首页模块
     * return view
     */
    public function index()
    {
        //获取所有分类
        $cates = self::getCatePid();
//        dd($cates);
        return view('Home/index',compact('cates'));
    }

    
}
