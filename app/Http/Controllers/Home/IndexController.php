<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\banner;
use App\Http\Model\Cate;
use App\Http\Model\Goods;
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
        // 获取所有分类
        $cates = self::getCatePid();

        // 获取轮播图
           $banner =  banner::orderBy('bid','desc')->take(4)->get();

        // 获取活动列表
        $active = \DB::table('activitys')->where('is_over',1)->take(4)->get();

        // 获取类别详情
        $data = Cate::get();

        // 获取所有的商品
        $goods = Goods::get();

        return view('Home/index',compact('cates','banner','active','data','goods'));
    }

    
}
