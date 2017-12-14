@extends('layout/Alayout')

@section('title')
    <title>配置列表</title>
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
                                            <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a style="color: white" href="{{ url('/admin/config/add') }}">添加配置</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <form action="{{ url('admin/config/ContentChange') }}" method="post">
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r" style="colspan:0;">
                                        <thead>

                                        <tr>
                                            <th class="tc" width="5%">排序</th>
                                            <th class="tc" width="5%">ID</th>
                                            <th>标题</th>
                                            <th>名称</th>
                                            <th>内容</th>
                                            <th>说明</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(session('msg'))
                                            <li style="color:red">{{session('msg')}}</li>
                                        @endif
                                        {{csrf_field()}}
                                        @foreach($config as $key => $v)
                                            <tr>
                                                <td class="tc">
                                                    <input type="text" disabled style="width:60%;text-align:center;color:#000;" onchange="changeOrder(this,{{$v->wid}})" value="{{$v->worder}}">
                                                </td>
                                                <td class="tc">{{$v->wid}}</td>
                                                <td>
                                                    <a href="">{{$v->wtitle}}</a>
                                                </td>
                                                <td>{{$v->wname}}</td>
                                                <td style="color:#000;">
                                                    <input type="hidden" name="wid[]" value="{{$v->wid}}">
                                                    {!!$v->wcontent!!}

                                                </td>
                                                 <td style="color:#000;">
                                                    <textarea disabled> {{$v->wtips}}</textarea>
                                                </td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                <a href="{{url('/admin/config/edit')}}/{{$v->wid}}">
                                                    <i class="am-icon-pencil"></i> 修改
                                                </a>
                                                <a href="javascript:;" onclick="configDel({{$v->wid}})" class="tpl-table-black-operation-del">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>

                                                </td>

                                            </tr>
                                        @endforeach
                                        <tr style="border:0px;">
                                          <td colspan="7">

                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>

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

        function configDel(wid) {
            //询问框
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.ajax(
                    {
                        url:"{{ url('/admin/config/delete') }}/"+wid,
                        type:'post',
                        data:{"_token":"{{ csrf_token() }}"},
                        success:function(data){
                            if(data.error ==0)
                            {
                                layer.msg(data.msg, {icon: 6});
                                setTimeout("location.href = location.href;",2000);
                            } else {
                                layer.msg(data.msg, {icon: 5});
                                setTimeout("location.href = location.href;",2000);
                            }
                        },
                        dataType:'json'
                    }

                );


            });
        }



    </script>

    </body>

    </html>
@stop
