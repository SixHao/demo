<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Goods;
use App\Http\Model\Cart;
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
        $gid = $_POST['gid'];

    	$input = $request->except('_token');
    	// return $data;
    	$data = Goods::find($input['gid']);
    	$data['bcnt'] = $input['bcnt'];
    	// return $data;
        $user = session('husers');
    	if($user){
            $carts = Cart::where('uid', $user['uid'])->get();
            $cart = new Cart();
            $cart->uid = Session('husers')['uid'];
            $cart->gid = $gid;
            $res = $cart->save();
            // dd($res)
            $arr = [];
            if(!$res)
            {
                $arr['status'] = 1;
                $arr['msg'] = '成功加入购物车';
            } else {
                $arr['status'] = 0;
                $arr['msg'] = '加入购物车失败';
            }
        } else {
            $seg = [];
            $goods = Goods::find($gid)->toArray();
            // return $goods;
            $res = session(['goods', $goods]);
            // $res1 = session('goods');
             // return $res;
            // foreach (session('goods') as $k => $v) {
            //     $seg = $v->gid;
            // }
            // $seg = $res1->gid;

            // $res = in_array($gid,$seg);
            // return $res;
            $arr = [];
            if(!$res)
            {
                $arr['status'] = 1;
                $arr['msg'] = '成功加入购物车';
            } else {
                $arr['status'] = 0;
                $arr['msg'] = '加入购物车失败';
            }
        }
        return $arr;
    }
}
