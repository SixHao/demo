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
Route::get('/admin/login','Admin\LoginController@login');
//    登录验证
Route::post('/admin/dologin','Admin\LoginController@dologin');
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
Route::get('/admin/goods/add','Admin\Goods\GoodsController@add');
//    执行添加
Route::post('/admin/goods/store','Admin\Goods\GoodsController@store');
//    商品列表
Route::get('/admin/goods/index','Admin\Goods\GoodsController@index');
//    修改商品
Route::get('/admin/goods/edit/{gid}/{page}','Admin\Goods\GoodsController@edit');
//    执行修改
Route::post('/admin/goods/update/{page}','Admin\Goods\GoodsController@update');
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
//    添加权限
Route::get('/admin/role/add','Admin\Auth\RoleController@add');
//    执行添加
Route::post('/admin/role/store','Admin\Auth\RoleController@store');
//    权限列表
Route::get('/admin/role/index','Admin\Auth\RoleController@index');
//    修改权限
Route::get('/admin/role/edit','Admin\Auth\RoleController@edit');
//    执行修改
Route::post('/admin/role/update','Admin\Auth\RoleController@update');
//    删除权限
Route::get('/admin/role/delete','Admin\Auth\RoleController@delete');














//后台订单模块















//后台活动模块
//      添加活动
Route::get('/admin/active/add','Admin\Active\ActiveController@add');
//      执行添加操作
Route::post('/admin/active/create','Admin\Active\ActiveController@create');
//      活动列表
Route::get('/admin/active/index','Admin\Active\ActiveController@index');
//      修改活动
Route::post('/admin/active/edit','Admin\Active\ActiveController@edit');
//      删除活动
Route::post('/admin/active/delete/{aid}','Admin\Active\ActiveController@delete');





//后台密码修改模块

//    修改密码
Route::get('/admin/user/editpwd', 'Admin\UserController@editpwd');
//    执行修改
Route::post('/admin/user/doeditpwd/{uid}', 'Admin\UserController@doeditpwd');



//后台轮播图
//    添加图片
Route::get('/admin/slidershow/add', 'Admin\SlidershowController@add');
//    执行添加
Route::post('/admin/slidershow/doadd', 'Admin\SlidershowController@doadd');
//    图片列表
Route::get('/admin/slidershow/list', 'Admin\SlidershowController@list');
//    图片修改
Route::get('/admin/slidershow/edit/{bid}', 'Admin\SlidershowController@edit');
//    执行修改
Route::post('/admin/slidershow/update/{bid}', 'Admin\SlidershowController@update');
//    图片删除
Route::get('/admin/slidershow/delete/{bid}', 'Admin\SlidershowController@delete');
Route::post('/admin/slidershow/upload', 'Admin\SlidershowController@upload');




























//后台友情链接模块
//    添加友情链接
Route::get('/admin/friend/add', 'Admin\Friend\FriendController@add');
//    执行添加
Route::post('/admin/friend/insert', 'Admin\Friend\FriendController@insert');
//    友情链接列表
Route::get('/admin/friend/list', 'Admin\Friend\FriendController@list');
//    友情链接修改
Route::get('/admin/friend/edit/{fid}', 'Admin\Friend\FriendController@edit');
//    执行修改
Route::post('/admin/friend/update/{fid}', 'Admin\Friend\FriendController@update');
//    友情链接删除
Route::get('/admin/friend/delete/{fid}', 'Admin\Friend\FriendController@delete');
Route::post('/admin/friend/upload', 'Admin\Friend\FriendController@upload');






































//前台登录模块




//前台首页
Route::get('/home/index','Home\IndexController@index');










































































































//购物车
Route::get('/home/cart','Home\CartController@shopcart');
//删除
Route::get('/home/cart/delete/{gid}','Home\CartController@delete');





Route::get('/home/pay','Home\PayController@pay');




















































































































Route::get('/home/shopcart','Home\CartController@shopcart');
Route::get('/home/shopcart','Home\CartController@cart');





Route::get('/home/pay','Home\PayController@pay');
