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
						<div class="clear"></div>
						<a class="new-abtn-type" data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0}">添加新地址</a>
						<!--例子-->
						<div class="am-modal am-modal-no-btn" id="doc-modal-1">

							<div class="add-dress">

								<!--标题 -->
								<div class="am-cf am-padding">
									<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add&nbsp;address</small></div>
								</div>
								<hr/>

								<div class="am-u-md-12 am-u-lg-8" style="margin-top: 20px;">
									<form class="am-form am-form-horizontal" action="{{ url('/home/userinfo/doaddress')}}" method="post">


									 @if (count($errors) > 0)
					                <div class="alert alert-danger">
					                  <ul>
					                      @foreach($errors->all() as $error)
					                        <li>{{ $error }}</li>
					                      @endforeach
					                  </ul>
					                </div>
					              @endif
					              {{ csrf_field() }}
														
										<div class="am-form-group">
											<label for="user-name" class="am-form-label">收货人</label>
											<div class="am-form-content">
												<input type="text" id="user-name" placeholder="收货人" name="rec_name">
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-phone" class="am-form-label">手机号码</label>
											<div class="am-form-content">
												<input id="user-phone" placeholder="手机号必填" type="text" name="rec_phone">
											</div>
										</div>
										<div class="am-form-group">
											<label for="user-address" class="am-form-label">所在地</label>
											<div class="am-form-content address">
											
											<select id="s_province" name="s_province"></select>  

    										<select id="s_city" name="s_city" ></select>  
										<select id="s_county" name="s_county" style="    margin-left: 1%;margin-top: -15px;"></select>
												
												
											</div>
										</div>

										<div class="am-form-group">
											<label for="user-intro" class="am-form-label">详细地址</label>
											<div class="am-form-content">
												<textarea class="" rows="3" id="rec_address" placeholder="输入详细地址" name="rec_address"></textarea>
												<small>100字以内写出你的详细地址...</small>
											</div>
										</div>

										<div class="am-form-group">
											<div class="am-u-sm-9 am-u-sm-push-3">
												<button class="am-btn am-btn-danger" >保存</button>
												<a href="javascript: void(0)" class="am-close am-btn am-btn-danger" data-am-modal-close>取消</a>
											</div>
										</div>
									</form>
								</div>

							</div>

						</div>

					</div>
					<script type="text/javascript">_init_area();</script>

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