<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Cart;
use App\Http\Model\friend;
use App\Http\Model\Goods;
use App\Http\Model\Order;
use App\Http\Model\Huser;
use App\Http\Model\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\validator;



class PayController extends Controller
{
    //
    public function pay(Request $request)
    {
        $id = session('husers')->id;

        //获取商品信息

        $goods = \DB::table('cart')
            ->where('uid',$id)
            ->join('goods', 'cart.gid', '=', 'goods.gid')
            ->select('cart.*','goods.*')
            ->get()
            ->toArray();
//        session(['goods'=>$data]);
//            dd($goods);
        //获取地址信息
        $address = address::where('id',$id)->where('is_checked',1)->first();
        //        获取友情链接
        $friend = friend::get();
        return view('/Home/pay', compact('goods','address','friend'));

    }

    public function insert(Request $request)
    {
        // 1 获取浏览器提交的数据
        $input =  $request->except('_token');
//        dd($input);

//        2.表单验证
        $rule = [
            'addr'=>'required',
            'tel'=>'required',
            'rec'=>'required',
        ];

        $mess = [
            'addr.required'=>'没有收获地址，请添加地址',
            'tel.required'=>'没有手机号码，请添加手机号',
            'rec.required'=>'没有收货人，请填写收货人',
        ];
        $validator = Validator::make($input, $rule,$mess);
//        如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        //修该表单提交过来的数据
        $order['oid'] = rand(1000,9999).time().rand(1000,9999);
        $order['ormb'] = $input['ormb'];
        $order['ucnt'] = $input['ucnt'];
        $order['rec'] = $input['rec'];
        $order['addr'] = $input['addr'];
        $order['tel'] = $input['tel'];
        $order['msg'] = $input['msg'];
        $order['otime'] = time();
        $order['id'] = $input['uid'];

//        把整理好的数据存入订单表以及session中
        Order::insert($order);
        session(['order'=>$order]);

        //遍历提过来的所有商品的id并把订单号以及商品id插入到订单详情表中
        if (!empty($input['gid']))
        {
            foreach ($input['gid'] as $k=>$v)
            {
                \DB::table('detail')->insert(['oid'=>$order['oid'],'gid'=>$v]);
                $res[] = Goods::find($v);
            }
        }

//        遍历根据商品id查出来的商品的所有信息
        foreach($res as $k=>$v)
        {
            //  遍历表单中提交过来的每个商品的数量
            for ($i=0; $i<count($input['bcnt']); $i++)
            {
                //判断每次遍历的商品信息和购买的商品数量必须是同一个商品
                if($i == $k)
                {
//                    获取订单中每个商品的数量
                    $bcnt = $input['bcnt'][$i];
//                    根据每个商品的数量修改相应的商品的库存及销量
                    \DB::table('goods')->where('gid',$v->gid)->update(['stock'=>$v->stock-$bcnt]);
                    \DB::table('goods')->where('gid',$v->gid)->update(['salecnt'=>$v->salecnt+$bcnt]);
                }
            }
        }

//        清空购物车
        \DB::table('cart')->truncate();
        session()->forget('goods');

        return redirect('home/success');
    }


}
