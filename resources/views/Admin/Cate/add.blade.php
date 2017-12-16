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
                                <div class="widget-title am-fl">添加分类</div>
                                @if(session('msg'))
                            <li style="color:red">{{session('msg')}}</li>
                           @endif
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/cate/store') }}" method="post" enctype="multipart/form-data">

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
                               <select name="pid"  style="background-color:#4b5357">
                            <option value="0">==所有分类==</option>
                             @foreach($cates as $k=>$v)
                            @if($v->pid == '0')
                            <option value="{{ $v->tid }}">{{ $v->tname }}</option>
                            @else
                            <option value="{{ $v->tid }}">{{str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$v->lev)}}{{ $v->tname }}</option>
                            @endif
                            @endforeach
                        </select>

                                        </div>
                                    </div>
                                        <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">类别名称 </label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="tname" placeholder="请输入类别名称"
                                            name="tname">
                                        </div>
                                    </div>
                                    
                                    
                                    

                                    
                                <div class="am-form-group">
                                       <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" style="background-color:#595b5d;border-color:#8a8e90; " class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                            <a class="am-btn am-btn-primary tpl-btn-bg-color-success " href="{{url('/admin/cate/index')}} " style="background-color:#595b5d;border-color:#8a8e90; margin-left:100px;">返回</a>
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