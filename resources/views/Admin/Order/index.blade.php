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
                            <form action="" method="">
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                        <tr>

                                            <th>
                                                每页条数：
                                                <select name="num"  style="background: #5EB95E">
                                                    <option value="5"
                                                            @if($request['num'] == 5)  selected  @endif
                                                    >5
                                                    </option>
                                                    <option value="10"
                                                            @if($request['num'] == 10)  selected  @endif
                                                    >10
                                                    </option>
                                                </select>
                                            </th>
                                            <th>订单号:</th>
                                            <td><input style="color: #4B5357" type="text" name="oid" value="{{$request->oid}}" placeholder="订单号"></td>
                                            <td><input type="submit" style="background: #5EB95E" value="查询"></td>
                                        </tr>
                                        <tr>
                                            <th>订单号</th>
                                            <th>订单总额</th>
                                            <th>商品总数量</th>
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
                                        @if(session('info'))
                                            <div class="alert alert-danger">{{session('info')}}</div>
                                        @endif
                                        @foreach($data as $key => $v)
                                            <tr class="gradeX">
                                                <td class="ids first">{{$v->oid}}</td>
                                                <td class="">{{$v->ormb}}</td>
                                                <td class="">{{$v->ucnt}}</td>
                                                <td class="">{{$v->rec}}</td>
                                                <td class="">{{$v->tel}}</td>
                                                <td class="addr">{{$v->addr}}</td>
                                                <td class="">{{$v->msg}}</td>
                                                <td class="">{{$v->otime}}</td>
                                                <td class="over">
                                                    @if($v->ostatus == 1)
                                                        <button type="button" id="over">已下单,未发货</button>
                                                    @elseif($v->ostatus == 2)
                                                        <button type="button" id="over">已发货,未收货</button>
                                                    @else
                                                        <button type="button" id="over">已收货</button>
                                                    @endif


                                                </td>

                                                <td>
                                                    <div class="tpl-tabl1e-black-operation">
                                                        <a href="{{url('/admin/order/edit')}}/{{$v->oid}}">
                                                            <i class="am-icon-pencil"></i> 修改
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
                            <div class="am-u-lg-12 am-cf">
                                <?php
                                    $v = empty($input) ? '' : $input;
                                ?>
                                {{--分页--}}
                                {!! $data->appends($request->all())->render() !!}
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