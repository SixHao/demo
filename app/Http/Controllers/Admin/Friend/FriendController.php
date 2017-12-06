<?php

namespace App\Http\Controllers\Admin\Friend;
use App\Http\Model\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class FriendController extends Controller
{
    public function upload(Request $request)
    {
//        获取客户端传过来的文件
        $file = $request->file('flogo');
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
     // 友情链接列表
   // 多条件带分页搜索查询
    public function list(Request $request)
    { 
//        $request->all()
//        $request->all()
        $data = Friend::orderBy('fid','asc')
            ->where(function($query) use($request){
                //检测关键字
                $fname = $request->input('keywords1');
               
                //如果链接名名不为空
                if(!empty($fname)) {
                    $query->where('fname','like','%'.$fname.'%');
                }
                
            })
            ->paginate($request->input('num', 5));
        return view('admin.friend.lists',['data'=>$data, 'request'=> $request]);
    }
     // 添加友情链接
    public function add()
    {
    	return view('admin/friend/add');
    }
    public function insert()
    {
        // 1.获取用户提交的表单数据
        $input = Input::except('_token');
        // dd($input);
//        2. 表单验证
       $rule = [
            'fname' => 'required|unique:friend|min:4|max:10|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            'fcontent' => 'required',
            'furl' => 'required|email',
            'flogo1' => 'image',
        ];
        $mess = [
            'fname.required' => '链接名不能为空',
            'fname.unique' => '此链接名已存在',
            'fname.regex' => '链接名必须汉字字母下划线',
            'fname.min' => '链接名最少为4位',
            'fname.max' => '链接名最多为10位',
            'furl.email' => '链接格式不正确',
            'furl.required' => '链接地址不能为空',
            'flogo1.image' => '请选择一张图片',
            'fcontent.required' => '链接内容不能为空',
        ];
        $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/friend/add')
                ->withErrors($validator)
                ->withInput();
        }
//        3. 执行添加操作
         $data = new Friend();
         
         $data->fname = $input['fname'];
         $data->furl = $input['furl'];
         $data->fcontent = $input['fcontent'];
         $data->flogo = $input['flogo'];
         $res = $data->save();

//        4. 判断是否添加成功
        if($res){
            return redirect('admin/friend/list')->with('msg','添加成功');
        }else{
            return redirect('admin/friend/add')->with('msg','添加失败');
        }  
    }
    // 修改用户信息
    public function edit($fid)
    {
          // 1. 根据传过来的ID获取要修改的用户记录
        $data = Friend::find($fid);
        // dd($data);

//        2.返回修改页面（带上要修改的用户记录）
        return view('admin.Friend.edit',compact('data'));

    }

    // 执行修改
    public function update(Request $request, $fid)
    {
         // 1. 通过id找到要修改那个用户
        $data = Friend::find($fid);

//        2. 通过$request获取要修改的值

       $input = $request->except('_token', 'fid','flogo1');
   
//        3. 使用模型的update进行更新
//        $Friend->update(['Friend_name'=>'zhangsan']);
        $res = $data->update($input);

//        4. 根据更新是否成功，跳转页面
        if($res){
            return redirect('admin/friend/list');
        }else{
            return redirect('admin/friend/edit/'.$data->fid);
        }
        
    }

    // 删除用户
    public function delete($fid)
    {
        // dd($fid);
        $res = Friend::find($fid)->delete();
        // dd($res);
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
