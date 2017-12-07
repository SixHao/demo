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
Route::get('/admin/goods/add','Admin\Goods\GoodsController@add');
//    执行添加
Route::post('/admin/goods/store','Admin\Goods\GoodsController@store');
//    商品列表
Route::get('/admin/goods/index','Admin\Goods\GoodsController@index');
//    修改商品
Route::get('/admin/goods/edit/{gid}','Admin\Goods\GoodsController@edit');
//    执行修改
Route::post('/admin/goods/update','Admin\Goods\GoodsController@update');
//    删除商品
Route::post('/admin/goods/destroy/{gid}','Admin\Goods\GoodsController@destroy');
//    图片上传
Route::post('/admin/goods/upload','Admin\Goods\GoodsController@upload');
Route::post('/admin/goods/ajax','Admin\Goods\GoodsController@ajax');

//后台分类模块
//    添加分类
Route::get('/admin/cate/add','Admin\Cate\CateController@add');
//添加子分类
Route::get('/admin/cate/create/{tid}','Admin\Cate\CateController@create');
//    执行添加
Route::post('/admin/cate/store','Admin\Cate\CateController@store');
//    分类列表
Route::get('/admin/cate/index','Admin\Cate\CateController@index');
//    修改分类
Route::get('/admin/cate/edit/{tid}','Admin\Cate\CateController@edit');
//    执行修改
Route::post('/admin/cate/update/{tid}','Admin\Cate\CateController@update');
//    删除分类
Route::post('/admin/cate/destroy/{tid}','Admin\Cate\CateController@destroy');














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

