<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Cart;
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
//        $goods = session('goods');
//        dd($goods);
        $user = Session('husers');
//        dd($shopcart);
        if ($user) {
            $shopcart = Cart::find($user->id);
            session(['cart' => $shopcart]);
//            dd($shopcart);
            if (!empty($shopcart)) {
                $cart = Cart::where('uid', $user->id)->get();
//                    dd($cart);
                foreach ($cart as $k => $v) {

                    if (($v->uid) == ($user->id)) {
                        $goods[] = goods::find($v->gid);
//                        dd($goods);
                    }
                    foreach($goods as $kk => $vv)
                    {
                        $vv->cnt = $v->cnt;
                    }
//                        dd($goods);
                    session(['goods' => $goods]);
                }
//                dd($goods);
                $goods = array_unique($goods);

                return view('Home.shopcart', compact('cart', 'goods', 'user', '$i'));
            } else {
                return view('Home.shopcart2');
            }
        } else {
            return view('Home.shopcart2');
        }

        return view('Home/shopcart',['data' => $data]);
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
