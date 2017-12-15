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
Route::get('/admin/goods/edit/{gid}/{page}','Admin\Goods\GoodsController@edit');
//    执行修改
Route::post('/admin/goods/update/{page}','Admin\Goods\GoodsController@update');
//    删除商品
Route::post('/admin/goods/destroy/{gid}','Admin\Goods\GoodsController@destroy');
//    图片上传
Route::post('/admin/goods/upload','Admin\Goods\GoodsController@upload');
Route::post('/admin/goods/ajax','Admin\Goods\GoodsController@ajax');

Route::get('/admin/goods/edit', 'Admin\Goods\GoodsController@edit');
//    执行修改
Route::post('/admin/goods/update', 'Admin\Goods\GoodsController@update');
//    删除商品
Route::get('/admin/goods/delete', 'Admin\Goods\GoodsController@delete');

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
// 订单列表
Route::get('/admin/order/index', 'Admin\Order\OrderController@index');

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

//前台注册页面
Route::get('/home/zhuce/zhuce','Home\Zhuce\ZhuceController@zhuce');
//用户名注册
Route::post('/home/zhuce/douserzhuce','Home\zhuce\ZhuceController@douserzhuce');
//发送手机验证码
 Route::post('/home/zhuce/sendcode','Home\zhuce\ZhuceController@sendCode');
//手机号注册
Route::post('/home/zhuce/dophonezhuce','Home\zhuce\ZhuceController@dophonezhuce');
//邮箱注册
Route::post('/home/zhuce/doemailzhuce','Home\zhuce\ZhuceController@doEmailzhuce');
//邮件注册激活路由
Route::get('/home/zhuce/active','Home\zhuce\ZhuceController@active');

//登录
Route::get('/home/login/login','Home\login\LoginController@login');
//执行登录
Route::post('/home/login/dologin','Home\login\LoginController@dologin');

// 忘记密码
Route::get('/home/login/forget','Home\login\LoginController@forget');

//找回密码页面
Route::get('/home/login/reset','Home\login\LoginController@reset');
//重置密码
Route::post('/home/login/doreset','Home\login\LoginController@doreset');
//ajax判断邮箱用户名是否存在
Route::post('/home/login/ajax','Home\login\LoginController@ajax');


//前台首页
Route::get('/home/index', 'Home\IndexController@index');

// 前台详情表
Route::get('/home/details/{gid}','Home\DetailsController@index');
// ajax商品信息数量加入购物车
Route::post('/home/details/insertcart','Home\DetailsController@insertcart');
// 商品信息数量加入结算页
Route::post('/home/pay','Home\DetailsController@insertpay');

//购物车
Route::get('/home/cart', 'Home\CartController@shopcart');
//删除
Route::get('/home/cart/delete/{gid}', 'Home\CartController@delete');

Route::get('/home/pay', 'Home\PayController@pay');

Route::get('/home/shopcart', 'Home\CartController@shopcart');
Route::get('/home/shopcart', 'Home\CartController@cart');

Route::get('/home/pay', 'Home\PayController@pay');

// 删除收货地址
Route::post('/home/pay/delete/{aid}', 'Home\PayController@delete');

// 添加至订单数据库
Route::post('./home/pay/insert', 'Home\PayController@insert');

Route::post('/admin/friend/insert', 'Admin\Friend\FriendController@insert');




