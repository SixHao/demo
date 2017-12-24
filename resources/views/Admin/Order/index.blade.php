@extends('layout/Alayout')
@section('title')
    <title>订单列表</title>
@endsection
@section('content')

    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">订单列表</div>
                        </div>
                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">

                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a style="color: white" href="{{ url('/admin/order/index') }}">订单列表</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @if(session('msg'))
                                <div style="color:red" class="alert alert-danger">{{session('msg')}}</div>
                            @endif
                            <form action="{{ url('/admin/order/index') }}" method="get">
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                        <input type="text" class="am-form-field " placeholder="请输入订单号" value="{{ $request->oid }}" name="oid">
                                        <span class="am-input-group-btn">
                                        <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"></button>
                                      </span>
                                    </div>
                                </div>
                            </form>
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                        <tr>
                                            <th>订单号</th>
                                            <th>订单总额</th>
                                            <th>总数量</th>
                                            <th>收货人</th>
                                            <th>收货人手机</th>
                                            <th>收货地址</th>
                                            <th>买家留言</th>
                                            <th>下单时间</th>
                                            <th>发货状态</th>
                                            <th>操作</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $key => $v)
                                            <tr class="gradeX">
                                                <td class="ids first">{{$v->oid}}</td>
                                                <td style="width: 68px;">{{$v->ormb}}</td>
                                                <td style="width: 54px;">{{$v->ucnt}}</td>
                                                <td class="">{{$v->rec}}</td>
                                                <td class="">{{$v->tel}}</td>
                                                <td style="width: 100px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;" class="addr">{{$v->addr}}</td>
                                                <td class="">{{$v->msg}}</td>
                                                <td class="">{{$v->otime}}</td>
                                                <td class="over">
                                                    @if($v->ostatus == 1)
                                                        <button type="button" id="over">已下单,未发货</button>
                                                    @elseif($v->ostatus == 2)
                                                        <button type="button" id="over">已发货,未收货</button>
                                                    @else
                                                        <button type="button" id="over" disabled>已收货</button>
                                                    @endif


                                                </td>

                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                        <a style="color: #f35842; border-color:#f35842; " href="{{url('/admin/order/list')}}/{{$v->oid}}">
                                                            <i class="am-icon-pencil"></i> 查看
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- more data -->
                                        </tbody>
                                    </table>
                                </div>


                        </div>
                    <div class="am-u-lg-12 am-cf">
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
    <script src="{{ asset('/admin/assets/js/amazeui.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/amazeui.datatables.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('/admin/assets/js/app.js') }}">
    </script><script src="{{ asset('/admin/assets/js/ch-ui.admin.js') }}">
    </script><script src="{{ asset('/admin/assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
    <script>
        $('.over').on('click',function () {
            // alert(111);
            var t = $(this);
            var oid = $(this).parent().find('.first').html();
            $.ajax(
                {
                    url:"{{ url('/admin/order/ajax') }}",
                    type:'post',
                    data:{oid:oid,'_token':"{{ csrf_token() }}"},
                    success:function (data) {
                        if(data.ostatus == 2)
                        {
                            t.html('<button id="over">已发货,未收货</button>');
                            setTimeout("location.href = location.href;",2000);
                            setTimeout("layer.msg('修改中...');",1);
                            setTimeout("layer.alert('修改完成')",1000);
                        } else {
                            t.html('<button id="over">已收货</button>');
                            setTimeout("location.href = location.href;",2000);
                            setTimeout("layer.msg('修改中...');",1);
                            setTimeout("layer.alert('修改完成')",1000);
                        }
                    },
                    dataType:'json'
                }
            );
        });
        </script>

        </body>

    </html>
@stop