@extends('layout/Alayout')

@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="row-content am-cf">
                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">链接修改</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                                @if(session('msg'))
                            <div style="color:red">{{session('msg')}}</div>
                           @endif
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/friend/update/'.$data->fid)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{--提交方式为put--}}
                                   
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">链接名称 <span class="tpl-form-line-small-title">fname</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入链接名" name="fname" value="{{$data->fname}}">
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">链接地址 <span class="tpl-form-line-small-title">furl</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入链接地址" name="furl"  value="{{ $data->furl }}">
                                        </div>
                                    </div>
                                        <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">链接内容 <span class="tpl-form-line-small-title">content</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入链接内容" name="fcontent"  value="{{ $data->fcontent }}">
                                        </div>
                                    </div>
                                   
                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">链接logo <span class="tpl-form-line-small-title">logo</span></label>
                                        <div class="am-u-sm-9">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                <input type="hidden" name="flogo" value="{{$data->flogo}}"" id="upload_file">
                                                    <img id="imghead" width="50px" src="{{$data->flogo}}" \>
                                                </div>
                                                <input id="doc-form-file" type="file" multiple="true" name="flogo1" onclick="abc()">
                                                <script type="text/javascript">
                                function abc() {
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
                                    formData.append('flogo', $('#doc-form-file')[0].files[0]);
                                    formData.append('_token',"{{csrf_token()}}");
                                    $.ajax({
                                        type: "POST",
                                        url: "/admin/friend/upload",
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



</body>

</html>
@endsection