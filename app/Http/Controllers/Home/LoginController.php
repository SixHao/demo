<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests;
class LoginController extends Controller
{
    //返回登录页面
    public function login()
    {
    	 //判断用户是否登录
    	 if(session('user')){
    		return back();
    	}
    	return view('home/login');
    }
    //处理提交过来的登录数据
    public function dologin(Request $request)
    {
    	//1.获取提交的数据
    	$input = $request->except('_token');
    	// 2.输入的数据是否符合规范
    	//  make方法的三个参数
		// 参数1 要参与验证的数据
		// 参数2 验证规则
		//参数3  设置错误的提示信息
    	$rule = [
    		'uname'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:4,20',
    		 "pwd"=>'required|between:6,20'
    	]; 
    	$mess = [
            'uname.required'=>'用户名必须输入',
            'uname.regex'=>'用户名必须汉字字母下划线',
            'uname.between'=>'用户名必须在4到20位之间',
            'upwd.required'=>'密码必须输入',
            'upwd.between'=>'密码必须在6到20位之间'
        ];
        $validator = Validator::make($input,$rule,$mess);
        //如果验证失败
        if($validator->fails()){
        	return back()->withErrors($validator)->withInput();
        }
        //验证用户名密码是否输入正确
        $user = User::where('uname',$input['uname'])->first();
        
        if(!$user){
        	return redirect('home/login')->with('errors','该用户不存在，请先注册');
        }
         if (!Hash::check($input['pwd'], $user->pwd)) {
        	return redirect('home/login')->with('errors','密码不正确');
        }

        //登录成功,将用户信息保存到session
        Session::put('user',$user);
         return view('home/index');
    }
    
}
