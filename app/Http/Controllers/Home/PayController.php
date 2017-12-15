<?php

namespace App\Http\Controllers\Home;


use App\Http\Model\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    // 删除收货地址
    public function pay()
    {
    	return view('./home/pay',['address'=>$address]);
    }
    public function delete($oid)
    {
    	$res = Address::find($oid)->delete();
        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }

//        return  json_encode($data);

        return $data;
  
    }

   
}
