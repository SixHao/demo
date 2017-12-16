@extends('layout/Userlayout')

@section('title')
    <title>个人中心</title>
@endsection
@section('content')
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">
					<div class="wrap-left">
						<div class="wrap-list">
							<div class="m-user">
								<!--个人信息 -->
								<div class="m-bg"></div>
								<div class="m-userinfo">
									<div class="m-baseinfo">
										<a href="information.html">
											<img src="{{session('husers')->pic}}">
										</a>
										<em class="s-name">{{session('husers')->nickname}}</em>
										
									</div>
									<div class="m-right">
										
										<div class="m-address">
											<a href="{{url('/home/userinfo/address')}}" class="i-trigger">我的收货地址</a>
										</div>
									</div>
								</div>

							
							</div>
							<div class="box-container-bottom"></div>

							<!--订单 -->
							<div class="m-order">
								<div class="s-bar">
									<i class="s-icon"></i>我的订单
									<a class="i-load-more-item-shadow" href="order.html">全部订单</a>
								</div>
								<ul>
									<li><a href="{{url('/home/userinfo/index')}}"><i><img src="../images/pay.png"/></i><span>待付款</span></a></li>
									<li><a href="{{url('/home/userinfo/mydetail')}}"><i><img src="../images/send.png"/></i><span>待发货<em class="m-num">{{$orders1}}</em></span></a></li>
									<li><a href="{{url('/home/userinfo/mydetail')}}"><i><img src="../images/receive.png"/></i><span>待收货<em class="m-num">{{$orders2}}</em></span></a></li>
									<li><a href="{{url('/home/userinfo/olddetail')}}"><i><img src="../images/comment.png"/></i><span>待评价<em class="m-num">{{$orders3}}</em></span></a></li>
								
								</ul>
							</div>
							<!--九宫格-->
							<div class="user-patternIcon">
								<div class="s-bar">
									<i class="s-icon"></i>我的常用
								</div>
								<ul>

									<a href="../../../resources/views/Home/shopcart.blade.php"><li class="am-u-sm-4"><i class="am-icon-shopping-basket am-icon-md"></i><img src="../images/iconbig.png"/><p>购物车</p></li></a>
									<a href="collection.html"><li class="am-u-sm-4"><i class="am-icon-heart am-icon-md"></i><img src="../images/iconsmall1.png"/><p>我的收藏</p></li></a>
									<a href="../home/home.html"><li class="am-u-sm-4"><i class="am-icon-gift am-icon-md"></i><img src="../images/iconsmall0.png"/><p>为你推荐</p></li></a>
									<a href="comment.html"><li class="am-u-sm-4"><i class="am-icon-pencil am-icon-md"></i><img src="../images/iconsmall3.png"/><p>好评宝贝</p></li></a>
									<a href="foot.html"><li class="am-u-sm-4"><i class="am-icon-clock-o am-icon-md"></i><img src="../images/iconsmall2.png"/><p>我的足迹</p></li></a>                                                                        
								</ul>
							</div>


							<!--收藏夹 -->
							<div class="you-like">
								<div class="s-bar">猜你喜欢
									<a class="i-load-more-item-shadow" href="#"><i class="am-icon-refresh am-icon-fw"></i>换一组</a>
								</div>
								<div class="s-content">
								@foreach($active as $m=>$n)
										@foreach($goods as $k=>$v)
											@if($n->gid == $v['gid'])
									<div class="s-item-wrap">
									
										<div class="s-item">
											
											<div class="s-pic">
												<a href="{{ url('/home/details') }}/{{ $v['gid'] }}" class="s-pic-link">
													<img style="width: 152px; height: 152px;" src="{{$v['gpic']}}" alt="包邮s925纯银项链女吊坠短款锁骨链颈链日韩猫咪银饰简约夏配饰" title="" class="s-pic-img s-guess-item-img">
												</a>
											</div>
											<div class="s-price-box">
											
												<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">{{$n->aprice}}</em></span>

												<span class="s-history-price"><em class="s-price-sign">¥</em><em class="s-value">{{$v['gprice']}}</em></span>
												
											</div>
											
										</div>
												
									</div>
											@endif
										@endforeach
									@endforeach
							</div>

							</div>

						</div>
					</div>
					<div class="wrap-right">

						<!-- 日历-->
						<div class="day-list">
							<div class="s-bar">
								<a class="i-history-trigger s-icon" href="#"></a>我的日历
								<a class="i-setting-trigger s-icon" href="#"></a>
							</div>
							<div class="s-care s-care-noweather">
								<div class="s-date">
									<em><p style="font-family:courier;font-size: 54px;margin-right: 16%;margin-bottom: 52%;">{{date('d',time())}}</p></em>
									<span style="height:50px;">{{date('l',time())}}<br>{{date('Y-m-d',time())}}<br><p style="font-family:courier;font-size: 54px;margin-right: -215%;margin-bottom: 10px;">11</p><br></span>

									
									<span><p id="clock"><span id="oTime">{{ date('H:i:s',time())  }}</span></p></span>
									<script type="text/javascript">
										// 时钟clock
								setInterval("oTime()",1000);
								function oTime() {
								   today = new Date();
								   var hou = today.getHours();
								   var min=today.getMinutes(); //分
								   var sec =today.getSeconds(); //秒
								   if(sec<10)
								      var sec ="0"+sec;
								   if(min<10)
								      var min= "0"+min;
								   if(hou<10)
								      var hou = "0"+hou;
								   clock.innerHTML = '<span id="oTime">'+hou+':'+min+':'+sec+'</span>';
								}

										</script>
								</div>
							</div>
						</div>
						<!--新品 -->
						<div class="new-goods" style="height: 470px; overflow:hidden;">
							<div class="s-bar">
								<i class="s-icon"></i>今日活动
								
							</div>
							@foreach($active as $k=>$v)
							<div class="new-goods-info">

								
								<a class="shop-info" href="{{ url('home/details/') }}/{{ $v->gid }}" target="_blank">
									
									<div class="face-img-panel">
										<img src="{{$v->apic}}" alt="">
									</div>
									<!-- <span class="shop-title">{{$v->aname}}</span> -->
									<span class="shop-title">活动价:￥{{$v->aprice}}</span>
								</a>
								
							</div>
							@endforeach
						</div>

						
					</div>
				</div>
@stop