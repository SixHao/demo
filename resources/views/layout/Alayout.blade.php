<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('title')
	<title>网站后台</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="icon" type="image/png" href="{{ asset('/admin/assets/i/favicon.png') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('/admin/assets/i/app-icon72x72@2x.png') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/amazeui.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/amazeui.datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/app.css') }}">
    <script src="{{ asset('/admin/assets/js/echarts.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
    <script type="text/javascript" src="{{asset('/admin/assets/js/ch-ui.admin.js')}}"></script>
	<script src="{{ asset('/admin/assets/js/amazeui.min.js') }}"></script>
	<script src="{{ asset('/admin/assets/js/amazeui.datatables.min.js') }}"></script>
	<script src="{{ asset('/admin/assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/app.js') }}"></script>
</head>

<body data-type="index">
<script src="{{ asset('/admin/assets/js/theme.js') }}"></script>
<div class="am-g tpl-g">
    <!-- 头部 -->
    <header>
        <!-- logo -->
        <div class="am-fl tpl-header-logo">
            <a href="javascript:;"><img src="{{ asset('/admin/assets/img/logo.png') }}" alt=""></a>
        </div>
        <!-- 右侧内容 -->
        <div class="tpl-header-fluid">
            <!-- 侧边切换 -->
            <div class="am-fl tpl-header-switch-button am-icon-list">
                    <span>

                </span>
            </div>
            <!-- 搜索 -->
            <div class="am-fl tpl-header-search">
                <form class="tpl-header-search-form" action="javascript:;">
                    <button class="tpl-header-search-btn am-icon-search"></button>
                    <input class="tpl-header-search-box" type="text" placeholder="搜索内容...">
                </form>
            </div>
            <!-- 其它功能-->
            <div class="am-fr tpl-header-navbar">
                <ul>
                    <!-- 欢迎语 -->
                    <li class="am-text-sm tpl-header-navbar-welcome">
                        <a href="javascript:;">欢迎你, <span>{{Session::get('users')->uname}}</span> </a>
                    </li>
                    <!-- 登录 -->
                    <li class="am-text-sm tpl-header-navbar-welcome">
                        <a href="/admin/user/editpwd">修改密码 </a>
                    </li>

                    <!-- 退出 -->
                    <li class="am-text-sm">
                        <a href="javascript:;">
                           <a href="/admin/login"> <span class="am-icon-sign-out"></span>退出</a>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </header>
    <!-- 风格切换 -->
    <div class="tpl-skiner">
        <div class="tpl-skiner-toggle am-icon-cog">
        </div>
        <div class="tpl-skiner-content">
            <div class="tpl-skiner-content-title">
                选择主题
            </div>
            <div class="tpl-skiner-content-bar">
                <span class="skiner-color skiner-white" data-color="theme-white"></span>
                <span class="skiner-color skiner-black" data-color="theme-black"></span>
            </div>
        </div>
    </div>
    <!-- 侧边导航栏 -->
    <div class="left-sidebar">
        <!-- 用户信息 -->
        <div class="tpl-sidebar-user-panel">
            <div class="tpl-user-panel-slide-toggleable">
                <div class="tpl-user-panel-profile-picture">
                    <img src="{{ Session::get('users')->uface }}"
                     alt="">
                </div>
                <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>&nbsp;&nbsp;&nbsp;{{Session::get('users')->uname}}
          </span>
                <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
            </div>
        </div>

        <!-- 菜单 -->
        <ul class="sidebar-nav">
            <li class="sidebar-nav-link">
                <a href="{{ url('admin/index') }}" class="active">
                    <i class="am-icon-home sidebar-nav-link-logo"></i> 首页
                </a>
            </li>

             <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-clone sidebar-nav-link-logo"></i> 用户管理
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <a href="{{ url('admin/user/add') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加用户
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="{{ url('admin/user/list') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 用户列表
                        </a>
                    </li>
                </ul>
            </li>


            <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 商品管理
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <a href="{{ url('admin/goods/add') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加商品
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="{{ url('admin/goods/index') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 商品列表
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 分类管理
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <a href="{{ url('admin/cate/add') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加分类
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="{{ url('admin/cate/index') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 分类列表
                        </a>
                    </li>
                </ul>
            </li>
			
			<li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 活动管理
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <a href="{{ url('/admin/active/add') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加活动
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="{{ url('/admin/active/index') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 活动列表
                        </a>
                    </li>
                </ul>
            </li>
			
            
            <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 订单管理
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">                   
                    <li class="sidebar-nav-link">
                        <a href="{{ asset('admin/order/index') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 订单列表
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-table sidebar-nav-link-logo"></i> 角色管理
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <a href="{{ url('/admin/role/create') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加角色
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="{{ url('/admin/role') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 角色列表
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-table sidebar-nav-link-logo"></i> 权限管理
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <a href="{{ url('/admin/permission/create') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加权限
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="{{ url('admin/permission') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 权限列表
                        </a>
                    </li>
                </ul>
            </li>


             <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-table sidebar-nav-link-logo"></i> 网站配置
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <a href="{{ url('admin/config/add') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加配置
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="{{ url('admin/config/index') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 配置列表
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-table sidebar-nav-link-logo"></i> 友情链接
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <a href="{{ url('admin/friend/add') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加友情链接
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="{{ url('admin/friend/list') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 配置友情链接
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-nav-link">
                <a href="javascript:;" class="sidebar-nav-sub-title">
                    <i class="am-icon-wpforms sidebar-nav-link-logo"></i> 轮播图管理
                    <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                </a>
                <ul class="sidebar-nav sidebar-nav-sub">
                    <li class="sidebar-nav-link">
                        <a href="{{ url('/admin/slidershow/add') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 添加轮播图
                        </a>
                    </li>

                    <li class="sidebar-nav-link">
                        <a href="{{ url('/admin/slidershow/list') }}">
                            <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 轮播图列表
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>

@yield('content')
