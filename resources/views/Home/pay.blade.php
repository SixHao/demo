@extends('layout.Hlayout')

@section('title')
	<title>订单结算</title>
@endsection

@section('content')
<link href="{{asset('Home/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('Home/basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('Home/css/cartstyle.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('Home/css/jsstyle.css')}}" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{{asset('Home/js/address.js')}}"></script>
			<div class="concent">
				<!--地址 -->
				<form action="{{ asset('./home/pay/insert') }}" method="post"></form>
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						
						<div class="clear"></div>
						@foreach($address as $k=>$v)
						<ul>
							<div class="per-border"></div>
							
							<li class="user-addresslist defaultAddr">

								<div class="address-left">
									<div class="user DefaultAddr">

										<span class="buy-address-detail">   
                   <span class="buy-user">{{ $v['rec_name'] }}</span>
										<span class="buy-phone">{{ $v['rec_phone'] }}</span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								  			{{ $v['rec_address'] }}
										</span>

										</span>
									</div>
									<ins class="deftip">默认地址</ins>
								</div>
								<div class="address-right">
									<a href="{{asset('')}}Home/person/address.html">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn">
									<a href="#" class="hidden">设为默认</a>
									<span class="new-addr-bar hidden">|</span>
									<a href="{{ url('./home/userinfo/address') }}">添加</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);" onclick="delClick({{ $v['aid'] }});">删除</a>
								</div>

							</li>
							
							<div class="per-border"></div>
							
						</ul>
					@endforeach
						<div class="clear"></div>
					</div>
					<script src="{{ asset('/admin/assets/js/ch-ui.admin.js') }}">
					</script><script src="{{ asset('/admin/assets/js/jquery.js') }}"></script>
					<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
					 <script>
					        
					    function userDel(aid) {

					        //询问框
					        layer.confirm('您确认删除吗？', {
					            btn: ['确认','取消'] //按钮
					        }, function(){
					            $.post("{{url('home/pay/delete')}}/"+aid,{"_method":"get"},function(data){
					               
					              // data是json格式的字符串，在js中如何将一个json字符串变成json对象
					               if(data.error == 0){
					                   layer.msg(data.msg, {icon: 6});
					                   var t=setTimeout("location.href = location.href;",500);
					               }else{
					                   layer.msg(data.msg, {icon: 5});

					                   var t=setTimeout("location.href = location.href;",500);
					                   
					               }

					            });

					        }, function(){

					        });
					    }					   
					</script>
					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner">商品信息</div>
									</div>
									<div class="th th-price">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum">
										<div class="td-inner">金额</div>
									</div>
									
								</div>
							</div>
							<div class="clear"></div>
							@if(count(session('goods')['gid']) == 1)
							<tr class="item-list">
								<div class="bundle  bundle-last">

									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img style="width:80px" src="{{ session('goods')['gpic'] }}"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ session('goods')['gdesc'] }}</a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line">{{ session('goods')['gname'] }}</span>
														<span class="sku-line">包装：裸装</span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now">{{ session('goods')['gprice'] }}</em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															
															<input class="text_box" name="" type="text" value="{{ session('goods')['bcnt'] }}" style="width:30px;" />
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number"><?=session('goods')['gprice']*session('goods')['bcnt'] ?> </em>
												</div>
											</li>
											

										</ul>
										<div class="clear"></div>

									</div>
							</tr>
						@endif

							<div class="clear"></div>
							</div>
							</div>
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<label>买家留言：</label>
										<input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
									</div>
								</div>

							</div>
						
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em class="pay-sum"><?=session('goods')['gprice']*session('goods')['bcnt'] ?></em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee"><?=session('goods')['gprice']*session('goods')['bcnt'] ?></em>
											</span>
										</div>

										<div id="holyshit268" class="pay-address">
										@foreach($address as $k=>$v)
											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
								  				{{$v['rec_address']}}
												
												</span>
												</span>
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">   
                                         <span class="buy-user">{{$v['rec_name']}} </span>
												<span class="buy-phone">{{$v['rec_phone']}}</span>
												</span>
											</p>
										@endforeach
										</div>
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<a id="J_Go" href="{{asset('')}}Home/home/success.html" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
@stop()