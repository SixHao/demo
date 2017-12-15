<?php

namespace App\Http\Controllers\Home;
use App\Http\Model\goods;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    //浏览评论
    public function index()
    {
    	$data = \DB::table('comment')
    		  ->join('users', 'users.uid', '=', 'comment.uid')
    		  ->join('goods', 'goods.gid', '=', 'comment.gid')
    		  ->join('userinfo', function($join) {
    		  	$join->on('user.uid', '=', 'users.uid')
    		  	->select('comment.*', 'users.uid', 'goods.gname','userinfo.nickname')
    		  })->get();
    		  
    		  
    	dd($data);

    }
}
