<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Model\permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = permission::get();
        return view('admin/permission/lists',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Permission/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        1.获取提交的数据
        $input = $request->except('_token');
//        2.表单验证
        // dd($input);
        $rule = [
             'pname' => 'required',
             'pdesc' => 'required|min:28',
         ];
         $mess = [
             'pname.required' => '权限名称不能为空',
             'pdesc.required' => '权限内容不能为空',
             'pdesc.min' => '权限内容最小字符为28位'
         ];
        $validator =  Validator::make($input,$rule,$mess);
         // 如果表单验证失败 passes()
         if ($validator->fails()) {
             return redirect('admin/permission/create')
                 ->withErrors($validator)
                 ->withInput();
         }

//        3.插入到数据库
        $res = permission::create($input);
//        4.给用户反馈
        if ($res)
        {
            return redirect('admin/permission')->with('msg','添加成功');
        } else {
            return back()->with('msg','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = permission::find($id);

        return view('admin/permission/edit',compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->except('_token','_method');
         $rule = [
             'pname' => 'required',
             'pdesc' => 'required|min:28',
         ];
         $mess = [
             'pname.required' => '权限名称不能为空',
             'pdesc.required' => '权限内容不能为空',
             'pdesc.min' => '权限内容最小字符为28位'
         ];
        $validator =  Validator::make($input,$rule,$mess);
         // 如果表单验证失败 passes()
         if ($validator->fails()) {
             return redirect('admin/permission/edit')
                 ->withErrors($validator)
                 ->withInput();
         }
        $res = permission::find($id)->update($input);
        if ($res)
        {
            return redirect('admin/permission')->with('msg','修改成功');
        } else {
            return back()->with('msg','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = permission::find($id)->delete();
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
