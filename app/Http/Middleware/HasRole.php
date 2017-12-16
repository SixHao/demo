<?php

namespace App\Http\Middleware;

use App\Http\Model\user;
use Closure;
use Session;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //  如果当前用户有正在执行的路由权限放行  否则就给一个没有权限的提示

//        1.获取当前用户执行的操作的对应的路由的控制器的方法
//            当前路由对应的控制器的方法

            $route=  \Route::current()->getActionName();

//        2.获取当期那用户所拥有的权限
//            2.0获取当前用户

            $uid = session('users')->uid;
            $user = user::find($uid);


            //        2.1 获取当前用户拥有的角色

            $roles = $user->role;
//            dd($roles);

//            定义一个数组,存放用户拥有的所有的权限

            $arr = [];
            //        2.2根据角色判断出当前用户的所有权限

            foreach($roles as $k=>$v)
            {
//                    根据拥有的角色找到相关的权限,的description字段
                foreach($v->permission as $m=>$n)
                {
                    $arr[] = $n->pdesc;
                }
            }

//                去除权限中重复的记录
            $arr = array_unique($arr);

//        2.3 判断当前路由对应的控制器的方法是否在用户拥有的权限中

//        如果当前路由对应的控制器的方法在用户拥有的权限中,放行,如果不在就提示没有权限
//                    dd($arr);

            if (in_array($route,$arr))
            {
                return $next($request);
            } else {
                return redirect('/admin/');  
            }



    }
}
