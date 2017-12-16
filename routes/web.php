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
Route::get('/admin/outlogin','Admin\LoginController@outlogin');
//404页面
Route::get('/admin/404',function (){
    return view('errors/auth');
});

Route::group(['middleware'=>['islogin','hasrole'],'prefix'=>'admin','namespace'=>'Admin'],function (){
//后台首页模块

//    显示后台首页
Route::get('index', 'Index\IndexController@index');

//后台用户模块

//    添加用户
Route::get('user/add', 'UserController@add');
//    执行添加
Route::post('user/insert', 'UserController@insert');
//    用户列表
Route::get('user/list', 'UserController@list');
//    用户修改
Route::get('user/edit/{uid}', 'UserController@edit');
//    执行修改
Route::post('user/update/{uid}', 'UserController@update');
//    用户删除
Route::get('user/delete/{uid}', 'UserController@delete');
Route::post('user/upload', 'UserController@upload');
//    用户授权
Route::get('user/auth/{uid}','UserController@auth');
//    执行授权
Route::post('user/doauth','UserController@doauth');

//后台商品模块

//    添加商品
Route::get('goods/add', 'Goods\GoodsController@add');
//    执行添加
Route::post('goods/store', 'Goods\GoodsController@store');
//    商品列表
Route::get('goods/index', 'Goods\GoodsController@index');
//    修改商品
Route::get('goods/edit/{gid}/{page}','Goods\GoodsController@edit');
//    执行修改
Route::post('goods/update/{page}','Goods\GoodsController@update');
//    删除商品
Route::post('goods/destroy/{gid}','Goods\GoodsController@destroy');
//    图片上传
Route::post('goods/upload','Goods\GoodsController@upload');
Route::post('goods/ajax','Goods\GoodsController@ajax');




//后台分类模块
//    添加分类
Route::get('cate/add','Cate\CateController@add');
//添加子分类
Route::get('cate/create/{tid}','Cate\CateController@create');
//    执行添加
Route::post('cate/store','Cate\CateController@store');
//    分类列表
Route::get('cate/index','Cate\CateController@index');
//    修改分类
Route::get('cate/edit/{tid}','Cate\CateController@edit');
//    执行修改
Route::post('cate/update/{tid}','Cate\CateController@update');
//    删除分类
Route::post('cate/destroy/{tid}','Cate\CateController@destroy');


//后台角色模块

Route::resource('role','Role\RoleController');
//    角色授权
Route::get('role/auth/{id}','Role\RoleController@auth');
//    执行授权
Route::post('role/doauth','Role\RoleController@doauth');

//后台权限模块

Route::resource('permission','Permission\PermissionController');












//后台订单模块
// 订单列表
Route::get('order/index', 'Order\OrderController@index');

//后台活动模块
//      添加活动
Route::get('active/add', 'Active\ActiveController@add');
//      执行添加操作
Route::post('active/create', 'Active\ActiveController@create');
//      活动列表
Route::get('active/index', 'Active\ActiveController@index');
//      修改活动
Route::post('active/edit', 'Active\ActiveController@edit');
//      删除活动
Route::post('active/delete/{aid}', 'Active\ActiveController@delete');

//后台密码修改模块

//    修改密码
Route::get('user/editpwd', 'UserController@editpwd');
//    执行修改
Route::post('user/doeditpwd/{uid}', 'UserController@doeditpwd');



//后台轮播图
//    添加图片
Route::get('slidershow/add', 'SlidershowController@add');
//    执行添加
Route::post('slidershow/doadd', 'SlidershowController@doadd');
//    图片列表
Route::get('slidershow/list', 'SlidershowController@list');
//    图片修改
Route::get('slidershow/edit/{bid}', 'SlidershowController@edit');
//    执行修改
Route::post('slidershow/update/{bid}', 'SlidershowController@update');
//    图片删除
Route::get('slidershow/delete/{bid}', 'SlidershowController@delete');
Route::post('slidershow/upload', 'SlidershowController@upload');



//    网站配置
// 添加配置
Route::get('config/add', 'Config\ConfigController@add');
// 执行添加操作
Route::post('config/insert', 'Config\ConfigController@insert');
// 配置列表
Route::get('config/index', 'Config\ConfigController@index');
//    配置修改
Route::get('config/edit/{wid}', 'Config\ConfigController@edit');
// 修改配置
Route::post('config/update/{wid}', 'Config\ConfigController@update');
// 删除配置
Route::post('config/delete/{wid}', 'Config\ConfigController@delete');
// 批量修改网站配置路由
Route::post('config/ContentChange', 'Config\ConfigController@ContentChange');
//同步网站配置表中的内容到webconfig配置文件中
Route::get('config/putfile', 'Config\ConfigController@PutFile');



//后台友情链接模块
//    添加友情链接
Route::get('friend/add', 'Friend\FriendController@add');
//    执行添加
Route::post('friend/insert', 'Friend\FriendController@insert');
//    友情链接列表
Route::get('friend/list', 'Friend\FriendController@list');
//    友情链接修改
Route::get('friend/edit/{fid}', 'Friend\FriendController@edit');
//    执行修改
Route::post('friend/update/{fid}', 'Friend\FriendController@update');
//    友情链接删除
Route::get('friend/delete/{fid}', 'Friend\FriendController@delete');
Route::post('friend/upload', 'Friend\FriendController@upload');

});




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
// 退出登录
Route::get('/home/outlogin','Home\login\LoginController@outlogin');
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






// 删除收货地址
Route::post('/home/pay/delete/{aid}', 'Home\PayController@delete');

// 添加至订单数据库
Route::post('./home/pay/insert', 'Home\PayController@insert');

Route::post('/admin/friend/insert', 'Admin\Friend\FriendController@insert');






//用户中心首页
Route::get('/home/userinfo/index','Home\userinfo\UserinfoController@index');
//个人信息
Route::get('/home/userinfo/personal','Home\userinfo\UserinfoController@personal');	
//修改个人资料
Route::post('/home/userinfo/editperson','Home\userinfo\UserinfoController@editperson');
// 上传头像
Route::post('/home/userinfo/upload','Home\userinfo\UserinfoController@upload');	
// 安全设置
Route::get('/home/userinfo/safety','Home\userinfo\UserinfoController@safety');
// 执行密码修改
Route::post('/home/userinfo/dosafety','Home\userinfo\UserinfoController@dosafety');	
//地址列表页面
Route::get('/home/userinfo/addresslist','Home\userinfo\UserinfoController@addresslist');
//添加地址
Route::get('/home/userinfo/address','Home\userinfo\UserinfoController@address');
//增加地址
Route::post('/home/userinfo/doaddress','Home\userinfo\UserinfoController@doaddress');
//设置默认地址
Route::post('/home/userinfo/doadd','Home\userinfo\UserinfoController@doadd');
//删除地址
Route::post('/home/userinfo/deleteaddr/{aid}','Home\userinfo\UserinfoController@deleteaddr');
//加载订单详情
Route::get('/home/userinfo/mydetail','Home\userinfo\UserinfoController@mydetail');
//修改订单状态
Route::get('/home/userinfo/editdetail','Home\userinfo\UserinfoController@editdetail');
//历史订单
Route::get('/home/userinfo/olddetail','Home\userinfo\UserinfoController@olddetail');







//前台商品列表
Route::get('home/goodslist/{id}','Home\indexController@goodslist');
//搜索商品路由
Route::post('home/goods','Home\IndexController@search');





