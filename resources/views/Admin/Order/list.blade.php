@extends('layout/Alayout')
@section('title')
    <title>订单详情</title>
@endsection
@section('content')

    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">订单详情</div>
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

                                        <th>商品名称</th>
                                        <th>商品图片</th>
                                        <th>商品单价</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $key => $v)
                                        <tr class="gradeX">

                                            <td class="">{{$v->gname}}</td>
                                            <td class=""><img style="width: 50px; height: 50px;" src="{{ $v->gpic }}" alt=""></td>
                                            <td class="">{{$v->gprice}}</td>

                                        </tr>
                                    @endforeach
                                    <!-- more data -->
                                    </tbody>
                                </table>
                            </div>
                        </form>
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



    </body>

    </html>
@stop