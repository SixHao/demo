@extends('layout/Userlayout')

@section('title')
    <title>个人中心</title>
@endsection
@section('content')
		   <script class="resources library" src="{{url('/home/js/area.js')}}" type="text/javascript"></script>

		<b class="line"></b>

		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-address">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">地址管理</strong> / <small>Address&nbsp;list</small></div>
						</div>
						<hr/>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
						<span style="display: block;padding: 10px;">默认地址</span>
						@if(!empty($default_addr))
						<li class="user-addresslist defaultAddr">
								<button class="new-option-r"><i class="am-icon-check-circle"></i>默认地址</button>
								<p class="new-tit new-p-re">
								<input type="hidden" name="aid" value="">
									<span class="new-txt">{{$default_addr['rec_name']}}</span>
									
									<span class="new-txt-rd2">{{ substr_replace($default_addr['rec_phone'], '****',3,4)}}</span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="province">{{ $default_addr['rec_address'] }}</span>
										</p>
								</div>
								<div class="new-addr-btn">
									
									
								</div>
							</li>
							@endif
						</ul>
						<ul class="am-avg-sm-1 am-avg-md-3 am-thumbnails">
						<span style="display: block;padding: 10px;">所有地址</span>
							@if(!empty($addr))
							@foreach($addr as $k=>$v)
							<form action="{{url('/home/userinfo/doadd')}}" method="post">
							{{ csrf_field() }}
							<li class="user-addresslist defaultAddr">
								<button style="background-color: #ccc;" id="new-option-r" class="new-option-r"><i class="am-icon-check-circle"></i>设为默认</button>
								<style>
									#new-option-r:active{
										background-color: #ee3495;
									}
								</style>
								<p class="new-tit new-p-re">
								<input type="hidden" name="aid" value="{{ $v['aid'] }}">
									<span class="new-txt">{{$v['rec_name']}}</span>
									<input type="hidden" name="rec_phone" value="{{ $v['rec_phone'] }}">
									<span class="new-txt-rd2">{{substr_replace($v['rec_phone'], '****',3,4)}}</span>
								</p>
								<div class="new-mu_l2a new-p-re">
									<p class="new-mu_l2cw">
										<span class="title">地址：</span>
										<span class="province">{{ $v['rec_address'] }}</span>
										</p>
								</div>
								<div class="new-addr-btn">
									@if($v['is_checked'] == 1) 
									 <a href="javascript:;" ><i class="am-icon-trash"></i>删除</a>
									@else
									<a href="javascript:;"  onclick="del({{ $v['aid'] }})""><i class="am-icon-trash"></i>删除</a>
									@endif
								</div>
							</li>
							</form>
						@endforeach
						
						@endif
							</ul>
						
						<div class="clear"></div>
						
					

					</div>
					

					<script type="text/javascript">
						$(document).ready(function() {							
							$(".new-option-r").click(function() {
								$(this).parent('.user-addresslist').addClass("defaultAddr").siblings().removeClass("defaultAddr");
							});
							
							var $ww = $(window).width();
							if($ww>640) {
								$("#doc-modal-1").removeClass("am-modal am-modal-no-btn")
							}
							
						})
					</script>

					<div class="clear"></div>
					<script type="text/javascript">

					var Gid  = document.getElementById ;

					var showArea = function(){

					Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" + 	

						Gid('s_city').value + " - 县/区" + 

					Gid('s_county').value + "</h3>"
					Gid('s_county').setAttribute('onchange','showArea()');}

				</script>

				<script type="text/javascript">
				function del(aid)
       		 {
	             // alert(111);
	            layer.confirm('您确定要删除吗？', {
	              btn: ['确定','取消'] //按钮
	            }, function(){

                $.ajax(
                {
                    url:"{{ url('/home/userinfo/deleteaddr') }}/"+aid,
                    type:'post',
                    data:{'_token':"{{ csrf_token() }}"},
                    success:function(data)
                    {
                        if(data.error == 0)
                        {
                           layer.msg(data.msg, {icon: 0});
                            setTimeout("location.href = location.href;",2000);
                          setTimeout("layer.msg('删除中...');",1);
                            setTimeout("layer.alert('删除成功')",1000);

                       } else
                       {
                           layer.msg(data.msg, {icon: 1});
                            setTimeout("location.href = location.href;",2000);
                           setTimeout("layer.msg('删除中...');",1);
                            setTimeout("layer.alert('删除失败')",1000);
                       }
                    },
                    dataType:'json',
                }
            );

            });

        }
        </script>
				</div>
	<script src="{{ asset('/admin/assets/js/jquery.js') }}"></script>		
 <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>

			

@stop