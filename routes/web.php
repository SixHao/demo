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
Route::get('/admin/login', 'Admin\LoginController@login');
//    登录验证
Route::post('/admin/dologin', 'Admin\LoginController@dologin');
//    退出登录

//后台首页模块

//    显示后台首页
Route::get('/admin/index', 'Admin\Index\IndexController@index');

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
Route::post('/admin/user/upload', 'Admin\UserController@upload');

//后台商品模块

//    添加商品
Route::get('/admin/goods/add', 'Admin\Goods\GoodsController@add');
//    执行添加
Route::post('/admin/goods/store', 'Admin\Goods\GoodsController@store');
//    商品列表
Route::get('/admin/goods/index', 'Admin\Goods\GoodsController@index');
//    修改商品
Route::get('/admin/goods/edit', 'Admin\Goods\GoodsController@edit');
//    执行修改
Route::post('/admin/goods/update', 'Admin\Goods\GoodsController@update');
//    删除商品
Route::get('/admin/goods/delete', 'Admin\Goods\GoodsController@delete');

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

//后台分类模块

//后台角色模块

//后台权限模块

//后台订单模块
// 订单列表
Route::get('/admin/order/index', 'Admin\Order\OrderController@index');
// 修改订单
Route::get('/admin/order/edit/{oid}', 'Admin\Order\OrderController@edit');
// 执行修改
Route::post('/admin/order/update/{oid}', 'Admin\Order\OrderController@update');
//订单状态
Route::post('/admin/order/ajax','Admin\Order\OrderController@ajax');

//后台活动模块
//      添加活动
Route::get('/admin/active/add', 'Admin\Active\ActiveController@add');
//      执行添加操作
Route::post('/admin/active/create', 'Admin\Active\ActiveController@create');
//      活动列表
Route::get('/admin/active/index', 'Admin\Active\ActiveController@index');
//      修改活动
Route::post('/admin/active/edit', 'Admin\Active\ActiveController@edit');
//      删除活动
Route::post('/admin/active/delete/{aid}', 'Admin\Active\ActiveController@delete');

//后台密码修改模块

//    修改密码
// Route::post('/admin/user/editpwd', 'Admin/')
//    执行修改

//    网站配置
// 添加配置
Route::get('admin/config/add', 'Admin\Config\ConfigController@add');
// 执行添加操作
Route::post('admin/config/insert', 'Admin\Config\ConfigController@insert');
// 配置列表
Route::get('admin/config/index', 'Admin\Config\ConfigController@index');
//    配置修改
Route::get('/admin/config/edit/{wid}', 'Admin\Config\ConfigController@edit');
// 修改配置
Route::post('admin/config/update/{wid}', 'Admin\Config\ConfigController@update');
// 删除配置
Route::post('admin/config/delete/{wid}', 'Admin\Config\ConfigController@delete');
// 批量修改网站配置路由
Route::post('admin/config/ContentChange', 'Admin\Config\ConfigController@ContentChange');
//同步网站配置表中的内容到webconfig配置文件中
Route::get('admin/config/putfile', 'Admin\Config\ConfigController@PutFile');

//前台登录模块

// 登录模块
Route::get('/home/login', 'Home\LoginController@login');
//处理登录数据的路由
Route::post('/home/dologin', 'Home\LoginController@dologin');

//前台注册模块
//    注册用户
Route::get('/home/zhuce', 'Home\ZhuceController@zhuce');

//   注册的验证
Route::post('/home/dozhuce', 'Home\ZhuceController@dozhuce');

//前台首页
Route::get('/home/index', 'Home\IndexController@index');

//购物车
Route::get('/home/cart', 'Home\CartController@shopcart');
//删除
Route::get('/home/cart/delete/{gid}', 'Home\CartController@delete');

Route::get('/home/pay', 'Home\PayController@pay');

Route::get('/home/shopcart', 'Home\CartController@shopcart');
Route::get('/home/shopcart', 'Home\CartController@cart');

Route::get('/home/pay', 'Home\PayController@pay');
//前台订单详情页
Route::get('home/order','Home\OrderController@index');