<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class IsLogin
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
//        如果用户登录了就放行  如果没有登录就拦住返回到登录页面


        if (Session::get('users'))
        {
            return $next($request);
        } else {
            return redirect('admin/login')->with('errors','请先登录');
        }


    }
}
