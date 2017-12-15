<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Goods;
use App\Http\Model\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        $gid = $_POST['gid'];

    	$input = $request->except('_token');
        $user = session('husers');
        // return $user;
    	if($user){
            $cart = new Cart();
            $cart->uid = Session('husers')['id'];
            $cart->gid = $input['gid'];
            $cart->cnt = $input['bcnt'];
            $cart->otime = date('Y-m-d', time());
            $res = $cart->save();
            // return $res;
            // dd($res)
            $arr = [];
            if(!$res)
            {
                $arr['status'] = 0;
                $arr['msg'] = '加入购物车失败';
                
            } else {
                
                $arr['status'] = 1;
                $arr['msg'] = '成功加入购物车';
            }
        } else {
            return \Redirect::to('home/login/login')->with('login_errors','您还没有登录，请先登录！');
        }
        return $arr;
    }
}
