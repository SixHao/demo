@extends('layout/Alayout')

@section('title')
    <title>轮播图列表</title>
@endsection
@section('content')

<!-- 内容区域 -->
<div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">轮播图管理</div>
                    </div>
                    <div class="widget-body  am-fr">

                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a style="color: white" href="{{ url('/admin/slidershow/add') }}"> 添加图片</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @if(session('msg'))
                            <div style="color:red" class="alert alert-danger">{{session('msg')}}</div>
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
                        <form action="{{ asset('admin/slidershow/list') }}" method="get">
                        <div class="am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                <thead>

                                    <tr>
                                        <th>ID</th>
                                        <th>链接地址</th>
                                        <th>图片</th>
                                        <th>顺序</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(session('info'))
                                    <div class="alert alert-danger">{{session('info')}}</div>
                                @endif
                                @foreach($data as $key => $v)
                                    <tr class="gradeX">
                                        <td>{{ $v->bid }}</td>
                                        <td>{{ $v->url }}</td>
                                        <td><img  width="100px" height="80px"
                                        @if($v->src == '/updates/default.jpg')
                                        src="{{ asset('/uploads/default.jpg') }}"
                                        @else
                                        src="{{ $v->src }}"
                                        @endif
                                       ></td>
                                        <td>{{ $v->order }}</td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <a href="{{url('/admin/slidershow/edit')}}/{{$v->bid}}">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a>
                                                <a href="javascript:;" onclick="slidershowDel({{$v->bid}})" class="tpl-table-black-operation-del">
                                                    <i class="am-icon-trash"></i> 删除
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

                <style>
                    .am-u-lg-12 ul li span{
                        padding:6px 12px;
                    }
                    .am-u-lg-12 ul li{
                        display: inline;
                    }
                    
                </style>
               
                    </div>
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
        
    function slidershowDel(bid) {

        //询问框
        layer.confirm('您确认删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.post("{{url('admin/slidershow/delete')}}/"+bid,{"_method":"get"},function(data){
               
              // data是json格式的字符串，在js中如何将一个json字符串变成json对象
               if(data.error == 0){
                   layer.msg(data.msg, {icon: 6});
                   var t=setTimeout("location.href = location.href;",500);
               }else{
                   layer.msg(data.msg, {icon: 5});

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