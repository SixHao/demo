@extends('layout/Hlayout')

@section('title')
	<title>网站首页</title>
@endsection
<link href="{{asset('Home/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('Home/basic/css/demo.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('Home/css/cartstyle.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('Home/css/optstyle.css')}}" rel="stylesheet" type="text/css" />
{{--<script src="{{asset('Admin/assets/js/jquery.js')}}"></script>--}}
<script type="text/javascript" src="{{asset('Home/js/jquery.js')}}"></script>
<script src="{{asset('Admin/assets/js/ch-ui.admin.js')}}"></script>
<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
@section('content')

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
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
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>

				<?php $sum=0;?>
					<?php $j=0;?>
				@foreach($cart as $k=>$v)
                        <?php $j+=$v->cnt;?>

				@foreach($goods as $m=>$n)





						@if($v->gid == $n->gid)
                          <?php $sum+=$n->gprice*$v->cnt?>
				{{--@foreach(session() as $v->$v)--}}
					<tr class="item-list">
						<div class="bundle  bundle-last ">

							<div class="bundle-hd">
								<div class="bd-promos">
									<div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥20.00</span>&nbsp;&nbsp;</div>
									<div class="act-promo">
										<a href="#" target="_blank">第二支半价，第三支免费<span class="gt">&gt;&gt;</span></a>
									</div>
									<span class="list-change theme-login">编辑</span>
								</div>
							</div>

							<div class="bundle-main">

							<ul id="tab" class="item-content clearfix">
									<li class="td td-chk">

									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="{{ url('/home/details') }}/{{ $n->gid }}" target="_blank" data-title="" class="J_MakePoint" data-point="tbcart.8.12">
												<img style="width: 80px" src="{{ $n->gpic }}" class="itempic J_ItemImg"></a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="{{ $n->gname }}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ $n->gname }}</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											<span >"{{$n->gdesc}}"</span>


											<i class="theme-login am-icon-sort-desc"></i>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="price-original">{{$n->gprice+20}}</em>
												</div>
												<div class="price-line">
													<em class="J_Price price-now" tabindex="1">{{$n->gprice}}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<em class="J_Price price-now" tabindex="1">{{$v->cnt}}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum">
										<div class="td-inner">
											<em tabindex="1" class="J_ItemSum number" ng-bind="item.price*item.quantity">{{$v['cnt']*$n->gprice}}</em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<a href="javascript:;" onclick="del({{$v['cid']}})" hidefocus="true" data-point-url="" class="delete">删除</a>
										</div>
									</li>
								</ul>

								{{--@endforeach--}}

								@endif
								@endforeach
								@endforeach


				<div class="clear"></div>
				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">


					</div>


					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount"></em><span class="txt"><?php echo $j?>件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="AlltotalPrice"><label id="total" ng-bind="totalPrice()"><?php echo$sum;?></label></em></strong>
						</div>

						<div class="btn-area">
							<a href="pay" method="post" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

				</div>
								<script>


                                    function del(cid){
                                        //询问框
//						alert(cid);
                                        layer.confirm('您确认删除吗？', {
                                            btn: ['确认','取消'] //按钮
                                        }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
                                            //admin/user/1

                                            $.ajax(
                                                {
                                                    url:"{{ url('/home/cart/delete') }}/"+cid,
                                                    type:'get',
                                                    data:{'cid':'cid','_token':"{{ csrf_token() }}"},
                                                    success:function(data){
                                                        if(data.error == 0){
                                                            layer.msg(data.msg, {icon: 6});
                                                            var t=setTimeout("location.href = location.href;",2000);
                                                        }else{
                                                            layer.msg(data.msg, {icon: 5});
                                                            var t=setTimeout("location.href = location.href;",2000);
                                                        }
                                                    },
                                                    dataType:'json'
                                                }
                                            );

                                        }, function(){

                                        });
                                    }


								</script>
								<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
@stop
