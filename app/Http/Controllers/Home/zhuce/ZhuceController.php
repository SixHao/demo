<?php

namespace App\Http\Controllers\Home\Zhuce;


use Illuminate\Http\Request;
use App\Http\Model\husers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserInsertRequest;
use Illuminate\Support\Facades\Mail;
use App\SMS\SendTemplateSMS;
use App\SMS\M3Result;


class ZhuceController extends Controller
{
    //
    public function zhuce()
    {
    	return view('home/zhuce/zhuce');
    }
    //用户注册
    public function douserzhuce(UserInsertRequest $request)
    {
    	 // 获取所有的值
        $data = $request -> except('_token','repassword');
        // dd($data);
        // 处理插入
        $user = new husers;
        $data['username'] = $data['username'];
        $data['password'] = Hash::make($data['password']);
        $data['email_act'] = 1;
        // dd($data);
        $res =  \DB::table('husers')->insert($data);

//        4. 判断是否添加成功
         if($res){
            echo "<script>alert('注册成功');window.location.href='/home/login/login'</script>";
        }else{
            echo "<script>alert('注册失败');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
        }
        
    }
    //发送手机验证码
    public function sendCode(Request $request)
    {
        $input = $request->except('_token');
        //return $input;

        $tempSms = new SendTemplateSMS();

		//    * @param to 手机号码集合,用英文逗号分开
		//    * @param datas 内容数据 格式为数组 第一个元素是一个随机数，表示验证码；第二个参数是验证码的有效时间 如5分钟
		//    * @param $tempId 模板Id

		//        参数1 手机号
        $phone = $input['phone'];

//        参数2
        $r = mt_rand(1000,9999);
        $arr = [$r,5];

        $M3Result = new M3Result();
        $M3Result = $tempSms->sendTemplateSMS($phone,$arr,1);
        //发送验证码成功后，将验证码存入session中
        session('phone',$r);

        return $M3Result->toJson();
    }
   //手机注册
    public function dophonezhuce(UserInsertRequest $request)
    {
    	// 获取所有的值
        $data = $request -> except('_token','repassword','phonecode');
        // dd($data);
        // 处理插入
        $user = new husers;
        $data['phone'] = $data['phone'];
        $data['username'] = $data['phone'];
        $data['password'] = Hash::make($data['password']);
        $data['email_act'] = 1;
        // dd($data);
        $res =  \DB::table('husers')->insert($data);

//        4. 判断是否添加成功
        if($res){
            echo "<script>alert('注册成功');window.location.href='/home/login/login'</script>";
        }else{
            echo "<script>alert('注册失败');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
        }
    
    }
    //邮箱注册
    public function doEmailzhuce(UserInsertRequest $request)
    {

        //return 11111;
//        1 . 接受客户端传过来的注册数据
         $input = $request->except('_token','repassword');
         // dd($input);
//        2. 表单验证
	// 3. 向用户表中添加注册记录
        $input['username'] = $input['email'];

        $input['password'] =Hash::make($input['password']) ;

        $input['email_act'] = 0;
        $input['remember_token'] = $input['password'];
            // dd($input);
        //添加成功后，返回刚才添加的那条用户记录
       $res =  husers::create($input);
      // dd($res);
       if($res){

           //        4. 给注册邮箱发送注册邮件

//        参数一： 对方收到的邮件模板
//        参数二：邮件模板中需要的变量
//        参数三：关于邮件注册的变量，如发件人，主题、收件人等信息
           Mail::send('email.active', ['husers' => $res], function ($m) use ($res) {
               //$m->from('hello@app.com', 'Your Application');

               $m->to($res->email, $res->username)->subject('请激活邮箱!');
           });

	    echo "<script>alert('注册成功,请到您的邮箱中激活账号');window.location.href='/home/login/login'</script>";
           // return 111;

       }else{
           echo "<script>alert('注册失败');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
       }

    }

    /**
     * 邮箱激活方法
     */

    public function active(Request $request)
    {
//        就是找到要激活的用户，将这条记录的is_active字段的值改成1
// dd($request);

//        1. 先找到要激活的用户

        $user = husers::find($request['id']);
       // dd($user);

//        1. 验证激活链接的有效性
        if($request['key'] != $user->remember_token){
            return "无效的激活链接";
        }

        $res = $user->update(['email_act'=>1]);

        if($res){
             echo "<script>alert('激活成功，请登录');window.location.href='/home/login/login'</script>";
          
        }else{
           
             echo "<script>alert('激活失败，请重新注册');window.location.href='".$_SERVER['HTTP_REFERER']."'</script>";
        }
        
    }
}
