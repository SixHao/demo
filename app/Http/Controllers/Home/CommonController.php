<?php

namespace App\Http\Controllers\home;

use App\Http\Model\Cate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    static public function getCatePid($pid = 0)
     {
         $cates = (new Cate)->where('pid',$pid)->get();
         $arr = [];
         foreach ($cates as $key => $value) {
             # code...
             $value['sub'] = self::getCatePid($value['tid']);
             $arr[] = $value;
         }
         return $arr;
     }
}
