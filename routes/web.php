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
Route::get('/admin/user/add', 'Admin\UserController@add');
//    执行添加
Route::post('/admin/user/insert', 'Admin\UserController@insert');
//    用户列表
Route::get('/admin/user/list', 'Admin\UserController@list');
//    用户修改
Route::get('/admin/user/edit/{uid}', 'Admin\UserController@edit');
//    执行修改
Route::post('/admin/user/update/{uid}', 'Admin\UserController@update');
//    用户删除
Route::get('/admin/user/delete/{uid}', 'Admin\UserController@delete');
Route::post('/admin/user/upload','Admin\UserController@upload');


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

//    登录模块

//    验证登录




//前台注册模块

//    注册用户

//    验证注册信息




//前台首页


