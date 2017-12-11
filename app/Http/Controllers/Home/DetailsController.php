<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Goods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    //商品详情
    public function index(Request $request,$gid)
    {
    	$data = Goods::find($gid);
    	
    	return view('home/details',['data'=>$data]);
    }

    public function insertcart(Request $request)
    {
    	$input = $request->except('_token');
    	// return $data;
    	$data = Goods::find($input['gid']);
    	$data['bcnt'] = $input['bcnt'];
    	// return $data;
    	$res = session(['goods'=>$data]);
    	// $data = session('goods');
    	// return $data;
    	$arr = [];
    	if(!$res)
    	{
    		$arr['status'] = 1;
    		$arr['msg'] = '成功加入购物车';
    	} else {
    		$arr['status'] = 0;
    		$arr['msg'] = '加入购物车失败';
    	}
    	return $arr;

    }
}
