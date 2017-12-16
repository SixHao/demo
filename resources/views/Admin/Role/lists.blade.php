@extends('layout/Alayout')

@section('title')
    <title>角色列表</title>
@endsection
@section('content')

<!-- 内容区域 -->
<div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">角色管理</div>
                    </div>
                    <div class="widget-body  am-fr">

                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a style="color: white" href="{{ url('/admin/role/create') }}"> 添加角色</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @if(session('msg'))
                            <div style="color:red" class="alert alert-danger">{{session('msg')}}</div>
                        @endif
                        <form action="{{ asset('admin/friend/list') }}" method="get">
                        <div class="am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>角色名称</th>
                                        <th>角色描述</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $key => $v)
                                    <tr class="gradeX">
                                        <td>{{ $v->rid }}</td>
                                        <td>{{ $v->rname }}</td>
                                        <td>{{ $v->rdesc }}</td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <a href="{{url('/admin/role/'.$v->rid.'/edit')}}">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a>
                                                <a href="javascript:;" onclick="urlDel({{$v->rid}})" class="tpl-table-black-operation-del">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                                <a href="{{url('/admin/role/auth')}}/{{ $v->rid }}">
                                                    <i class="am-icon-pencil"></i> 授权
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                 @endforeach
                                    <!-- more data -->
                                </tbody>
                            </table>
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
<script src="{{ asset('/admin/assets/js/app.js') }}">
</script><script src="{{ asset('/admin/assets/js/ch-ui.admin.js') }}">
</script><script src="{{ asset('/admin/assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
 <script>
        
    function urlDel(rid) {

        //询问框
        layer.confirm('您确认删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
            //admin/user/1
            $.post("{{url('/admin/role')}}/"+rid,{"_method":"delete","_token":"{{ csrf_token() }}"},function(data){
               
              // data是json格式的字符串，在js中如何将一个json字符串变成json对象
               if(data.error == 0){
                   layer.msg(data.msg, {icon: 1});
                   var t=setTimeout("location.href = location.href;",500);
               }else{
                   layer.msg(data.msg, {icon: 2});

                   var t=setTimeout("location.href = location.href;",500);
                   
               }


            });


        }, function(){

        });
    }
    




</script>

</body>

</html>
@stop