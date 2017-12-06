@extends('layout/Alayout')

@section('title')
    <title>用户列表</title>
@endsection
@section('content')

    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">配置列表</div>
                        </div>
                        <div class="widget-body  am-fr">

                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">

                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a style="color: white" href="{{ url('/admin/config/index') }}">配置列表</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul>

                            </ul>
                            <form action="{{ asset('admin/user/contentchange') }}" method="post">
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>

                                        <tr>
                                            <th class="tc" width="5%">排序</th>
                                            <th class="tc" width="5%">ID</th>
                                            <th>标题</th>
                                            <th>名称</th>
                                            <th>内容</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(session('msg'))
                                            <li style="color:red">{{session('msg')}}</li>
                                        @endif
                                        {{csrf_field()}}
                                        @foreach($config as $key => $v)
                                            <tr">
                                                <td class="tc">
                                                    <input type="text" style="width:60%;text-align:center;background-color: #4c4c4c" onchange="changeOrder(this,{{$v->wid}})" value="{{$v->worder}}">
                                                </td>
                                                <td class="tc">{{$v->wid}}</td>
                                                <td>
                                                    <a href="#">{{$v->wtitle}}</a>
                                                </td>
                                                <td>{{$v->wname}}</td>
                                                <td>
                                                    <input type="hidden" name="wid[]"  value="{{$v->wid}}">
                                                    {!! $v->wcontent !!}
                                                </td>
                                                <td>
                                                    {{--http://www.myblog.com/admin/config/9/edit--}}
                                                    <a href="{{url('admin/config/'.$v->wid.'/edit')}}">修改</a>
                                                    <a href="javascript:;" onclick="delLinks({{$v->wid}})">删除</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>
                                                <input type="submit" value="提交">

                                            </td>
                                        </tr>
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

        function userDel(id) {

            //询问框
            layer.confirm('您确认删除吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
                //admin/user/1
                $.post("{{url('admin/user')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                    //alert(data);
//                    data是json格式的字符串，在js中如何将一个json字符串变成json对象
                    //var res =  JSON.parse(data);
//                    删除成功
                    if(data.error == 0){
                        //console.log("错误号"+res.error);
                        //console.log("错误信息"+res.msg);
                        layer.msg(data.msg, {icon: 6});
//                       location.href = location.href;
                        var t=setTimeout("location.href = location.href;",2000);
                    }else{
                        layer.msg(data.msg, {icon: 5});

                        var t=setTimeout("location.href = location.href;",2000);
                        //location.href = location.href;
                    }


                });


            }, function(){

            });
        }





    </script>

    </body>

    </html>
@stop