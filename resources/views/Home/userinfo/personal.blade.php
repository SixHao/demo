@extends('layout/Userlayout')

@section('title')
    <title>个人中心</title>
@endsection
@section('content')
<script type="text/javascript" src="{{ url('/home/AmazeUI-2.4.2/assets/js/jquery.js') }}"></script>
			<b class="line"></b>

		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>


						<form class="am-form am-form-horizontal" id="goods_form" method="post" action="{{url('/home/userinfo/editperson')}}">

						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic">
								<input type="file" id="file_upload" class="inputPic" name="file_upload" onclick="abc()" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<img name="img1" id="img1" class="am-circle am-img-thumbnail" src="{{ $husers['pic'] }}" alt="" />
							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i>{{$husers['username']}}</i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s><a class="classes" href="#">铜牌会员</a>
						            </span>
								</div>
								<div class="u-safety">
									<a href="safety.html">
									 账户安全
									<span class="u-profile"><i class="bc_ee0000" style="width: 60px;" width="0">60分</i></span>
									</a>
								</div>
							</div>
						</div>

						<!--个人信息 -->
						<div class="info-main">

							
							{{ csrf_field() }}

								<input type="hidden" class="first" name="id" value="{{$husers['id']}}">

								<div class="am-form-group">
									<label for="user-name2" class="am-form-label">昵称</label>
									<div class="am-form-content ">
										<input type="text" id="user-name2" name="nickname" placeholder="nickname" value="{{$husers['nickname']}}">

									</div>
								</div>

								<div class="am-form-group">
									<label for="user-name" class="am-form-label">姓名</label>
									<div class="am-form-content ">
										<input type="text" disabled id="user-name2" name="username" placeholder="name" value="{{$husers['username']}}">

									</div>
								</div>

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									<div class="am-form-content sex">
										
										<label class="am-radio-inline">
											 
											<input type="radio" name="sex" value="m" class="sex"  data-am-ucheck @if($husers['sex'] == 'm') checked
                                         @endif>男
										</label>
											
											
										<label class="am-radio-inline">
											<input type="radio" class="sex"  name="sex" value="w"  data-am-ucheck @if($husers['sex'] == 'w') checked  @endif> 女
										</label>
										
											
										<label class="am-radio-inline">
											<input type="radio" name="sex" class="sex"   value="x" data-am-ucheck @if($husers['sex'] == 'x') checked  @endif>  保密
										</label>
										
									</div>
								</div>
								
								<div class="am-form-group">
									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<div class="birth-select">
											<select class="sel_year"  name="year"  rel="{{ date('Y',$husers['birthday']) }}"></select>
											<em>年</em>
										</div>
										<div class="birth-select2">
											<select  class="sel_month" name="month" rel="{{ date('m',$husers['birthday']) }}"></select>
											<em>月</em></div>
										<div class="birth-select2 ">
											<select class="sel_day" rel="{{ date('d',$husers['birthday']) }}" name="day">
												
											</select>
											<em>日</em></div>
									</div>
							
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone" name="phone" placeholder="telephonenumber" type="tel" value="{{$husers['phone']}}">

									</div>
								</div>
								
								<div class="am-form-group address">
									<label for="user-address" class="am-form-label">收货地址</label>
									<div class="am-form-content address">
										<a href="address.html">
											<p class="new-mu_l2cw">
												<span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区
												<span class="street">雄楚大道666号(中南财经政法大学)</span>
												<span class="am-icon-angle-right"></span>
											</p>
										</a>

									</div>
								</div>
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="safety.html">

											<span class="am-icon-angle-right"></span>

										</a>

									</div>
								</div>
								<div class="info-btn">
									<button class="am-btn am-btn-danger">保存修改</button>
								</div>


							</form>
						</div>

					</div>
			
				</div>
				<script>


				// 上传图片
				function abc() {
                                    $("#file_upload").change(function () {
                                        $('img1').show();
                                        uploadImage();
                                    });
                                };
                                function uploadImage() {
                                    // 判断是否有选择上传文件
                                    var imgPath = $("#file_upload").val();
                                    if (imgPath == "") {
                                        alert("请选择上传图片！");
                                        return;
                                    }
                                    //判断上传文件的后缀名
                                    var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                    if (strExtension != 'jpg' && strExtension != 'gif'
                                        && strExtension != 'png' && strExtension != 'bmp') {
                                        alert("请选择图片文件");
                                        return;
                                    }
                                    var formData = new FormData();
                                    formData.append('file_upload', $('#file_upload')[0].files[0]);
                                    formData.append('id',$('.first').val());
                                    formData.append('_token',"{{ csrf_token() }}");
                                    $.ajax({
                                        type: "POST",
                                        url: "/home/userinfo/upload",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
//                                            $('#img1').attr('src','/uploads/'+data);
//                                            $('#img1').attr('src','http://p09v2gc7p.bkt.clouddn.com/uploads/'+data);
                                            $('#img1').attr('src',data);
                                            // $('#img1').attr('src',data);
                                            // $('#img1').show();
                                            
                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                            alert("上传失败，请检查网络后重试");
                                        }
                                    });
                                };

</script> 

<script type="text/javascript" src="{{ url('/home/js/birthday.js') }}"></script>
<script type="text/javascript">
	$(function () {
		$.ms_DatePicker({
	            YearSelector: ".sel_year",
	            MonthSelector: ".sel_month",
	            DaySelector: ".sel_day"
	    });
		$.ms_DatePicker();
	}); 
</script>
@stop