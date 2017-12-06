<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Model\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConfigController extends Controller
{
    public function add()
    {
        // 添加视图
        return view('admin.config.add');
    }


    public function index()
    {

        //网站配置数据
        $config = Config::get();
        foreach ($config as $k=>$v){
//            根据当前这条记录的field_type字段的值类决定，conf_content的显示形式
            switch ($v->wtype){
                case 'input':
//                    <input type="text" name="conf_title">
                    $v->wcontent = '<input class="lg" type="text" name="wcontent[]" value="'.htmlspecialchars($v->wcontent).'">';

                    break;

                case 'textarea':
//                    <textarea id="" cols="30" rows="10" name="conf_tips"></textarea>
                    $v->wcontent = '<textarea id="" cols="30" rows="10" name="wcontent[]">'.htmlspecialchars($v->wcontent).'</textarea>';
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


                    $arr = explode(',',$v->wvalue);
                    foreach ($arr as $m=>$n){

                        $item = explode('|',$n);
                        //如果当前网站配置记录的conf_content的值 == 单选按钮的值，应该给单选按钮添加checked属性
                        if($item[0] == $v->wcontent){
                            $str.= '<input type="radio" checked name="wcontent[]" value="'.$item[0].'" >'.$item[1];
                        }else{
                            $str.= '<input type="radio"  name="wcontent[]" value="'.$item[0].'" >'.$item[1];
                        }

                    }

                    $v->wcontent = $str;


                    break;
            }



//            $v->conf_content
        }

        return view('admin.config.index',compact('config'));
    }

}
