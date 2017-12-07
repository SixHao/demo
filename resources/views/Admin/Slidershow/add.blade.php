@extends('layout/Alayout')

@section('title')
    <title>添加图片</title>
@endsection
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="row-content am-cf">
                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">添加图片</div>
                                
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/slidershow/doadd') }}" method="post" enctype="multipart/form-data">

              <div class="box-body">
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                  <ul>
                      @foreach($errors->all() as $error)
                        <li style="color: red;text-align: center;">{{ $error }}</li>
                      @endforeach
                  </ul>
                </div>
              @endif
              {{ csrf_field() }}

                  <div class="am-form-group">
                      <label class="am-u-sm-3 am-form-label">图片链接地址 <span class="tpl-form-line-small-title">url</span></label>
                      <div class="am-u-sm-9">
                          <input type="text" placeholder="请输入您想链接的地址" name="url" value="">
                      </div>
                  </div>
                  <div class="am-form-group">
                      <label class="am-u-sm-3 am-form-label">图片顺序 <span class="tpl-form-line-small-title">order</span></label>
                      <div class="am-u-sm-9">
                          <input type="text" placeholder="请输入您想放置图片的顺序" name="order" value="">
                      </div>
                  </div>

                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">添加轮播图 <span class="tpl-form-line-small-title">Images</span></label>
                                        <div class="am-u-sm-9">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                <input type="hidden" name="src" value="/uploads/default.jpg" id="upload_file">
                                                    <img id="imghead" width="700px" height="500px" src="{{asset('/uploads/default.jpg')}}" \>
                                                </div>
                                                <input id="doc-form-file" onclick="abc()" type="file" multiple="true" name="src1">
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
//                                    console.log(imgPath);
                                    if (imgPath == "") {
                                        alert("请选择上传图片！");
                                        return;
                                    }
                                    //判断上传文件的后缀名
                                    var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                    if (strExtension != 'jpg' && strExtension != 'gif'
                                        && strExtension != 'png' && strExtension != 'bmp' && strExtension != 'jpeg') {
                                        alert("请选择图片文件");
                                        return;
                                    }
                                    var formData = new FormData($('#art_form')[0]);
                                    formData.append('src', $('#doc-form-file')[0].files[0]);
                                    formData.append('_token',"{{csrf_token()}}");
                                    $.ajax({
                                        type: "POST",
                                        url: "/admin/slidershow/upload",
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