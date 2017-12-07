<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Banner;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Session\Session;

class SlidershowController extends Controller
{
    public function upload(Request $request)
    {
//        获取客户端传过来的文件
        $file = $request->file('src');
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



    // 添加图片
    public function add()
    {
        return view('admin/slidershow/add');
    }
    // 执行添加
    public function doadd(Request $request)
    {
        // 1. 获取用户提交的表单数据
        $input = Input::except('_token');
        // dd($input);
//        2. 表单验证

        $rule = [
            'url' => 'url',
            'src1' => 'image',
        ];
        $mess = [
            'url.url' => '请使用有效的地址',
            'src1.image' => '请选择一张图片',
        ];
        $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/slidershow/add')
                ->withErrors($validator)
                ->withInput();
        }
//        3. 执行添加操作
        $data = new Banner();
        $data->src = $input['src'];
        $data->url = $input['url'];
        $data->order = $input['order'];
        // dd($data);

        $res = $data->save();

//        4. 判断是否添加成功
        if($res){
            return redirect('admin/slidershow/list')->with('msg','添加成功');
        }else{
            return redirect('admin/slidershow/add')->with('msg','添加失败');
        }
    }

    //用户列表
    // 多条件带分页搜索查询
    public function list(Request $request)
    {

        $data = Banner::get();
//        dd($data);
        return view('admin.slidershow.lists',[ 'request'=> $request, 'data'=>$data]);
    }
    // 修改图片
    public function edit($bid)
    {
        // 1. 根据传过来的ID获取要修改的图片
        $data = Banner::find($bid);
//         dd($data);
//        2.返回修改页面（带上要修改的用户记录）
        return view('admin.slidershow.edit',compact('data'));

    }

    // 执行修改
    public function update(Request $request, $bid)
    {
        // 1. 通过id找到要修改那个用户
        $data = Banner::find($bid);

//        2. 通过$request获取要修改的值

        $input = $request->except('_token', 'bid','src1');



//        3. 使用模型的update进行更新
//        $user->update(['user_name'=>'zhangsan']);
        $res = $data->update($input);

//        4. 根据更新是否成功，跳转页面
        if($res){
            return redirect('admin/slidershow/list');
        }else{
            return redirect('admin/slidershow/edit/'.$data->bid);
        }

    }



    // 删除用户
    public function delete($bid)
    {
        $res = Banner::find($bid)->delete();
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
