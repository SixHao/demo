@extends('layout/Alayout')

@section('title')
    <title>活动列表</title>
@endsection
@section('content')

    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">活动列表@if(session('info'))
                                    <div class="alert alert-danger">{{session('info')}}</div>
                                @endif</div>


                        </div>
                        <div class="widget-body  am-fr">


                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a href="{{ url('/admin/active/add') }}" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                    <tr>
                                        <th>活动ID</th>
                                        <th>活动名称</th>
                                        <th>活动类型</th>
                                        <th>商品名称</th>
                                        <th>折扣</th>
                                        <th>活动状态</th>
                                        <th>结束标识</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $k => $v)
                                    <tr class="gradeX">
                                        <td class="first">{{ $v->aid }}</td>
                                        <td>{{ $v->aname }}</td>
                                        <td>
                                            @if($v->atype == 1)
                                                秒杀
                                            @elseif($v->atype == 2)
                                                特惠
                                            @elseif($v->atype == 3)
                                                团购
                                            @else
                                                超值
                                            @endif
                                        </td>
                                        <td>{{ $v->gname }}</td>
                                        <td>{{ $v->discount }}折优惠</td>
                                        <td>
                                            @if($v->astatus == 1)
                                                开始
                                            @elseif($v->astatus == 0)
                                                结束
                                            @endif
                                        </td>
                                        <td class="over">
                                            @if($v->is_over == 0)
                                            <button id="over">开始</button>
                                            @else
                                            <button id="over">结束</button>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <a href="javascript:;" onclick="del({{ $v->aid }})" class="tpl-table-black-operation-del">
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
                            <div class="am-u-lg-12 am-cf">
                                {{--分页--}}
                                {{ $data->links() }}
                                <style>
                                    .am-u-lg-12 ul{
                                        float: right;
                                    }
                                    .am-u-lg-12 ul li a{
                                        color: #fff;
                                    }
                                    .am-u-lg-12 ul li{
                                        display: inline-block;
                                        padding:6px 12px;
                                        background-color: #666;
                                        color: #fff;
                                    }

                                </style>

                            </div>
                            <style>
                                #over {

                                    display: inline-block;
                                    outline: none;
                                    cursor: pointer;
                                    text-align: center;
                                    text-decoration: none;
                                    font: bold 12px  Arial, Helvetica, sans-serif;
                                    padding: .6em 2em .65em;
                                    text-shadow: 0 1px 1px rgba(0, 0, 0, .3);
                                    -webkit-border-radius: .3em;
                                    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
                                    background:-webkit-gradient(linear, 0 0, 0 bottom, from(red), to(rgba(255, 255, 0, 1)));
                                }
                                #over:hover {
                                    text-decoration: none;
                                }
                                #over:active {
                                    position: relative;
                                    top: 1px;
                                }
                            </style>

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
    <script>
        $('.over').on('click',function () {
            var t = $(this);
            var aid = $(this).parent().find('.first').html();
            $.ajax(
                {
                    url:"{{ url('/admin/active/edit') }}",
                    type:'post',
                    data:{aid:aid,'_token':"{{ csrf_token() }}"},
                    success:function (data) {
                        if(data.is_over == 0)
                        {
                            t.html('<button id="over">开始</button>');
                            setTimeout("location.href = location.href;",2000);
                            setTimeout("layer.msg('修改中...');",1);
                            setTimeout("layer.alert('修改完成')",1000);
                        } else{
                            t.html('<button id="over">结束</button>');
                            setTimeout("location.href = location.href;",2000);
                            setTimeout("layer.msg('修改中...');",1);
                            setTimeout("layer.alert('修改完成')",1000);
                        }
                    },
                    dataType:'json'
                }
            );
        });

        function del(aid) {
            //询问框
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.ajax(
                    {
                        url:"{{ url('/admin/active/delete') }}/"+aid,
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