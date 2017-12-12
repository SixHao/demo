@extends('layout/Alayout')

@section('title')
    <title>后台首页</title>
@endsection
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="row-content am-cf">
                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">添加商品</div>
                                @if(session('msg'))
                            <li style="color:red">{{session('msg')}}</li>
                           @endif
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/goods/store') }}" id="goods_form" method="post" enctype="multipart/form-data">

              <div class="box-body">
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
                                        <label for="user-name" class="am-u-sm-3 am-form-label">父级分类</label>
                                        <div class="am-u-sm-9">
                               <select name="tid"  style="background-color:#4b5357">
                            <option value="0">==所有分类==</option>
                            @foreach($cates as $k=>$v)
                            @if($v->pid == '0' )
                            <option value="{{$v->tid}}" @if(old('tid') == $v->tid ) selected @endif >{{$v->tname}}</option>
                            @else
                            <option value="{{$v->tid}}" @if(old('tid') == $v->tid ) selected @endif >{{str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$v->lev)}}{{$v->tname}}</option>
                            @endif
                            @endforeach
                        </select>

                                        </div>
                                    </div>
                                        <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">商品名称 </label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="gname" placeholder="请输入商品名称"
                                            name="gname" value="{{ old('gname') }}" >
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">商品定价</label>
                                        <div class="am-u-sm-9">
                                            <input type="text" value="{{ old('gprice') }}" class="tpl-form-input" id="gprice" placeholder="请输入商品定价" name="gprice">
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">商品库存 </label>
                                        <div class="am-u-sm-9">
                                            <input type="text" value="{{ old('stock') }}" class="tpl-form-input" id="stock" placeholder="请输入商品库存" name="stock">
                                        </div>
                                    </div>
                                   <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label" >商品图片 </label>
                                        <div class="am-u-sm-9" " >

                                            <input type="text" value="{{ old('gpic') }}" size="50" id="goods_thumb" class="" name="gpic"> 
                                             
                                             <img src="" id="img1" name="img1">
                                             <input id="file_upload" type="file" class="" onclick="abc()" name="file_upload" multiple="true" >
                                            
                                        </div>

                                        <script type="text/javascript">
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
                                    var formData = new FormData($('#goods_form')[0]);
                                  
                                    $.ajax({
                                        type: "POST",
                                        url: "/admin/goods/upload",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
//                                            $('#img1').attr('src','/uploads/'+data);
//                                            $('#img1').attr('src','http://p09v2gc7p.bkt.clouddn.com/uploads/'+data);
                                            $('#img1').attr('src',data);
                                            $('#img1').attr('style','width:200px; height:200px;');
                                            // $('#img1').attr('src',data);
                                            // $('#img1').show();
                                            $('#goods_thumb').val(data);
                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                            alert("上传失败，请检查网络后重试");
                                        }
                                    });
                                }
                            </script>
                                    </div>
                                    
                                     
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">商品描述</label>
                                        <div class="am-u-sm-9">
                                            <textarea style="width:600px;height:100px;" class="tpl-form-input" id="gdesc" placeholder="请添加商品描述"
                                            name="gdesc">{{ old('gdesc') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">上架时间 </label>
                                        <div class="am-u-sm-9">
                                            <input type="text" value="{{ old('ctime') }}" class="am-form-field tpl-form-no-bg" placeholder="上架时间" data-am-datepicker="" readonly="" name="ctime" id="ctime">
                                            <small>上架时间为必填</small>
                                        </div>
                                    </div>

                                    


                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">商品状态 </label>
                                        <div class="am-u-sm-9" style="margin:8px auto;">
                                        
                                         <input type="radio" name="status" checked value="0" @if(old('status') == '0') checked @endif>新品
                                         <input type="radio" name="status" @if(old('status') == '1') checked @endif value="1">上架
                                         <input type="radio" name="status" @if(old('status') == '2')  checked @endif value="2">下架
                                        </div>
                                    </div>
                                <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" style="background-color:#595b5d;border-color:#8a8e90; " class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                            <button type="submit" style="background-color:#595b5d;border-color:#8a8e90; margin-left:100px;" class="am-btn am-btn-primary tpl-btn-bg-color-success ">返回</button>
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