<?php

namespace App\Http\Controllers\Admin\Cate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Cate;
use Illuminate\Support\Facades\Validator; 

class CateController extends Controller
{
    
    public function add()
    {
    		 // //返回一级类
       //  $cateOne = Cate::where('pid',0)->get();
        //获取所有的分类数据，返回到前台列表
 			$cates =  (new Cate)->tree();

        return view('admin.cate.add',compact('cates'));
    }
    //添加子分类
    public function create($tid)
    {
        // $data = \DB::table('type')->get();

        // $data = $this->findSubTree($data,0,0);

        $data =  (new Cate)->tree();
        // dd($data);
        //   1. 根据传过来的ID获取要修改的用户记录
        $cates = Cate::find($tid);
           // dd($cates);
        // 2.返回修改页面（带上要修改的用户记录）
        return view('admin.cate.create',['data'=>$data,'tid'=>$tid]);
        
    }

    public function store(Request $request)
    {
        // 1. 获取用户提交的表单数据

        $input = $request->except('_token');
       
         // dd($input);
//        2. 表单验证
		$rule = [
            'tname'=>'required',
         ];
		 $mess = [
            'tname.required'=>'分类名称必须输入',
         ];
		 $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/cate/add')
                ->withErrors($validator)
                ->withInput();
        }

        $pid = $input['pid'];
         if($pid == 0){
            // 顶级分类
            $input['path'] = 0;
        }else{
            // 不是顶级分类
         $parentData = \DB::table('type')->where('tid',$pid)->first()
            ;
             //dd($parentData);
             $input['path'] = $parentData->path.','.$parentData->tid;
         }
        //将数据插入到数据库
        $res =\DB::table('type')->insert($input);
        // dd($res);
		 // 4. 判断是否添加成功
        if($res){
            return redirect('admin/cate/index');
        }else{
            return redirect('admin/cate/add')->with('msg','添加失败');
        }
 	}


    public function index()
    {
    	//获取所有的分类数据，返回到前台列表
 			// $cates = Type::get();
		$cates =  (new Cate)->tree();
        // dd($cates);
		return view('admin.cate.index',compact('cates'));
	}

	public function edit($tid)
	{
        $data =  (new Cate)->tree();
		//   1. 根据传过来的ID获取要修改的用户记录
        $cates = Cate::find($tid);
        // dd($cates);
		// 2.返回修改页面（带上要修改的用户记录）
        return view('admin.cate.edit',compact('cates','data'));
		
   	}

	public function update(Request $request,$tid)
	{
        // 查询 当前分类下面是否有子类
      $res = \DB::table('type')->where('pid',$tid)->first();
     if($res){
            return back()->with('msg','当前类别有子类，不允许修改');
        }

        // 处理修改字段
        $temp = $request -> except('_token');
        $pid = $temp['pid'];

        if($pid == 0){
            // 顶级分类
            $temp['path'] = 0;
        }else{
            // 不是顶级分类
          $parentData = \DB::table('type')->where('tid',$pid)->first();

           $input['path'] = $parentData->pid.','.$parentData->tid;
        }
         // 修改数据库
         $res = \DB::table('type')->where('tid',$tid)->update($temp);

        if($res){
            return redirect('admin/cate/index')->with('msg','修改成功');
        }else{
            return back()->with('msg','修改失败');
        }
    }


     public function destroy($tid)
    {
    	$data = [];
        // 查询 当前分类下面是否有子类
        $res = \DB::table('type')->where('pid',$tid)->first();

        if($res){

            $data['status']= 1;
            $data['msg']='当前类别有子类，不允许删除';
            return $data;
        }

        $re =  Cate::find($tid)->delete();
//        删除成功
        if($re){
            $data['status']= 0;
            $data['msg']='删除成功';

        }else{
            $data['status']= 1;
            $data['msg']='删除失败';

        }
        return $data;
    }



    /**递归获取子孙栏目
     * @param $cates
     */
    // protected function findSubTree($cates,$tid=0,$lev=1){
    //     $subtree = [];//子孙数组
    //     foreach ($cates as $v) {
    //         if($v->pid==$tid){
    //             $v->lev = $lev;
    //             $subtree[] = $v;
    //             $subtree = array_merge($subtree,$this->findSubTree($cates,$v->tid,$lev+1));
    //         }
    //     }
    //     return $subtree;
    // }
}


