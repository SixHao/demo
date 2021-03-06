<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    @yield('title')

    <link href="{{ asset('/Home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/Home/AmazeUI-2.4.2/assets/css/admin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/Home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/Home/css/hmstyle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/Home/css/skin.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('/Home/AmazeUI-2.4.2/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/Home/AmazeUI-2.4.2/assets/js/amazeui.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="{{ asset('/Home/basic/js/jquery.min.js') }} "><\/script>');
    </script>
    <script type="text/javascript " src="{{ asset('/Home/basic/js/quick_links.js') }} "></script>
</head>

<body>
<div class="hmtop">
    <!--顶部导航条 -->
    <div class="am-container header">
        <ul class="message-l">
            <div class="topMessage">
                <div class="menu-hd">
                    @if(empty(session('husers')))
                    <a href="{{ url('/home/login/login') }}" target="_top" class="h">亲，请登录</a>
                    <a href="{{ url('/home/zhuce/zhuce') }}" target="_top">免费注册</a>
                        @else
                        <span>你好，{{ session('husers')->username }}</span>
                        <a style="padding-left: 10px;" href="{{ url('/home/outlogin') }}" target="_top">退出</a>
                    @endif
                </div>
            </div>
        </ul>
        <ul class="message-r">
            <div class="topMessage Home">
                <div class="menu-hd"><a href="{{ url('/home/index') }}" target="_top" class="h">商城首页</a></div>
            </div>
            <div class="topMessage my-shangcheng">
                <div class="menu-hd MyShangcheng"><a href="{{ url('/home/userinfo/index') }}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
            </div>
            <div class="topMessage mini-cart">
                <div class="menu-hd"><a id="mc-menu-hd" href="{{ url('/home/cart') }}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
            </div>

        </ul>
    </div>

    <!--悬浮搜索框-->

    <div class="nav white">
        <div class="logo"><img src="{{ asset('/Home/images/logo.png') }}" /></div>
        <div class="logoBig" style="margin-left: -50px;">
            <li><a href="{{ url('/') }}"><img src="{{ asset('/Home/images/logobig.png') }}" /></a></li>
        </div>

        <div class="search-bar pr">
            <a name="index_none_header_sysc" href="#"></a>
            <form action="{{ url('/home/goods') }}" method="post">
                {{ csrf_field() }}
                <input id="searchInput" name="search" type="text" value="" placeholder="搜索" autocomplete="off">
                <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
            </form>
        </div>
    </div>

    <div class="clear"></div>
</div>

{{--上截取到导航--}}

@yield('content')

{{--下截取侧边栏以及底部--}}

<div class="footer ">
    <div class="footer-hd ">
        <p>
            @foreach($friend as $k=>$v)
                <a href="{{ $v->furl }}">{{ $v->fname }}
                    <img style="width: 50px; height: 25px;" title="{{ $v->fcontent }}" src="{{ $v->flogo }}" alt="">
                    <b>|</b>
                </a>
            @endforeach
        </p>
    </div>
    <div class="footer-bd ">
        <p>
            <a href="# ">关于恒望</a>
            <a href="# ">合作伙伴</a>
            <a href="# ">联系我们</a>
            <a href="# ">网站地图</a>
            <em>© 2015-2025 Hengwang.com 版权所有</em>
        </p>
    </div>
</div>

</div>
</div>
<!--引导 -->
<div class="navCir">
    <li class="active"><a href="Home.html"><i class="am-icon-Home "></i>首页</a></li>
    <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
    <li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>
    <li><a href="../person/index.html"><i class="am-icon-user"></i>我的</a></li>
</div>


<!--菜单 -->
<div class=tip>
    <div id="sidebar">
        <div id="wrap">
            <div id="prof" class="item ">
                <a href="{{ url('home/userinfo/personal') }} ">
                    <span class="setting "></span>
                </a>
                @if(empty(session('husers')))
                <div class="ibar_login_box status_login ">
                    <div class="avatar_box ">
                        <p class="avatar_imgbox " style="margin-top: 30px;margin-left: 20px;"><img src="{{ asset('/Home/images/no-img_mid_.jpg') }} " /></p>
                    </div>
                    <i class="icon_arrow_white "></i>
                </div>
                @else
                <div class="ibar_login_box status_login ">
                    <div class="avatar_box ">
                        <p class="avatar_imgbox "><img src="{{ session('husers')->pic }}" /></p>
                        <ul class="user_info ">
                            <li>{{ session('husers')->nickname }}</li>
                        </ul>
                    </div>
                    <div class="login_btnbox ">
                        <a href="{{ url('home/userinfo/mydetail') }} " class="login_order ">我的订单</a>
                        <a href="{{ url('home/userinfo/safety') }} " class="login_favorite ">安全中心</a>
                    </div>15901139697
                    <i class="icon_arrow_white "></i>
                </div>
                @endif
            </div>
            <div id="shopCart " class="item ">
                <a href="{{ url('/home/cart') }} ">
                    <span class="message "></span>
                </a>
                <p>
                    购物车
                </p>
                <p class="cart_num ">0</p>
            </div>
            <div id="asset " class="item ">
                <a href="# ">
                    <span class="view "></span>
                </a>
                <div class="mp_tooltip ">
                    我的资产
                    <i class="icon_arrow_right_black "></i>
                </div>
            </div>

            <div id="foot " class="item ">
                <a href="# ">
                    <span class="zuji "></span>
                </a>
                <div class="mp_tooltip ">
                    我的足迹
                    <i class="icon_arrow_right_black "></i>
                </div>
            </div>

            <div id="brand " class="item ">
                <a href="#">
                    <span class="wdsc "><img src="{{ asset('/Home/images/wdsc.png') }} " /></span>
                </a>
                <div class="mp_tooltip ">
                    我的收藏
                    <i class="icon_arrow_right_black "></i>
                </div>
            </div>

            <div id="broadcast " class="item ">
                <a href="# ">
                    <span class="chongzhi "><img src="{{ asset('/Home/images/chongzhi.png') }} " /></span>
                </a>
                <div class="mp_tooltip ">
                    我要充值
                    <i class="icon_arrow_right_black "></i>
                </div>
            </div>

            <div class="quick_toggle ">
                <li class="qtitem ">
                    <a href="# "><span class="kfzx "></span></a>
                    <div class="mp_tooltip ">客服中心<i class="icon_arrow_right_black "></i></div>
                </li>
                <!--二维码 -->
                <li class="qtitem ">
                    <a href="#none "><span class="mpbtn_qrcode "></span></a>
                    <div class="mp_qrcode " style="display:none; "><img src="{{ asset('/Home/images/weixin_code_145.png') }} " /><i class="icon_arrow_white "></i></div>
                </li>
                <li class="qtitem ">
                    <a href="#top " class="return_top "><span class="top "></span></a>
                </li>
            </div>

            <!--回到顶部 -->
            <div id="quick_links_pop " class="quick_links_pop hide "></div>

        </div>

    </div>
    <div id="prof-content " class="nav-content ">
        <div class="nav-con-close ">
            <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
            我
        </div>
    </div>
    <div id="shopCart-content " class="nav-content ">
        <div class="nav-con-close ">
            <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
            购物车
        </div>
    </div>
    <div id="asset-content " class="nav-content ">
        <div class="nav-con-close ">
            <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
            资产
        </div>

        <div class="ia-head-list ">
            <a href="# " target="_blank " class="pl ">
                <div class="num ">0</div>
                <div class="text ">优惠券</div>
            </a>
            <a href="# " target="_blank " class="pl ">
                <div class="num ">0</div>
                <div class="text ">红包</div>
            </a>
            <a href="# " target="_blank " class="pl money ">
                <div class="num ">￥0</div>
                <div class="text ">余额</div>
            </a>
        </div>

    </div>
    <div id="foot-content " class="nav-content ">
        <div class="nav-con-close ">
            <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
            足迹
        </div>
    </div>
    <div id="brand-content " class="nav-content ">
        <div class="nav-con-close ">
            <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
            收藏
        </div>
    </div>
    <div id="broadcast-content " class="nav-content ">
        <div class="nav-con-close ">
            <i class="am-icon-angle-right am-icon-fw "></i>
        </div>
        <div>
            充值
        </div>
    </div>
</div>

</body>

</html>