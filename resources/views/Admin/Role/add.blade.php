@extends('layout/Alayout')

@section('title')
    <title>角色添加</title>
@endsection
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="row-content am-cf">
                <div class="row">

                                        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">角色添加</div>
                                
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/role') }}" method="post" enctype="multipart/form-data">

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
                                        <label for="user-name" class="am-u-sm-3 am-form-label">角色名 <span class="tpl-form-line-small-title">rname</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入角色名称"
                                            name="rname" value="{{ old('rname') }}">
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">角色描述 <span class="tpl-form-line-small-title">rdesc</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入描述内容" name="rdesc"  value="{{ old('rdesc') }}">
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