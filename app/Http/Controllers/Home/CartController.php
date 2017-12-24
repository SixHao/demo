<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Cart;
use App\Http\Model\friend;
use App\Http\Model\ShopCart;
use App\Http\Model\goods;
use App\Http\Model\husers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function shopcart()
    {

        $user = Session('husers');
        //        获取友情链接
        $friend = friend::get();

        if ($user) {
            $shopcart = Cart::where('uid',$user->id)->get()->toArray();
//            session(['cart' => $shopcart]);
//            dd($shopcart);
            if (!empty($shopcart)) {
                $cart = Cart::where('uid', $user->id)->get();

                foreach ($cart as $k => $v) {

                    if (($v->uid) == ($user->id)) {
                        $goods[] = goods::find($v->gid);

                    }
                    foreach($goods as $kk => $vv)
                    {
                        $vv->cnt = $v->cnt;
                    }

                    session(['goods' => $goods]);
                }

                $goods = array_unique($goods);


                return view('Home.shopcart', compact('cart', 'goods', 'user', '$i','friend'));
            } else {
                return view('Home.shopcart2',compact('friend'));
            }
        } else {
            return view('Home.shopcart2',compact('friend'));
        }

        return view('Home/shopcart',compact('data','friend'));
    }

    public function delete($cid)
    {
//        return $cid;
        $res = ShopCart::find($cid)->delete();
//        return $res;
        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] = "删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] = "删除失败";
        }

        return $data;
    }







}
