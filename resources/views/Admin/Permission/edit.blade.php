@extends('layout/Alayout')

@section('title')
    <title>修改角色</title>
@endsection
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="row-content am-cf">
                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">角色修改</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                                @if(session('msg'))
                            <div style="color:red">{{session('msg')}}</div>
                           @endif
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/permission/'.$permissions->pid)}}" method="post" enctype="multipart/form-data">
                                    {{--{{ method_field() }}--}}
                                    <input type="hidden" name="_method" value="put">
                                    {{ csrf_field() }}
                                    {{--提交方式为put--}}
                                   
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">权限名称 <span class="tpl-form-line-small-title">name</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入权限名" name="pname" value="{{$permissions->pname}}">
                                        </div>
                                    </div>

                                        <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">权限描述 <span class="tpl-form-line-small-title">content</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入权限内容" name="pdesc"  value="{{ $permissions->pdesc }}">
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