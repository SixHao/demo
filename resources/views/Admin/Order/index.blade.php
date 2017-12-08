@extends('layout/Alayout')

@section('title')
    <title>订单列表</title>
@endsection

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
                                    <form method="get" action="">


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

                                    <tbody>

                                    <tr class="gradeX">
                                        <td class="ids">oid</td>
                                        <td class="">ormb</td>
                                        <td class="">ucnt</td>
                                        <td class="">rec</td>
                                        <td class="addr">addr</td>
                                        <td class="">tel</td>
                                        <td class="">msg</td>
                                        <td class="">otime</td>
                                        <td class="">ostatus</td>


                                    </tr>


                                    </tbody>
                                </table>
                            </div>
                            <div class="am-u-lg-12 am-cf">


                                    <div id="page_page" class="am-fr">

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
