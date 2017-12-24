@extends('layout/Hlayout')

@section('title')
	<title>商品列表</title>
@endsection
@section('content')
	<link href="{{ url('/home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ url('/home/css/seastyle.css') }}" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="{{ url('/home/basic/js/jquery-1.7.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('/home/js/script.js') }}"></script>
			<b class="line"></b>
           <div class="search">
			<div class="search-list">
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
			
				
					<div class="am-g am-g-fixed">
						<div class="am-u-sm-12 am-u-md-12">

							<div style="padding-top: 15px;" class="search-content">
								<div class="sort">
									<li class="first"><a title="综合">综合排序</a></li>
									<li><a title="销量">销量排序</a></li>
									<li><a title="价格">价格优先</a></li>
								</div>
								<div class="clear"></div>

								<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes" style="height: 950px; margin-bottom: 50px; overflow: hidden;">
									@foreach($goods as $k=>$v)
										@foreach($v as $k2=>$v2)
											@if($v2->status !=2)
									<li>
										<div class="i-pic limit">
											<a href="{{ url('/home/details') }}/{{ $v2['gid'] }}"><img style="width: 218px; height: 218px;" src="{{ $v2->gpic }}" /></a>
											<p class="title fl">{{ $v2->gname }}</p>
											<p class="price fl">
												<b>¥</b>
												<strong>{{ $v2->gprice }}</strong>
											</p>
											<p class="number fl">
												销量<span>{{ $v2->salecnt }}</span>
											</p>
										</div>
									</li>
											@endif
										@endforeach
									@endforeach
								</ul>
							</div>
							<div class="search-side" style="padding-top:15px;height: 1015px; overflow: hidden;" >

								<div class="side-title">
									热卖商品
								</div>

								@foreach($goods as $k=>$v)
									@foreach($v as $k2=>$v2)
										@if($v2->status !=3)

								<li>
									<div class="i-pic check">
										<a href="{{ url('/home/details') }}/{{ $v2->gid }}">
												<img style="width: 218px; height: 218px;" src="{{ $v2->gpic }}" />
											<p class="check-title">{{ $v2->gname }}</p>
											<p class="price fl">
												<b>¥</b>
												<strong>{{ $v2->gprice }}</strong>
											</p>
											<p class="number fl">
												销量<span>{{ $v2->salecnt }}</span>
											</p>
										</a>
									</div>
								</li>
										@endif
									@endforeach
								@endforeach
							</div>
							<div class="clear"></div>

								{{--{!! $goods->render() !!}--}}

						</div>
					</div>
@stop