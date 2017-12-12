<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $table = 'type';
    public $primaryKey = 'tid';
    public $guarded = [];
    public $timestamps = false;


    public  function tree()
    {
        $cates = $this->orderBy('tid','asc')->get();
        //对分类数据进行格式化（排序、缩进）
        return $this->getTree($cates,0);
    }


// foreach ($data as $cate){
//           echo  str_repeat("&nbsp;",4*$cate->lev),$cate->tname,"</br>";
//        }


    public function getTree($cates,$tid=0,$lev=1){
        $subtree = [];//子孙数组
        foreach ($cates as $v)
        {
            if($v->pid==$tid)
            {
                $v->lev = $lev;
                $subtree[] = $v;
                $subtree = array_merge($subtree,$this->getTree($cates,$v->tid,$lev+1));
            }
        }
        return $subtree;
    }


    /**
     * 对分类数据进行格式化（排序、缩进）
    //  */
    // public function getTree($type,$pid)
    // {
    //     //存放最终结果的数组
    //     $arr = [];
    //     foreach($type as $k=>$v){
    //         //如果是当前遍历的类是一级类
    //         if($v->pid == $pid){
    //             //复制当前分类的名称给cate_names字段
    //             $v->tnames = $v->tname;
    //             $arr[] = $v;

    //             //找当前一级类下的二级类
    //             foreach ($type as $m=>$n) {
    //                 //如果一个分类的pid == $v这个类的id,那这个类就是$v的子类
    //                 if($n->pid == $v->tid){
    //                     $n->tnames= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|--'.$n->tname;
    //                     $arr[] = $n;
    //                 }
    //             }
    //         }
    //     }
    //     return $arr;
    // }

   
}
