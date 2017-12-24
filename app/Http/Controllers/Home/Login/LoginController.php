<?php

namespace App\Http\Controllers\Home\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\husers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function login()
    {

    	return view('home.login.login');
    }
    //执行登录
    public function dologin()
    {
    	  // 1 获取浏览器提交的数据
        $input =  Input::except('_token');
        // dd($input);
   // dd($input);
         $rule = [
            'username'=>'required',
            'password'=>'required|between:6,18'
        ];

        $mess = [
		     'username.required'=>'用户名必须输入',
            'password.required'=>'密码必须输入',
            'password.between'=>'密码的长度在6-18位之间',
        ];
        $validator = Validator::make($input, $rule,$mess);
//        如果验证失败
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        }
           // 3 验证 用户名 密码  验证码是否输入正确   逻辑验证
        $user = husers::where('username',$input['username'])->first();
      	
        if(empty($user)){
	
            return back()->with('errors','此用户不存在，请先注册');
        }

        if (!Hash::check($input['password'],$user->password)) {

            return back()->with('errors','密码不正确');
        }
	//      如果用户是邮箱注册则判断用户是否已激活
        if($user->email_act == 0){
            return back()->with('errors','*对不起,您的账号还未激活!');
        }
//        如果登录成功，将用户信息保存如session中，表示用户已经登录
	   session(['husers'=>$user]);
//         \Session::flash('huser',$user);
//      4 如果正确跳转到后台首页 ，如果不正确返回

        return redirect('home/index');
//        return redirect(url()->previous());

    }
    
    //找回密码的页面
    public function forget()
    {
        return view('home.login.forget');
    }

   
     //重置密码页面
    public function reset(Request $request)
    {
        //根据uid获取要修改密码的用户，根据key确定链接的有效性
		 $user = husers::find($request['id']);
		 $username = $user->username;
		if($request['key'] != $user->remember_token){
            return '无效的连接';
        }
		 //如果有效，就返回修改密码的界面
        return view('home.login.reset',compact('username'));
        // return view('home.login.reset');
    }
    //重置密码
    public function doreset(Request $request)
    {
    	// 获取接受到的修改密码的数据
    	$data = $request->except('_token');
    	// 修改新密码的格式
    	$data['password'] = Hash::make($data['password']);
    	
//        找到要重置密码的用户
       $user = husers::where('username',$data['username'])->first();
       // 修改当前用户的密码并返回正确与否
       $res = $user->update(['password'=>$data['password']]);
//        判断修改是否正确 并返回到页面
       $arr = [];
       
        if($res){
            $arr['status'] = 1;
            $arr['msg'] = '修改成功'; 
        }else{
            $arr['status'] = 0;
            $arr['msg'] = '修改失败';
        }
        return $arr;
    }

    public function ajax(Request $request)
    {
    	$arr = [];
    	$data = $request->all();

    	$res = (new husers)->where('email',$data['email'])->first();
    	
    	// return $res;
    	if($res)
    	{
    		$arr['status'] = 1;
    		$arr['msg'] = '修改密码邮件已经发送成功，请登录邮箱修改您的密码';
    		 Mail::send('email.forget', ['husers' => $res], function ($m) use ($res) {
            $m->to($res->email, $res->username)->subject('密码找回!');
        });
    		
    	} else {
    		$arr['status'] = 0;
    		$arr['msg'] = '邮箱不存在';
    	}
    	return $arr;
    }

//    退出登录

    public function outlogin()
    {
        session()->flush('husers');
        return redirect('home/index');
    }
 
}
