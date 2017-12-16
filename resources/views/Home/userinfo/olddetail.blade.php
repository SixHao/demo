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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">历史订单</strong> / <small>olddetail</small></div>
						</div>
						<hr/>
						<!--进度条-->
						
						<div class="order-infomain">

							

							<div class="order-main">
								@foreach($order as $k=>$v)
								<div class="order-status3">
									<div class="order-title">
										<div class="dd-num">订单号：<a href="javascript:;">{{$v->oid}}</a></div>
										<span>成交时间：{{$v->otime}}</span>
										<!--    <em>店铺：小桔灯</em>-->
										
									</div>
									<div class="order-content">
										<div class="order-left">
											<ul class="item-list" style="line-height: 80px;">
												<li class="td td-item">
													<div class="item-pic">

														<a href="{{url('/home/details')}}/{{$v->gid}}" class="J_MakePoint">
															<img src="{{$v->gpic}}" class="itempic J_ItemImg">
														</a>
													</div>
													<div class="item-info" style="float: none;">
														<div class="item-basic-info">
															<a href="#">
																<p>商品名称:{{$v->gname}}</p>
																
															</a>
														</div>
													</div>
													
												</li>
												
												<li class="td td-price">
													<div class="item-price" style="width:102%;">
														单价：{{$v->bprice}}
													</div>
												</li>
												<li class="td td-number">
													<div class="item-number" style="width:150%;margin-left: 50px;">
														数量：<span>×</span>{{$v->bcnt}}
													</div>
												</li>
												
											</ul>
										</div>
										
										<div class="order-right" style="top:60%;">
											<li class="td td-amount">
												<div class="item-amount" style="margin-top: 4px;">
													合计：{{$v->ormb}}
													
												</div>
											</li>
											<div class="move-right">
												<li class="td td-status">
													<div class="item-status" style="margin-top:3px;width:105%;">
														

														<p class="Mystatus"> 已收货</p>
														
													</div>
												</li>
												
												
												
											</div>
										</div>
										
									</div>
							
								</div>
							@endforeach
								
							</div>
						</div>
					</div>

				</div>
@stop