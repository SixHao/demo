<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use App\Http\Model\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConfigController extends Controller
{
    /**
     * 将网站配置表中的内容写入config目录下的网站配置文件中
     */

    public function PutFile()
    {

//        1 获取网站配置表中的数据

        $conf = Config::pluck('wcontent', 'wname')->all();
        //dd($conf);

//        2 创建网站配置文件，写入数据
        //配置文件的文件名
        $filename = config_path() . '\webconfig.php';
        //        数据库中查到的数据是数组形式，变成字符串形式
        $context = "<?php return \n" . var_export($conf, true) . ';';
        //        dd($con);
        //return $filename;

        file_put_contents($filename, $context);

    }

    /**
     * 批量修改网站配置内容
     */

    public function ContentChange(Request $request)
    {

        // dd(1111);

        $input = $request->all();
        // dd($input);

//        根据wid数组获取要修改的网站配置记录，然后从wcontent的同下标中取出此网站配置记录要修改成的值

        foreach ($input['wid'] as $k => $v) {
//           找到一条要修改的网站配置记录
            $conf = Config::find($v);

//          $input['conf_content']
            $conf->update(['wcontent' => $input['wcontent'][$k]]);
        }
        $this->PutFile();
        return redirect('admin/config/index');
    }

    public function add()
    {
        // 添加视图
        return view('admin.config.add');
    }

    //  执行添加

    public function insert(Request $request)
    {
        // 1. 获取提交的表单数据
        $input = $request->except('_token');
        // dd($input);
        //        2. 表单验证

        $rule = [
            'wname' => 'required|unique:web_config|min:2|max:18|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            'wtitle' => 'required|unique:web_config|min:2|max:18|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            'wcontent' => 'required|unique:web_config',
            'wtips' => 'required|unique:web_config',
            'worder' => 'required|numeric|unique:web_config',

        ];
        $mess = [
            'wname.required' => '配置名称不能为空',
            'wname.unique' => '此配置名称已存在',
            'wname.regex' => '配置名称必须汉字字母下划线',
            'wname.min' => '配置名称最少为4位',
            'wname.max' => '配置名称最多为18位',

            'wtitle.required' => '配置标题不能为空',
            'wtitle.unique' => '此配置标题已存在',
            'wtitle.regex' => '配置标题必须汉字字母下划线',
            'wtitle.min' => '配置标题最少为4位',
            'wtitle.max' => '配置标题最多为18位',

            'wcontent.required' => '配置内容不能为空',
            'wcontent.unique' => '此配置内容已存在',

            'wtips.required' => '配置注释不能为空',
            'wtips.unique' => '此配置注释已存在',

            'worder.required' => '配置排序不能为空',
            'worder.numeric' => '配置排序必须是数字',
            'worder.unique' => '配置排序必须是唯一',

        ];
        $validator = Validator::make($input, $rule, $mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/config/add')
                ->withErrors($validator)
                ->withInput();
        }
//        3. 执行添加操作
        $res = Config::create($input);
//        4. 判断是否添加成功
        if ($res) {
            $this->PutFile();
            return redirect('admin/config/index')->with('msg', '添加成功');
        } else {
            return redirect('admin/config/add')->with('msg', '添加失败');
        }
    }

    // 配置列表
    public function index()
    {

        //网站配置数据
        $config = Config::get();
        foreach ($config as $k => $v) {
//            根据当前这条记录的field_type字段的值类决定，conf_content的显示形式
            switch ($v->wtype) {
                case 'input':
//                    <input type="text" name="conf_title">
                    $v->wcontent = '<input class="lg"  type="text" name="wcontent[]" value="' . htmlspecialchars($v->wcontent) . '">';

                    break;

                case 'textarea':
//                    <textarea id="" cols="30" rows="10" name="conf_tips"></textarea>
                    $v->wcontent = '<textarea id=""  cols="30" rows="10" name="wcontent[]">' . htmlspecialchars($v->wcontent) . '</textarea>';
                    break;

                case 'radio':

//                    $item =[
                    //                        0=>1,
                    //                        1=>'开启'
                    //                    ]
                    //
                    //                    1|开启,0|关闭
                    //                    =====>
                    //                  arr=  [
                    //                        0=>'1|开启',
                    //                        1=>'0|关闭'
                    //                    ]
                    //                ========》
                    //                    <input type="radio" name="field_type" value="1" >开启
                    //                    <input type="radio" name="field_type" value="0" >关闭

//                    存放最终拼接的结果
                    $str = '';

                    $arr = explode(',', $v->wvalue);
                    foreach ($arr as $m => $n) {

                        $item = explode('|', $n);
                        //如果当前网站配置记录的conf_content的值 == 单选按钮的值，应该给单选按钮添加checked属性
                        if ($item[0] == $v->wcontent) {
                            $str .= '<input type="checkbox" checked name="wcontent[]" value="' . $item[0] . '" >' . $item[1];
                        } else {
                            $str .= '<input type="checkbox"  name="wcontent[]" value="' . $item[0] . '" >' . $item[1];
                        }

                    }

                    $v->wcontent = $str;

                    break;
            }

//            $v->conf_content
        }


        return view('admin.config.index', compact('config'));
    }

// 修改配置
    public function edit($wid)
    {
        // 1. 根据传过来的ID获取要修改的用户记录
        $data = Config::find($wid);
        // dd($data);

//        2.返回修改页面（带上要修改的用户记录）
        return view('admin.config.edit', compact('data'));

    }

    // 执行修改
    public function update(Request $request, $wid)
    {
        // 1. 通过id找到要修改那个用户
        $data = Config::find($wid);

//        2. 通过$request获取要修改的值

        $input = $request->except('_token', 'wid');

        //        2. 表单验证

        $rule = [
            'wname' => 'required|min:2|max:18|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            'wtitle' => 'required|min:2|max:18|regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u',
            'wcontent' => 'required',
            'wtips' => 'required',
            'worder' => 'required|numeric',

        ];
        $mess = [
            'wname.required' => '配置名称不能为空',

            'wname.regex' => '配置名称必须汉字字母下划线',
            'wname.min' => '配置名称最少为4位',
            'wname.max' => '配置名称最多为18位',

            'wtitle.required' => '配置标题不能为空',

            'wtitle.regex' => '配置标题必须汉字字母下划线',
            'wtitle.min' => '配置标题最少为4位',
            'wtitle.max' => '配置标题最多为18位',

            'wcontent.required' => '配置内容不能为空',

            'wtips.required' => '配置注释不能为空',

            'worder.required' => '配置排序不能为空',
            'worder.numeric' => '配置排序必须是数字',

        ];
        $validator = Validator::make($input, $rule, $mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/config/edit')
                ->withErrors($validator)
                ->withInput();
        }

//        3. 使用模型的update进行更新
        //        $user->update(['user_name'=>'zhangsan']);
        $res = $data->update($input);

//        4. 根据更新是否成功，跳转页面
        if ($res) {
            $this->PutFile();
            return redirect('admin/config/index')->with('msg', '修改成功');
        } else {
            return redirect('admin/config/edit/' . $data->wid)->with('msg', '修改失败');
        }

    }

    // 删除用户
    public function delete($wid)
    {
        $res = Config::find($wid)->delete();
        $data = [];
        if ($res) {
            $this->PutFile();
            $data['error'] = 0;
            $data['msg'] = "删除成功";
        } else {
            $data['error'] = 1;
            $data['msg'] = "删除失败";
        }

//        return  json_encode($data);

        return $data;

    }

}
