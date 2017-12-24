<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class hislogin
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


        if (Session::get('husers'))
        {
            return $next($request);
        } else {
            return redirect('home/login/login')->with('errors','您还没有登录,请先登录');
        }

    }
}
