<?php

namespace App\Http\Controllers\Home\userinfo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\husers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use App\Http\Model\address;
use App\Http\Model\Order;
use App\Http\Model\detail;
use App\Http\Model\goods;

class UserinfoController extends Controller
{
    //用户信息页面
    public function index()
    {

          $active = \DB::table('activitys')->where('is_over',1)->take(8)->get()->toArray();
          $goods = goods::get()->toArray();
          $orders1 = Order::where('ostatus',1)->count();
          $orders2 = Order::where('ostatus',2)->count();
          $orders3 = Order::where('ostatus',3)->count();
          // dd($orders);
        	return view('home.userinfo.index',compact('active','goods','orders1','orders2','orders3'));
    }
    //加载个人信息页面
    public function personal()
    {
        	$husers = session('husers');
        	
        	return view('home.userinfo.personal',compact('husers'));
    } 
    //修改个人信息
    public function editperson(Request $request)
    {
        	$input = $request->except('_token','username');

        	$input['birthday'] = $input['year'].'-'.$input['month'].'-'.$input['day'];
        	// dd($input['birthday']);
        	$data['birthday'] = strtotime($input['birthday']);

        	$data['nickname'] = $input['nickname'];
        	$data['sex'] = $input['sex'];
        	$data['phone'] = $input['phone'];

        	husers::find($input['id'])->update($data);
        	$users = husers::find($input['id']);
        	// dd($users);
        	session(['husers'=>$users]);
        	// $abc = session('husers');
        	// dd($abc);
        	return redirect('/home/userinfo/personal');
    }
    //修改头像
    public function upload(Request $request)
    {
        	$file = $request->file('file_upload');
        	$id = $request->id;
            // return $id;
        	if($file->isValid()){
                //        获取文件上传对象的后缀名
                $ext = $file->getClientOriginalExtension();
                  //生成一个唯一的文件名，保证所有的文件不重名
                $newfile = time().rand(1000,9999).uniqid().'.'.$ext;
                //设置上传文件的目录
                $dirpath = public_path().'/uploads/';
                 //将文件移动到本地服务器的指定的位置，并以新文件名命名
                //  $file->move(移动到的目录, 新文件名);
               $file->move($dirpath, $newfile);
            
             $filepath = '/uploads/'.$newfile;
             session('husers')->pic = $filepath;
             \DB::table('husers')->where('id',$id)->update(['pic'=>$filepath]);
             return  $filepath;
               
        }
    }


    //  加载密码修改页面
    public function safety()
    {
        return view('home/userinfo/safety');
    }

    // 执行密码修改
    public function dosafety(Request $request)
    {
               $husers = session('husers');
               // dd($husers);
            $input = $request->except('_token');
            // dd($input);

            $rule = [
                'newpwd' => 'required',
                'repwd' => 'same:newpwd',
                'newpwd'=>'required|between:6,18',
            ];
            $mess = [
                'repwd.same' => '两次密码不一致',
                'newpwd.required' => '密码不能为空',
                'newpwd.between'=>'密码的长度在6-18位之间',
             ];
           $validator =  Validator::make($input,$rule,$mess);
            // 如果表单验证失败 passes()
            if ($validator->fails()) {
                return redirect('home/userinfo/safety')
                    ->withErrors($validator)
                    ->withInput();
            }
             $data = husers::find($husers->id);
            // $data = Hash::check($data['password'],'123456');
            // dd($data);

            if (Hash::check($input['password'],$data['password']) ) {

                 $res = \DB::table('husers')->where('id',$husers->id)->update( ['password'=>Hash::make($input['newpwd'])] );
                 // dd($res);
                session()->flush();
                $res = session('husers');
                // dd($res);
                 return redirect('/home/login/login');
                
            }

            return back()->with('msg','原密码不正确');
    }
    //地址页面
    public function address()
    {
          $id = session('husers')->id;
          $addr = address::where('id',$id)->get();
          return view('home.userinfo.address',compact('addr'));
   }

    //添加地址页面
    public function doaddress()
    {
           // 1. 获取用户提交的表单数据
            $input = Input::except('_token');
              
             // dd($input);
           $rule = [
              'rec_name' => 'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
              'rec_phone' => 'required|size:11|regex:/^1[34578][0-9]{9}$/',
              'rec_address' => 'required|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
           ];
           $mess = [
                'rec_name.required' => '用户名不能为空',
                'rec_name.unique' => '此用户名已存在',
                'rec_name.regex' => '用户名必须汉字字母下划线',
                'rec_phone.required' => '手机号不能为空',
                'rec_phone.size' => '手机号应为十一位',
                'rec_phone.regex' => '手机号格式不正确',
                'rec_address.required' => '地址不能为空',
                'rec_address.regex' => '地址必须汉字字母下划线',
           ];
           $validator =  Validator::make($input,$rule,$mess);
            // 如果表单验证失败 passes()
            if ($validator->fails()) {
                return redirect('home/userinfo/address')
                    ->withErrors($validator)
                    ->withInput();
            }
            $input['rec_address'] = $input['s_province'].'&nbsp;'.$input['s_city'].'&nbsp;'.$input['s_county'].'&nbsp;'.$input['rec_address'];
             $husers = session('husers');

             // 3. 执行添加操作
             $data = new address();
             $data->rec_name = $input['rec_name'];
             $data->rec_phone = $input['rec_phone'];
             $data->rec_address = $input['rec_address'];
             $data['id'] = $husers->id;
              $res = $data->save();

    //        4. 判断是否添加成功
            if($res){
                return redirect('home/userinfo/address')->with('msg','添加成功');
            }else{
                return redirect('home/userinfo/address')->with('msg','添加失败');
            }  
        
    }
    //删除地址
    public function deleteaddr($aid)
    {
          // return $aid;
          $res = address::find($aid)->delete();
          $data = [];
          if($res){
              $data['error'] = 0;
              $data['msg'] ="删除成功";
          }else{
              $data['error'] = 1;
              $data['msg'] ="删除失败";
          }
           return $data;
    }
    //我的订单
   public function mydetail()
   {
        $id = session('husers')->id;   

        $order = \DB::table('detail')
                ->join('orders', 'orders.oid', '=', 'detail.oid')
                ->where('orders.id',$id)
                 ->where('orders.ostatus','<>',4)
                ->join('goods', 'goods.gid', '=', 'detail.gid')
                ->select('detail.*', 'orders.*', 'goods.*')
                ->get()
                ->toArray();

        // dd($order);

        return view('home/userinfo/mydetail',compact('order'));
   }
   // 修改订单状态
   public function editdetail()
   {
         \DB::table('orders')->where('oid',$_GET['oid'])->update(['ostatus'=>4]);
        return redirect('home/userinfo/olddetail');          // dd($a);
    }
   //历史订单
   public function olddetail()
   {
      
      // dd($oid);
        $id = session('husers')->id;
         $order = \DB::table('detail')
                ->join('orders', 'orders.oid', '=', 'detail.oid')
                ->where('orders.id',$id)
                ->where('orders.ostatus',4)
                ->join('goods', 'goods.gid', '=', 'detail.gid')
                ->select('detail.*', 'orders.*', 'goods.*')
                ->get()
                ->toArray();
          
                // 返回视图
        return view('home/userinfo/olddetail',compact('order'));
   }
}
