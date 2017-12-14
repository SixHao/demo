<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\banner;
use App\Http\Model\Cate;
use App\Http\Model\Goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

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

    //  商品搜索
    public function search(Request $request)
    {
        $data = $request->except('_token');
//        dd($data['search']);
        $cate = Cate::where('tname','like','%'.$data['search'].'%')->first();
//        dd($cate);
        if (!empty($cate->tid))
        {
            return $this->goodslist($cate->tid);
        }

        $goods = Goods::where('gname', ' like','%'.$data['search'].'%')->first();

        if (!empty($goods->tid))
        {
            return $this->goodslist($goods->tid);
        }
    }



//    商品列表
    public function goodslist($id)
    {
        static $i = '';
        static $goods = [];
        static $data;
        $data = Cate::where('pid',$id)->select('tid')->get();

        if ($data->count())
        {
            $i++;
            foreach ($data as $k=>$v)
            {
                $this->goodslist($v->tid);
            }
        } else {
            $goods[] = $data = Goods::where('tid',$id)->paginate(12);
//            dd($data);
        }


//        $cate = Cate::get();
//
////        dd($cate);
//        foreach($cate as $k=>$v)
//        {
//            foreach($v['sub'] as $m=>$n)
//            {
//                $res = $n;
//            }
//
//        }
//        dd($res);



        return view('home/goodslist',compact('goods','i','data'));
    }
    
}
