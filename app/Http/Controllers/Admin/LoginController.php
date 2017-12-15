<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\user;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function login()
    {
        return view('Admin/Index/login');
    }


    public function dologin(Request $request)
    {
        $input = $request->all();
//        dd($input);

        //        2.对数据进行后台表单验证

//        Validator::make(要验证的数据，验证规则，提示信息)
//        验证规则

        $rule = [
            'uname'=>'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u|between:4,20',
            "pwd"=>'required|between:3,20'
        ];




        $mess = [
            'uname.required'=>'用户名必须输入',
            'uname.regex'=>'用户名必须汉字字母下划线',
            'uname.between'=>'用户名必须在4到20位之间',
            'pwd.required'=>'密码必须输入',
            'pwd.between'=>'密码必须在3到20位之间'
        ];


        $validator =  Validator::make($input,$rule,$mess);

        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/login')
                ->withErrors($validator)
                ->withInput();
        }

        //        3.1 判断是否有此用户

        $users = User::where('uname',$input['uname'])->first();
        //dd($user);
        if(!$users){
            return redirect('admin/login')->with('errors','用户名不存在');
        }

//        3.2密码是否正确
//        $user->user_pass     $input['user_pass']

        if(!Hash::check(trim($input['pwd']),$users->pwd)){
            return redirect('admin/login')->with('errors','密码不正确');
        }

//        4.登录成功，将用户信息保存到session中，用于判断用户是否登录以及获取登录用户信息

        \Session::put('users',$users);
        Session::save();
        // dd($users);
        return redirect('admin/index');
//        5登录失败，返回登录页面

    }

//    退出登录
    public function outlogin()
    {
        session()->forget('users');
        return redirect('admin/login');
    }

}


