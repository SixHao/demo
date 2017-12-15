<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\validator;
use App\Http\Model\Address;


class PayController extends Controller
{
    //
    public function pay(Request $request)
    {
        $data = $request->session()->all();
        $id = Session('husers')['id'];
        $address = address::where('id',$id)->get()->toArray();
        $cart = Session('cart');
//        dd($cart);
        foreach($data['goods'] as $k=>$v )
        {
//            foreach()
            $v['cnt'] = $data['cart']['cnt'];
        }
//        dd($data);
            return view('/Home/pay', compact('data','address','cart'));

    }


}
