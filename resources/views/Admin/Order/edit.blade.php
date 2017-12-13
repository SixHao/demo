@extends('layout/Alayout')

@section('title')
    <title>修改订单</title>
@endsection
@section('content')
    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">

        <div class="row-content am-cf">
            <div class="row">

                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title am-fl">修改订单</div>

                        </div>
                        <div class="widget-body am-fr">
                            <div class="am-u-sm-12">
                                <div class="am-form-group">

                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a style="color: white" href="{{ url('/admin/order/index') }}">订单列表</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/order/update/'.$data->oid) }}" method="post" enctype="multipart/form-data">

                                <div class="box-body">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    {{ csrf_field() }}
{{--                                        {{method_field('put')}}--}}

                                <div class="am-form-group">

                                    <label for="user-name" class="am-u-sm-3 am-form-label">收货人: <span class="tpl-form-line-small-title">rec</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入收货人" name="rec"  value="{{$data->rec}}">
                                    </div>
                                </div>
                                        <div class="am-form-group">

                                            <label for="user-name" class="am-u-sm-3 am-form-label">收货人手机: <span class="tpl-form-line-small-title">tel</span></label>
                                            <div class="am-u-sm-9">
                                                <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入收货人电话" name="tel"  value="{{$data->tel}}">
                                            </div>
                                        </div>
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">收货人地址: <span class="tpl-form-line-small-title">addr</span></label>
                                    <div class="am-u-sm-9">
                                        <textarea type="text" class="tpl-form-input" id="user-name" placeholder="请输入收货人地址" name="addr">{{$data->addr}}</textarea>
                                    </div>
                                </div>



                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                    </div>
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
    <script src="{{ asset('/admin/assets/js/app.js') }}"></script>
    </body>

    </html>
@endsection
