<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


//后台登录页面
//    登录模块

//    登录验证

//    退出登录



//后台首页模块

//    显示后台首页
    Route::get('/admin/index','Admin\Index\IndexController@index');

//后台用户模块

//    添加用户

//    执行添加

//    用户列表

//    用户修改

//    执行修改

//    用户删除




//后台商品模块

//    添加商品

//    执行添加

//    商品列表

//    修改商品

//    执行修改

//    删除商品



//后天分类模块















//后台分类模块















//后台角色模块















//后台权限模块















//后台订单模块















//后台活动模块















//后台密码修改模块

//    修改密码

//    执行修改






//前台登录模块

// 登录模块
    Route::get('/home/login','Home\LoginController@login');
//处理登录数据的路由
    Route::post('/home/dologin','Home\LoginController@dologin');

//前台注册模块
//    注册用户
Route::get('/home/zhuce','Home\ZhuceController@zhuce');

//   注册的验证
Route::post('/home/dozhuce','Home\ZhuceController@dozhuce');



//前台首页

