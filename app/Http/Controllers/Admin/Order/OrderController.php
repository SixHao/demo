<?php

namespace App\Http\Controllers\Admin\Order;


use App\Http\Model\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

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
                    $query->where('oid', 'like', '%' . $oid . '%');
                }

            })
            ->paginate($request->input('num', 5));
        return view('admin/order/index', ['data' => $data, 'request' => $request]);
    }

    // 修改订单
    public function edit($oid)
    {
        // 1. 根据传过来的ID获取要修改的用户记录
        $data = Order::find($oid);
        // dd($data);

//        2.返回修改页面（带上要修改的用户记录）
        return view('admin.Order.edit', compact('data'));

    }


    // 执行修改
    public function update(Request $request, $oid)
    {
        // 1. 通过id找到要修改那个用户
        $data = Order::find($oid);
//        dd($data);

//        2. 通过$request获取要修改的值

        $input = $request->except('_token');
//        dd($input);


//        /**
//         * 验证手机号码
//         *
//         * 移动号码段:139、138、137、136、135、134、150、151、152、157、158、159、182、183、187、188、147
//         * 联通号码段:130、131、132、136、185、186、145
//         * 电信号码段:133、153、180、189
//         **/
//        //         表单验证
//
        $rule = [
            'rec' => 'required|min:2|max:10',




            'tel'=> array('regex:/^13\d{9}$|^14\d{9}$|^15\d{9}$|^17\d{9}$|^18\d{9}$/i'),
            'addr' => 'required|min:2|max:60',
        ];
        $mess = [
            'rec.required' => '收货人不能为空',
            'rec.regex' => '收货人必须汉字',
            'rec.min' => '收货人最少为2位',
            'rec.max' => '收货人最多为10位',

            'tel.required' => '手机号不能为空',
            'tel.regex' => '手机号开头必须以13,14,15,17,18开头',
            'tel.numeric' => '手机号必须是数字',
            'tel.message' => '手机号必须11位',


            'addr.required' => '收货地址不能为空',
            'addr.min' => '收货地址最少为2位',
            'addr.max' => '收货地址最多为60位',
        ];
        $validator = Validator::make($input, $rule, $mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/order/edit/'. $data->oid)
                ->withErrors($validator)
                ->withInput();
        }
//        3. 使用模型的update进行更新
        $res = $data->update($input);
//        dd($res);


//        4. 根据更新是否成功，跳转页面
        if ($res) {
            return redirect('admin/order/index');
        } else {
            return redirect('admin/order/edit/' . $data->oid);
        }
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

}
