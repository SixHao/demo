<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Model\permission;
use App\Http\Model\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = role::get();
        return view('admin/role/lists',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin/Role/add');
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
       $rule = [
             'rname' => 'required',
             'rdesc' => 'required|min:28',
         ];
         $mess = [
             'rname.required' => '权限名称不能为空',
             'rdesc.required' => '权限内容不能为空',
             'rdesc.min' => '权限内容最小字符为28位'
         ];
        $validator =  Validator::make($input,$rule,$mess);
         // 如果表单验证失败 passes()
         if ($validator->fails()) {
             return redirect('admin/role/create')
                 ->withErrors($validator)
                 ->withInput();
         }
//        3.插入到数据库
        $res = role::create($input);
//        4.给用户反馈
        if ($res)
        {
            return redirect('admin/role')->with('msg','添加成功');
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
        $roles = role::find($id);

        return view('admin/role/edit',compact('roles'));
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
        $res = role::where('rid',$id)->update($input);
        if ($res)
        {
            return redirect('admin/role')->with('msg','修改成功');
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
        $res = role::find($id)->delete();
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

    //  角色授权
    public function auth($id)
    {
//        获取当前角色
        $role = role::find($id);

//        获取当前所有的权限
        $permission = permission::get();
//        dd($permission);
//        获取当前角色已经拥有的权限  (pluck获取数据库中一列的信息 返回一个集合要想转换成数组必须加toArray   5.3之前的版本用的是lists  返回值就是一个数组)

        $own_permission = DB::table('permission_role')->where('rid',$id)->pluck('pid')->toArray();



        return view('admin/role/auth',compact('role','permission','own_permission'));
    }

    //  执行授权
    public function doauth(Request $request)
    {
        $data = $request->except('_token');


//        数据库事件开始
        DB::beginTransaction();

//        试着运行一下
        try{
            //  删除当前角色以前拥有的权限
            DB::table('permission_role')->where('rid',$data['rid'])->delete();

            if (!empty($data['pid']))
            {
                foreach ($data['pid'] as $k=>$v)
                {
                    DB::table('permission_role')->insert(['rid'=>$data['rid'],'pid'=>$v]);
                }
            }

        }catch (Exception $e){
//            如果出现异常  回滚
            DB::rollBack();

        }
//          否则执行
        DB::commit();

        return redirect('admin/role')->with('msg','授权成功');

    }
}
