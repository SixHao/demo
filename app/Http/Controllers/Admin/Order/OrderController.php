<?php

namespace App\Http\Controllers\Admin\Order;



use App\Http\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;

class OrderController extends Controller
{
    public function index(Request $request)
    {


        $data = Order::orderBy('oid', 'asc')
            ->where(function ($query) use ($request) {
                //检测关键字
                $oid = $request->input('oid');

                //如果订单号不为空
                if (!empty($oid)) {
                    $query->where('oid', 'like', '%'.$oid.'%');
                }

            })
            ->paginate($request->input('num', 5));
        return view('admin/order/index', ['data' => $data, 'request' => $request]);
    }


    public function ajax(Request $request)
    {
        $input = $request->except('_token');
        $data = \DB::table('orders')->where('oid' , $request->input('oid'))->first();

//      return $data;

        // $a = $request->input('gid');

        if ($data->ostatus == 3)
        {

            $res =  \DB::table('orders')->where('oid',$request->input('oid'))->update(['ostatus' => 1]);
            return response()->json(['ostatus' => 1]);
        } elseif($data->ostatus == 2){
            \DB::table('orders')->where('oid',$request->input('oid'))->update(['ostatus'=> 3]);
            return response()->json(['ostatus' => 3]);
        } elseif($data->ostatus == 1){
            \DB::table('orders')->where('oid',$request->input('oid'))->update(['ostatus'=> 2]);
            return response()->json(['ostatus' => 2]);
        }
    }


    public function list(Request $request,$oid)
    {
        //  根据传过来的oid查询订单详情表,根据查询出来的订单详情表中的gid获取商品表中的相同gid的所有数据获取所有
        $data = \DB::table('detail')
            ->where('oid',$oid)
            ->join('goods', 'detail.gid', '=', 'goods.gid')
            ->select('detail.*', 'goods.*')
            ->paginate(5);

//        dd($data);


        return view('admin/order/list', ['data' => $data,]);
    }

}
