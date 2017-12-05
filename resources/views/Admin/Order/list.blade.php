@extends('layout/Alayout')

@section('content')

    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">订单列表</div>


                        </div>
                        <div class="widget-body  am-fr">

                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                <div class="am-form-group tpl-table-list-select">
                                    <form method="get" action="{{url('/admin/order/list')}}">
                                    <select data-am-selected="{btnSize: 'sm'}" style="display: none;">
                                        <option value="o" @if(!empty($request['count']) && $request['count'] == 0) selected @endif>所有订单</option>
                                        <option value="1" @if(!empty($request['count']) && $request['count'] == 1) selected @endif>未发货</option>
                                        <option value="2" @if(!empty($request['count']) && $request['count'] == 2) selected @endif>已发货</option>


                                    </select>

                                </div>
                            </div>
                            <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">

                                    <input type="text" class="am-form-field "  placeholder="订单号">
                                    <span class="am-input-group-btn" >
                                    <input class="am-btn  am-btn-default am-btn-success  tpl-table-list-field am-icon-search" type="submit" value="搜索">
                                    </span>
                                </div>
                            </div>
                            </form>
                            <div class="am-u-sm-12">
                                <table class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                    <tr>
                                        <th>订单号</th>
                                        <th>订单总额</th>
                                        <th>商品总数量</th>
                                        <th>收货人</th>
                                        <th>收货地址</th>
                                        <th>收货人手机</th>
                                        <th>买家留言</th>
                                        <th>下单时间</th>
                                        <th>发货状态</th>
                                    </tr>
                                    </thead>
                                    @if(session('info'))
                                        <div class="alert alert-danger">{{session('info')}}</div>
                                    @endif
                                    <tbody>
                                    @foreach($data as $k=>$v)
                                    <tr class="gradeX">
                                        <td class="ids">{{$v->oid}}</td>
                                        <td class="">{{$v->ormb}}</td>
                                        <td class="">{{$v->ucnt}}</td>
                                        <td class="">{{$v->rec}}</td>
                                        <td class="addr">{{$v->addr}}</td>
                                        <td class="">{{$v->tel}}</td>
                                        <td class="">{{$v->msg}}</td>
                                        <td class="">{{$v->otime}}</td>
                                        <td class="statusBtn">
                                            @if($v->ostatus == 1)
                                                <button type="button" class="btn bg-purple margin">未发货</button>

                                            @else
                                                <button type="button" class="btn bg-olive btn-flat margin">已发货</button>

                                            @endif
                                        </td>


                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="am-u-lg-12 am-cf">


                                    <div id="page_page" class="am-fr">
                                        {!! $data->appends($request)->render()!!}
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
<script src="{{ asset('/admin/assets/js/app.js') }}"></script>



@stop
@section('js')
    <script>

        $(".statusBtn").on('click', function () {
            var t = $(this);
            var oid = $(this).parent().find('.ids').html();
//            alert(id);
            // 书写 ajax
            $.ajax(
                {
                    url:"{{ url('/admin/user/ajaxstatus') }}",
                    type:'post',
                    data:{oid:oid},
                    success:function (data) {
                        if(data.ostatus == 0)
                        {
                            t.html('<button type="button" class="btn bg-purple margin">禁用</button>');
                        }else {
                            t.html('<button type="button" class="btn bg-olive btn-flat margin">启用</button>');
                        }
                    },
                    error:function () {

                    },
                    dataType:'json'
                }
            );
        });


        //        修改用户名。
        $(".addr").on('dblclick', fn1);

        function fn1() {
            var t = $(this);
            var id = t.parent().find('.ids').html();
            var addr = t.html();
            var inp = $('<input type="text">');
            inp.val(addr);
            t.html(inp);
            inp.select();

            inp.on('blur', function () {
                var newaddr = $(this).val();
                $.ajax({
                    url:"{{ url('/admin/order/ajaxaddr') }}",
                    type:'post',
                    data:{oid:oid, addr:newaddr},
                    beforeSend:function()
                    {
                        $("#info").html('<span class="text-red"><i class="fa fa-fw fa-spin fa-circle-o-notch"></i>正在修改中...</span>');
                        $("#info").show();
                    },
                    success:function (data) {
                        if(data.code == 0)
                        {
                            t.html(addr);
                            $("#info").html('<span class="text-red">地址已经存在</span>');
                            $("#info").show();
                            $("#info").fadeOut(1000);
                        }else if(data.code == 1)
                        {

                            t.html(newaddr);
                            $("#info").html('<span class="text-red">修改地址成功</span>');
                            $("#info").show();
                            $("#info").fadeOut(1000);
                        }else {
                            t.html(addr);
                            $("#info").html('<span class="text-red">修改地址失败</span>');
                            $("#info").show();
                            $("#info").fadeOut(1000);
                        }
                    },
                    error:function () {

                    },
                    dataType:'json'
                });
//               添加事件。
                t.on('dblclick', fn1);
            });


            t.unbind('dblclick');


        }


    </script>
@stop