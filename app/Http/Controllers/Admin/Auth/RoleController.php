<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //
	public function add()
    {
        return view('admin.role.add')

    }
    public function store(Request $request)
    {
    	$input = $request->except('_token');
    	//执行添加操作
    	$res = Role::create($input);

    	//如果添加成功跳转到列表页，失败跳转到添加页
    	if($res){
    		return redirect('admin/role/index');

    	} else {
    		return back()->with('error','添加失败')；
    	}
    }

    public function index()
    {
    	//获取所有的角色
    	$roles = Role::get();

    	return view('admin.role.index',compact('roles'));
    }

}
