<?php

namespace App\Http\Controllers\Admin\Goods;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Http\Model\Cate;
use App\Http\Model\Goods;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class GoodsController extends Controller
{
      /**
     * 处理客户端传过来的图片
     */

    public function upload(Request $request)
    {
//        获取客户端传过来的文件
        $file = $request->file('file_upload');
//        $file = $request->all();
//        dd($file);

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
         //将文件移动到七牛云，并以新文件名命名
            //\Storage::disk('qiniu')->writeStream('uploads/'.$newfile, fopen($file->getRealPath(), 'r'));
        //将文件移动到阿里OSS
            // OSS::upload($newfile,$file->getRealPath());
        //将上传的图片名称返回到前台，目的是前台显示图片
         $filepath = '/uploads/'.$newfile;
            return  $filepath;
           
        }

    }
    public function add()
    {
         //获取所有的分类数据，返回到前台列表
            // $cates = Type::get();
        $cates =  (new Cate)->tree();
        // dd($cates);
    	return view('admin/goods/add',compact('cates'));
    }

    public function store(Request $request)
    {
    	 //获取标点提交的所有商品数据
        $data = $request->except('_token','file_upload');
        // dd($data);
        
        // 2. 表单验证


        $rule = [
            'gname' => 'required|max:32',
            'gprice' => 'required|numeric',
            'stock' => 'required|numeric|max:999',
            'gdesc' => 'max:255',
            'ctime' => 'date',
        ];
        $mess = [
            'gname.required' => '商品名不能为空',
            'gname.max' => '商品名最大可填32个字符',
            'gprice.required' => '商品价格不能为空',
            'gprice.numeric' => '商品价格必须是数字',
            'stock.required' => '商品库存不能为空',
            'stock.numeric' => '商品库存必须是数字类型',
             'stock.max' => '商品库存最大只能是999',
            'gdesc.max' => '商品描述最大为255个字符',
            'ctime.date' => '请输入正确的时间格式',
        ];
        $validator =  Validator::make($data,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/goods/add')
                ->withErrors($validator)
                ->withInput();
        }




        //插入获取到的数据
        $data['ctime'] = strtotime($data['ctime']);
        
       $id = Goods::insertGetId($data);

       //判断是否成功
       if($id){
          return redirect('admin/goods/index')->with('msg','添加成功');
       }else{
            return back()->with('msg','商品添加失败');
        }
    }

    
    //   多条件带分页搜索查询
    public function index(Request $request)
    {
      $goods = Goods::orderBy('gid','asc')
      ->join('type', 'goods.tid', '=', 'type.tid')
    ->where(function($query) use($request){
        //检测关键字
        $gname = $request->input('keywords');
        // $email = $request->input('keywords2');
        //如果用户名不为空
        if(!empty($gname)) {
            $query->where('gname','like','%'.$gname.'%');
        }
        
    })
    ->paginate($request->input('num', 5));

   
        return view('admin.goods.index',['goods'=>$goods, 'request'=> $request]);
    }

    public function edit($gid,$page)
    {
        // $data = $request->all();
        // dd($page);
        $goods = Goods::find($gid);
        $cates =  (new Cate)->tree();
        // dd($goods);
        return view('/admin/goods/edit',compact('goods','cates','gid','page'));
    }

    //执行修改
    public function update(Request $request,$page)
    {
         // dd($page);
        // $goods = Goods::get();
        $input = request()->except('_token','file_upload');
        // $cates =  (new Cate)->tree();
        // dd($input);
        
        // 2. 表单验证


        $rule = [
            'gname' => 'required|max:32',
            'gprice' => 'required|numeric',
            'stock' => 'required|numeric|max:999',
            'gdesc' => 'max:255',
            'ctime' => 'date',
        ];
        $mess = [
            'gname.required' => '商品名不能为空',
            'gname.max' => '商品名最大可填32个字符',
            'gprice.required' => '商品价格不能为空',
            'gprice.numeric' => '商品价格必须是数字',
            'stock.required' => '商品库存不能为空',
            'stock.numeric' => '商品库存必须是数字类型',
             'stock.max' => '商品库存最大只能是999',
            'gdesc.max' => '商品描述最大为255个字符',
            'ctime.date' => '请输入正确的时间格式',
        ];
        $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/goods/edit/'.$input['gid'])
                ->withErrors($validator)
                ->withInput();
        }


        //  $res = $user->update($input);
        $input['ctime'] = strtotime($input['ctime']);
        $res = \DB::table('goods')->where('gid',$request['gid'])->update($input);
        // dd($res);
        if($res)
        {
          return redirect('/admin/goods/index?'.$page)->with('msg','修改成功');
        } else {
          return back()->with('msg','修改失败');
        }
    }

   public function destroy($gid)
    {
//        return $id;
        $res = Goods::find($gid)->delete();
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

    public function ajax(Request $request)
    {
      $data = \DB::table('goods')->where('gid' , $request->input('gid'))->first();


       // $a = $request->input('gid');

        if ($data->status == 2)
        {

           $res =  \DB::table('goods')->where('gid',$request->input('gid'))->update(['status' => 1]);
            return response()->json(['status' => 1]);
        } elseif($data->status == 1){
            \DB::table('goods')->where('gid',$request->input('gid'))->update(['status'=> 2]);
            return response()->json(['status' => 2]);
        } elseif($data->status == 0){
          \DB::table('goods')->where('gid',$request->input('gid'))->update(['status'=> 1]);
            return response()->json(['status' => 1]);
        }
    }
}
