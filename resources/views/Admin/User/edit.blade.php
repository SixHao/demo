@extends('layout/Alayout')

@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="row-content am-cf">
                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">用户修改</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                                @if(session('msg'))
                            <div style="color:red">{{session('msg')}}</div>
                           @endif
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/user/update/'.$data->uid)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{--提交方式为put--}}
                                   <input type="hidden" name="uid" value="{{ $data->uid }}">
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">用户名 <span class="tpl-form-line-small-title">uname</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入用户名" name="uname" value="{{$data->uname}}">
                                            <small>请填写用户名5-20字左右。</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">性别 <span class="tpl-form-line-small-title">sex</span></label>
                                        <div>
                                         <input type="radio" name="sex" value="m" @if($data->sex == 'm') checked @endif>男
                                         <input type="radio" name="sex" value="w" @if($data->sex == 'w') checked @endif>女
                                         <input type="radio" name="sex" value="x" @if($data->sex == 'x') checked @endif>保密
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-3 am-form-label">电话 <span class="tpl-form-line-small-title">telephone</span></label>
                                       <div class="am-u-sm-9">
                                            <input type="text" name="phone" class="tpl-form-input" id="user-name" placeholder="请输入您的电话" value="{{$data->phone}}">
                                            
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">邮箱 <span class="tpl-form-line-small-title">email</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="email" placeholder="请输入您的邮箱" value="{{$data->email}}">
                                        </div>
                                    </div><div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">地址 <span class="tpl-form-line-small-title">addr</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" placeholder="请输入您的地址" name="addr" value="{{$data->addr}}">
                                        </div>
                                    </div><div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">生日 <span class="tpl-form-line-small-title">birthday</span></label>
                                        <div class="am-u-sm-9">
                                            <input name="birthday" type="text" placeholder="请输入您的生日" value="{{date('Y-m-d',$data->birthday)}}" id="J-xl">
                                        </div>
                                    </div><div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">权限 <span class="tpl-form-line-small-title">auth</span></label>
                                        <div class="am-u-sm-9">
                                            <select data-am-selected="{searchBox: 1}" name="auth" style="display: none;">
                                              <option value="0" @if($data->auth == '0') selected @endif>超级管理员</option>
                                              <option value="1" @if($data->auth == '1') selected @endif>普通管理员</option>
                                              <option value="2" @if($data->auth == '2') selected @endif>普通用户</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">头像 <span class="tpl-form-line-small-title">Images</span></label>
                                        <div class="         am-u-sm-9">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                    <input type="hidden" name="uface" value="{{$data->uface}}" id="upload_file">
                                                    <img id="imghead" width="50px" src="{{$data->uface}}" \>
                                                </div>
                                                <input id="doc-form-file" type="file" multiple="true" name="uface1" onclick="userDel()">
                                                <script type="text/javascript">
                                function userDel() {
                                    $("#doc-form-file").change(function () {
                                        $('#imghead').show();
                                        uploadImage();
                                    });
                                };
                                function uploadImage() {
                                    // 判断是否有选择上传文件
                                    var imgPath = $("#doc-form-file").val();
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
                                    var formData = new FormData($('#art_form')[0]);
                                    formData.append('uface', $('#doc-form-file')[0].files[0]);
                                    formData.append('_token',"{{csrf_token()}}");
                                    $.ajax({
                                        type: "POST",
                                        url: "/admin/user/upload",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            // console.log(data);
                                           $('#imghead').attr('src',data);
                                            $('#upload_file').attr('value',data);
                                            $('#imghead').show();
                                            
                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                            alert("上传失败，请检查网络后重试");
                                        }
                                    });
                                }
                            </script>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </div>
<script src="{{ asset('/admin/assets/js/amazeui.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/amazeui.datatables.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/admin/assets/js/laydate.dev.js') }}"></script>
<script type="text/javascript">
  laydate({

            elem: '#J-xl'

        });
</script>

</body>

</html>
@endsection