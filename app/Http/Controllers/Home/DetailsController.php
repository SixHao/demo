<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\Goods;
use App\Http\Model\address;
use App\Http\Model\Cart;
use App\Http\Model\Order;
use App\Http\Model\Husers;
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
    	// dd($data);
    	return view('home/details',['data'=>$data]);
    }

    public function insertcart(Request $request)
    {
        $gid = $_POST['gid'];
         $arr = [];

    	$input = $request->except('_token');

        $user = session('husers');
        // return $user;
    	if($user){
            $cart = new Cart();
            $cart->uid = Session('husers')['id'];
            $cart->gid = $input['gid'];
            $cart->cnt = $input['bcnt'];
            $cart->otime = date('Y-m-d H:i:s', time());
            $res = $cart->save();
            // return $res;
            // dd($res)
           
            if(!$res)
            {
                $arr['status'] = 0;
                $arr['msg'] = '加入购物车失败';
                
            } else {
                
                $arr['status'] = 1;
                $arr['msg'] = '成功加入购物车';
            }
            
        } else {
            $arr['status'] = 2;
            $arr['msg'] = '您还没有登录，请登录';
        }
        return $arr;
        
    }

    // 立即购买，商品加入订单页
    public function insertpay(Request $request)
    {
        //  // $gid = $_POST['gid'];
        // $uid = session('husers');
        // // dd($uid);
        // $uname = session('husers')->username;
        // $arr = [];
        // $input = $request->except('_token');
        // // dd($input);
        // $gid = $input['gid'];
        // $user = session('husers');
        // // return $user;
        // if($user){
        //     $order = new Order();
        //      // dd($order);
        //     $order->ucnt = $input['bcnt'];
        //     $order->ormb = Goods::select(['gprice'])->find($gid);
        //     $order->rec = Husers::select(['username'])->find($uid);
        //     dd($order);
        //     $order->addr = $input['s_province'].'&nbsp;'.$input['s_city'].'&nbsp;'.$input['s_county'];
        //     $order->tel = Husers::select(['phone'])->find($uid);
        //     $order->otime = date('Y-m-d H:i:s', time());
        //     $res = $order->save();
        //     // return $res;
        // } else {
        //     $arr['status'] = 1;
        //     $arr['msg'] = '您还没有登录，请登录';
        // }
        


        $user = session('husers');
        if($user){
            $input = $request->except('_token');
            $gid = $input['gid'];
            $goods = Goods::find($gid)->toArray();
            $goods['bcnt'] = $input['bcnt'];

            session(['goods'=>$goods]);
            $goods = session('goods');
            // dd($a);
            $uid = session('husers')->id;
            $address = address::where('uid',$uid)->get()->toArray();
            // dd($address);
            
          return view('/home/pay',compact('address'));
        } else {
            return view('home/login/login')->with('errors', '您还没有登录，请先登录！！！');
        }
        
        
     
    }
}
