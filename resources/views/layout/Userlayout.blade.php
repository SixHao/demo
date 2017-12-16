
<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		@yield('title')
		<link href="{{ asset('/home/AmazeUI-2.4.2/assets/css/admin.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('/home/AmazeUI-2.4.2/assets/css/amazeui.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('/home/css/personal.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('/home/css/systyle.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('/home/css/infstyle.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('/home/css/stepstyle.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('/home/css/addstyle.css') }}" rel="stylesheet" type="text/css">
		<script src="{{ asset('/home/AmazeUI-2.4.2/assets/js/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('/home/AmazeUI-2.4.2/assets/js/amazeui.js') }}" type="text/javascript"></script>
		<link href="{{ asset('/home/css/orstyle.css') }}" rel="stylesheet" type="text/css">

	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
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
							<div class="topMessage home">
								<div class="menu-hd"><a href="{{ url('/home/index') }}" target="_top" class="h">商城首页</a></div>
							</div>
							<div class="topMessage my-shangcheng">
								<div class="menu-hd MyShangcheng"><a href="{{ url('/home/userinfo/index') }}" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
							</div>
							<div class="topMessage mini-cart">
								<div class="menu-hd"><a id="mc-menu-hd" href="{{ url('/home/shopcart') }}" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
							</div>

						</ul>
						</div>

						<!--悬浮搜索框-->

						<div class="nav white">
							<div class="logoBig">
								<li><img src="../images/logobig.png" /></li>
							</div>

							<div class="search-bar pr">
								<a name="index_none_header_sysc" href="#"></a>
								<form action="{{ url('/home/goods') }}" method="post">
									{{ csrf_field() }}
									<input id="searchInput" name="search" type="text" placeholder="搜索" autocomplete="off">
									<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
								</form>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
			</article>
		</header>
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>

						</div>
			</div>

			@yield('content')

<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有</em>
						</p>
					</div>
				</div>

			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="{{ url('/home/userinfo/index') }}">个人中心</a>
					</li>
					<li class="person">
						<ul>
							<li> <a href="{{ url('/home/userinfo/personal') }}">个人信息</a></li>
							<li> <a href="{{ url('home/userinfo/safety') }}">安全设置</a></li>
							<li> <a href="{{ url('home/userinfo/addresslist') }}">收货地址</a></li>
							<li> <a href="{{ url('home/userinfo/address') }}">新增地址</a></li>
						</ul>
					</li>
					<li class="person">
						<ul>
							<li><a href="{{ url('home/userinfo/mydetail') }}">订单管理</a></li>
							<li><a href="{{ url('home/userinfo/olddetail') }}">历史订单</a></li>
						</ul>
					</li>

				</ul>

			</aside>
		</div>
		<!--引导 -->
		<div class="navCir">
			<li><a href="../home/home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="../home/sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li><a href="../../../resources/views/Home/shopcart.blade.php"><i class="am-icon-shopping-basket"></i>购物车</a></li>
			<li class="active"><a href="index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
	</body>

</html>