<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\role;
use Illuminate\Support\Facades\Hash;
use App\Http\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use DB;


class UserController extends Controller
{
    public function upload(Request $request)
    {
//        获取客户端传过来的文件
        $file = $request->file('uface');
//        $file = $request->all();
       // dd($file);

        if($file->isValid()){
            //        获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();
            //生成一个唯一的文件名，保证所有的文件不重名
            $newfile = time().rand(1000,9999).uniqid().'.'.$ext;
            //设置上传文件的目录
            $dirpath = public_path().'/uploads/';
            //将文件移动到本地服务器的指定的位置，并以新文件名命名
//            $file->move(移动到的目录, 新文件名);
           $file->move($dirpath, $newfile);
           $newpath = '/uploads/'.$newfile;
           //将上传的图片名称返回到前台，目的是前台显示图片
            return $newpath;

        }
    }
    //用户列表
      // 多条件带分页搜索查询
    public function list(Request $request)
    { 

        $data = User::orderBy('uid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $uname = $request->input('keywords1');
                $email = $request->input('keywords2');
                //如果用户名不为空
                if(!empty($uname)) {
                    $query->where('uname','like','%'.$uname.'%');
                }
                 //如果邮箱不为空
                if(!empty($email)) {
                    $query->where('email','like','%'.$email.'%');
                }

            })
            ->paginate($request->input('num', 5));
//        dd($data);
        return view('admin.user.lists',['data'=>$data, 'request'=> $request]);
    }
    // 添加用户
    public function add()
    {
    	return view('admin/user/add');
    }
    // 执行添加
     public function insert(Request $request)
    {
         // 1. 获取用户提交的表单数据
        $input = Input::except('_token');
        // dd($input);
//        2. 表单验证

         $rule = [
             'uname' => 'required|unique:users|min:4|max:18|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
             'pwd' => 'required',
             're_pwd' => 'same:pwd',
             'phone' => 'required|size:11|regex:/^1[34578][0-9]{9}$/',
             'email' => 'email',
             'addr' =>  'required',
             'uface1' => 'image',
         ];
         $mess = [
             'uname.required' => '用户名不能为空',
             'uname.unique' => '此用户名已存在',
             'uname.regex' => '用户名必须汉字字母下划线',
             'uname.min' => '用户名最少为4位',
             'uname.max' => '用户名最多为18位',
             're_pwd.same' => '两次密码不一致',
             'pwd.required' => '密码不能为空',
             'phone.required' => '手机号不能为空',
             'phone.size' => '手机号应为十一位',
              'phone.regex' => '手机号格式不正确',
             'email.email' => '邮箱格式不正确',
             'addr.required' => '地址不能为空',
             'uface1.image' => '请选择一张图片',
         ];
        $validator =  Validator::make($input,$rule,$mess);
         // 如果表单验证失败 passes()
         if ($validator->fails()) {
             return redirect('admin/user/add')
                 ->withErrors($validator)
                 ->withInput();
         }
//        3. 执行添加操作
         $data = new User();
         $data->uname = $input['uname'];
         $data->sex = $input['sex'];
         $data->phone = $input['phone'];
         $data->email = $input['email'];
         $data->addr = $input['addr'];
         $data->auth = $input['auth'];
         $data->uface = $input['uface'];
         $data->birthday = strtotime($input['birthday']);
         $data->pwd = \Hash::make($input['pwd']);

         // $res = \Hash::check('tttttt',$data->pwd);
         // dd($res);
         // dd($data);
         $res = $data->save();

//        4. 判断是否添加成功
        if($res){
            return redirect('admin/user/list')->with('msg','添加成功');
        }else{
            return redirect('admin/user/add')->with('msg','添加失败');
        }  
    }
    // 修改用户信息
    public function edit($uid)
    {
          // 1. 根据传过来的ID获取要修改的用户记录
        $data = User::find($uid);

//        2.返回修改页面（带上要修改的用户记录）
        return view('admin.user.edit',compact('data'));

    }

    // 执行修改
    public function update(Request $request, $uid)
    {
         // 1. 通过id找到要修改那个用户
//        $data = User::find($uid);

//        2. 通过$request获取要修改的值

       $input = $request->except('_token','uface1');
//        dd($input);
//       表单验证

        $rule = [
            'uname' => 'required|min:4|max:18|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            'phone' => 'required|size:11|regex:/^1[34578][0-9]{9}$/',
            'email' => 'email',
        ];
        $mess = [
            'uname.required' => '用户名不能为空',
            'uname.regex' => '用户名必须汉字字母下划线',
            'uname.min' => '用户名最少为4位',
            'uname.max' => '用户名最多为18位',
            'phone.required' => '手机号不能为空',
            'phone.size' => '手机号应为十一位',
            'phone.regex' => '手机号格式不正确',
            'email.email' => '邮箱格式不正确',
        ];
        $validator =  Validator::make($input,$rule,$mess);
        // 如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/user/list')
                ->withErrors($validator)
                ->withInput();
        }




        $input['birthday'] = strtotime($input['birthday']);
       

        if(session('users')->uid == $input['uid'])
        {
            session('users')->uface = $input['uface'];
        }

//        3. 使用模型的update进行更新
        
        $res = User::where('uid',$uid)->update($input);
//            dd($res);
//        4. 根据更新是否成功，跳转页面
        if($res){
            return redirect('admin/user/list')->with('msg','修改成功');
        }else{
            return back()->with('msg','修改失败');
        }
        
    }

    // 删除用户
    public function delete($uid)
    {
    	$res = User::find($uid)->delete();
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

    public function editpwd()
    {
          // 1. 从session获取要修改的用户记录
        
            $res = \Session::get('users');
//        2.返回修改页面（带上要修改的用户记录）
        return view('/admin/user/editpwd');

    }

     // 执行修改
    public function doeditpwd(Request $request, $uid)
    {
         // 1. 通过id找到要修改那个用户
        $data = User::find($uid);

//        2. 通过$request获取要修改的值

       $input = $request->except('_token', 'uid','pwd');


//          3密码是否正确


        $users = User::where('uid',$uid)->first();

       if(!Hash::check(trim($input['oldpwd']),$users->pwd)){
            return redirect('admin/user/editpwd')->with('errors','密码不正确');
        }
       $data->pwd = \Hash::make($input['newpwd']);

//        3. 使用模型的update进行更新

            $res = $data->save();
//        4. 根据更新是否成功，跳转页面
        if($res){
            $request->session()->flush();
            return redirect('admin/login');
        }else{
            return redirect('admin/user/editpwd/'.$users->uid);
        }
    }

    //  用户授权
    public function auth($uid)
    {
//        获取当前用户
        $user = User::find($uid);

//        获取当前所有的角色
        $roles = role::get();

//        获取当前用户已经拥有的角色  (pluck获取数据库中一列的信息 返回一个集合要想转换成数组必须加toArray   5.3之前的版本用的是lists  返回值就是一个数组)

        $own_roles = DB::table('role_user')->where('uid',$uid)->pluck('rid')->toArray();

//        dd($own_roles);

        return view('admin/user/auth',compact('user','roles','own_roles'));
    }

    //  执行授权
    public function doauth(Request $request)
    {
        $data = $request->except('_token');


//        数据库事件开始
        DB::beginTransaction();

//        试着运行一下
        try{
            //  删除当前用户以前拥有的权限
            DB::table('role_user')->where('uid',$data['uid'])->delete();

            if (!empty($data['rid']))
            {
                foreach ($data['rid'] as $k=>$v)
                {
                    DB::table('role_user')->insert(['uid'=>$data['uid'],'rid'=>$v]);
                }
            }

        }catch (Exception $e){
//            如果出现异常  回滚
            DB::rollBack();

        }
//          否则执行
        DB::commit();

        return redirect('admin/user/list')->with('msg','授权成功');

    }
}