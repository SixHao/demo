@extends('layout/Hlayout')

@section('title')
	<title>网站首页</title>
@endsection
<link href="{{asset('Home/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('Home/basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('Home/css/cartstyle.css')}}" rel="stylesheet" type="text/css" />

<link href="{{asset('Home/css/jsstyle.css')}}" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="{{asset('Home/js/address.js')}}"></script>
@section('content')

			<div class="concent">
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
							<a href="{{ url('home/userinfo/address') }}"><div class="tc-btn createAddr  am-btn am-btn-danger">使用新地址</div></a>
						</div>
						<div class="clear"></div>


						<ul>
							<div class="per-border"></div>
							@if(!empty($address))
							<li class="user-addresslist defaultAddr">

								<div class="address-left">
									<div class="user DefaultAddr">


										<span class="buy-address-detail">
                   <span class="buy-user">{{ $address->rec_name }}</span>
										<span class="buy-phone">{{ $address->rec_phone }}</span>

										<span class="buy-address-detail">   
                   <span class="buy-user"></span>
										<span class="buy-phone"></span>

										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">

								  			{{ $address->rec_address }}

										</span>

										</span>
									</div>
									<ins style="background-color:#ee3495;" class="deftip">默认地址</ins>
								</div>
								<div class="address-right">
									<a href="Home/person/address.html">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>


							</li>
							@endif

							<div class="per-border"></div>


							
							<div class="per-border"></div>

						</ul>


						<div class="clear"></div>
					</div>

		<form method="post" action="{{url('/home/pay/insert')}}">
		{{ csrf_field() }}
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



                            <?php $sum=0;?>
                            <?php $j=0;?>
							@foreach ($goods as $k=>$v)

							<?php $sum+=$v->gprice*$v->cnt?>


							<tr class="item-list">
								<tr class="bundle  bundle-last">

									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<input type="hidden" name="gid[]" value="{{ $v->gid }}">
															<img style="width:80px" src="{{ $v->gpic }}"></a>
													</div>


													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ $v->gdesc }}</a>

														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">

														<span class="sku-line">{{ $v->gname }}</span>


														<span class="sku-line">包装：裸装</span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">

															<em class="J_Price price-now">{{ $v->gprice }}</em>
															<input type="hidden" name="gprice[]" value="{{ $v->gprice }}">
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">


															<em tabindex="0" class="J_ItemSum number">{{ $v->cnt }}</em><?php $j+=$v->cnt; ?>
															<input type="hidden" name="bcnt[]" value="{{ $v->cnt }}">
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">

													<em tabindex="0" class="J_ItemSum number">{{ $v->gprice*$v->cnt }}</em>
												</div>
											</li>


										</ul>
									</div>

								</tr>
								</tr>
							@endforeach
							<div class="clear"></div>
						</div>



							</tr>
					
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
										<input type="text" name="msg" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error" value="msg">最多输入500个字符</p>
										</div>
									</div>
								</div>

							</div>

							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em class="pay-sum"><?php echo$sum;?></em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div  style="width:300px;" class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee"><?php echo$sum;?></em>
												<input type="hidden" name="ormb" value="<?php echo$sum;?>">
												<input type="hidden" name="ucnt" value="<?php echo$j;?>">
											</span>
										</div>


										<div id="holyshit268" class="pay-address">

											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
								   				<span class="province">{{ $address['rec_address'] }}</span>
													<input type="hidden" name="addr" value="{{ $address['rec_address'] }}">
												</span>
												</span>
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">
                                         <span class="buy-user">{{ $address['rec_name'] }} </span>
													<input type="hidden" name="rec" value="{{ $address['rec_name'] }}">
												<span class="buy-phone">{{ substr_replace($address['rec_phone'], '****',3,4) }}</span>
													<input type="hidden" name="tel" value="{{ $address['rec_phone'] }}">
													<input type="hidden" name="uid" value="{{ session('husers')->id }}">
												</span>
											</p>
										</div>
									</div>
									@if (count($errors) > 0)
										<div style="padding-right: 50px; padding-top: 30px; float: right;" class="alert alert-danger">
											<ul>
												@foreach($errors->all() as $error)
													<li style="color: red;">{{ $error }}</li>
												@endforeach
											</ul>
										</div>
									@endif
									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<button style="float: right;" id="J_Go" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</button>
										</div>
									</div>

									<div class="clear"></div>
								</div>
							</div>
						</div>

		</form>
						<div class="clear"></div>
					</div>
				</div>
@stop