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
		<div style="height: 100px; text-align: center; font-size: 18px;">
		您的购物车为空！！！ 先去逛一逛再来吧！！！
			<br>
			<a style="padding: 10px;display: block; width: 100px; margin:0 auto; margin-top:20px;background-color:#ee3495; color: #fff; border-radius: 5px;" href="{{ url('/home/index') }}">返回首页</a>
		</div>


				<div class="clear"></div>




				<div class="clear"></div>



				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<input class="check-all check" id="checkall" name="select-all" value="true" type="checkbox">
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span>全选</span>

					</div>

					<div class="operations">
						<a href="javascript:;" onclick="delete(123)" hidefocus="true" class="deleteAll">删除</a>
						<a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="AlltotalPrice"><label id="total"></label></em></strong>
						</div>
						<div class="btn-area">
							<a href="pay" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

				</div>

@stop