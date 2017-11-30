<?php

namespace App\Http\Controllers\Home;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ZhuceController extends Controller
{
   public function zhuce()
   {
   		return view('home/zhuce');
   }

   public function dozhuce(Request $request)
   {
   		 // 获取所有的值
        $data = $request -> except('_token','notpass','accept');
       	  // dd($data);
       	 $data['birthday']   = strtotime($data['birthday']);
       	     // dd($data);
       	   $data['pwd'] = \Hash::make($data['pwd']);
       	    // dd($data);
       // 处理插入
        $res = \DB::table('users')->insert($data);
        if($res){
        	return view('home/login');
        }else {
        	return back()->with('errors','注册失败');
        }
   	}
   
 }
