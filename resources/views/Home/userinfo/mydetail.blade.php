@extends('layout/Userlayout')

@section('title')
    <title>订单管理</title>
@endsection
@section('content')
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-orderinfo">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单详情</strong> / <small>Order&nbsp;details</small></div>
						</div>
						<hr/>
						<!--进度条-->
						
						<div class="order-infomain">

							<div class="order-top">
								<div class="th th-item">
									<td class="td-inner">商品</td>
								</div>
								<div class="th th-price">
									<td class="td-inner">单价</td>
								</div>
								<div class="th th-number">
									<td class="td-inner">数量</td>
								</div>
								
								<div class="th th-amount">
									<td class="td-inner">合计</td>
								</div>
								<div class="th th-status">
									<td class="td-inner">交易状态</td>
								</div>
								<div class="th th-change">
									<td class="td-inner">交易操作</td>
								</div>
							</div>
							@if(!empty($order))
							@foreach($order as $k=>$v)
							<div class="order-main">
								
								<div class="order-status3">
									<div class="order-title">
										<div class="dd-num">订单号：{{ $v->oid }}<a href="javascript:;"></a></div>
										<span>成交时间：{{ date('Y-m-d H:i:s',$v->otime) }}</span>
										<!--    <em>店铺：小桔灯</em>-->
								
									
									</div>
									
									<div class="order-content">
	
										<div class="order-left">
											<ul class="item-list">
												<li class="td td-item">
													<div class="item-pic">

														<a href="{{url('/home/details')}}/{{ $v->gid }}" class="J_MakePoint">
															<img src="{{ $v->gpic }}" class="itempic J_ItemImg">
														</a>
													</div>
													<div class="item-info" style="float: none;">
														<div class="item-basic-info">
															<a href="#">
																<p>描述:{{ $v->gdesc }}</p>
																
															</a>
														</div>
													</div>
													
												</li>
													
												
												<li class="td td-price">
													<div class="item-price">
														{{ $v->gprice }}
													</div>
												</li>
												<li class="td td-number">
													<div class="item-number">
														<span>×</span>{{ $v->ucnt }}
													</div>
												</li>
												
											</ul>
										</div>
												
										<div class="order-right" style="right:125px;top:38%;">
											<li class="td td-amount">
												<div class="item-amount" style="margin-top: 4px;">
													{{ $v->ormb }}
													
												</div>
											</li>
											<div class="move-right">
												<li class="td td-status">
													<div class="item-status" style="margin-top:3px;width:105%;">
														
														@if( $v->ostatus == 1 )
														已下单，未发货
														@elseif( $v->ostatus == 2 )
														已发货，未收货
														@else
														已收货
														@endif
														<p class="Mystatus">
														
														</p>
														
													</div>
												</li>
												@if( $v->ostatus == 3 )
												<li class="td td-change">
													<a href="{{ url('/home/userinfo/editdetail') }}?oid={{ $v->oid }}">
														<div class="am-btn am-btn-danger anniu" style="margin-left:30px;">确认收货</div>
													</a>
												</li>
												@endif
											</div>
										</div>
										
									</div>
									
								</div>
								
								
							</div>
							@endforeach
							@endif
						</div>
					</div>

				</div>
@stop