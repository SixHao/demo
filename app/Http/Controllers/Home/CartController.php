<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function shopcart(Request $request)
    {
//        $data = $request->session()->all();
//        dd($data);
        $data = session('goods');
        dd($data);
//        $request->session()->put('key1','value1');
//        $data =  $request->session();
//        dd($data);
        // 判断是否登录 如果没有登录就跳转到登录界面
//        if(empty($session['homeFlag'])){
//            $session['back'] = $_SERVER['REQUEST_URI'];
//            header('refresh:2;url=./login/login');
//            die('你还没登录...请先登录...');
//        }
        return view('Home/shopcart',['data' => $data]);
    }

    public function delete($gid)
    {
        $res = session::find($gid)->delete();
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
