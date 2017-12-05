<?php

namespace App\Http\Controllers\Admin\Active;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActiveController extends Controller
{

    //  返回添加活动视图
    public function add()
    {
        return view('admin/active/add');
    }


    //  执行添加活动

    public function create(Request $request)
    {
        $this->validate($request,[
            'discount'=> 'numeric|min:1|max:10',
        ],[
            'discount.numeric'=>'折扣请填写数字类型',
            'discount.min'=>'折扣请填写1-10之间的数',
            'discount.max'=>'折扣请填写1-10之间的数',
        ]);
        $data = $request->except('_token');
        $res = \DB::table('activitys')->insert($data);
        if ($res)
        {
            return redirect('/admin/active/index')->with(['inif'=>'添加成功']);
        } else {
            return back()->with(['info'=>'添加失败']);
        }
    }


    // 活动列表

    public function index()
    {
        $data = \DB::table('activitys')
                    ->join('goods','activitys.gid','=','goods.gid')->paginate(5);
//        dd($data);
        return view('/admin/active/index',['data'=>$data]);
    }


//    返回修改活动视图
    public function edit(Request $request)
    {
        $data = \DB::table('activitys')->where('aid' , $request->input('aid'))->first();

//        dd($data);

        if ($data->is_over == 0)
        {
            \DB::table('activitys')->where('aid',$request->input('aid'))->update(['astatus' =>1,'is_over'=>1]);
            return response()->json(['astatus' => 0]);
        } elseif($data->is_over == 1){
            \DB::table('activitys')->where('aid',$request->input('aid'))->update(['astatus'=>0,'is_over'=>0]);
            return response()->json(['astatus' => 1]);
        }
    }

    public function delete($aid)
    {
        $res = \DB::table('activitys')->where('aid',$aid)->delete();
        $data = [];
        if ($res)
        {
            $data['error'] = 0;
            $data['msg'] = '删除成功';
        } else {
            $data['error'] = 1;
            $data['msg'] = '删除失败';
        }
        return $data;
    }
}
