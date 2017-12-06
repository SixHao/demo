<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //
    public function shopcart()
    {
//        return view('Home/shopcart');
        $data = \DB::table('goods')->get();
        return view('Home/shopcart',['data' => $data]);
    }

    public function delete($gid)
    {
        $res = goods::find($gid)->delete();
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
