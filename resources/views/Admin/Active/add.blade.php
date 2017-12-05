@extends('layout/Alayout')

@section('title')
    <title>添加活动</title>
@endsection
@section('content')

    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">

        <div class="container-fluid am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                    <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 表单
                        <small>
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li style="color: red;">{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(session('info'))
                                    <div class="alert alert-danger">{{session('info')}}</div>
                            @endif
                        </small></div>
                </div>

                <div class="am-u-lg-3 tpl-index-settings-button">
                    <button type="button" class="page-header-button"><span class="am-icon-paint-brush"></span> 设置</button>
                </div>
            </div>

        </div>

        <div class="row-content am-cf">

            <div class="row">

                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title am-fl">添加活动</div>
                            <div class="widget-function am-fr">
                                <a href="javascript:;" class="am-icon-cog"></a>
                            </div>
                        </div>
                        <div class="widget-body am-fr">

                            <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/active/create') }}" method="post">
                            {{ csrf_field() }}
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">活动编码 <span class="tpl-form-line-small-title">Code</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" name="aname" id="user-name" placeholder="请输入标题文字">
                                        <small>请填写活动标题文字。</small>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">活动类别 <span class="tpl-form-line-small-title">Type</span></label>
                                    <div class="am-u-sm-9">
                                        <select data-am-selected="{searchBox: 1}" name="atype" style="display: none;">
                                            <option value="1">秒杀</option>
                                            <option value="2">特惠</option>
                                            <option value="3">团购</option>
                                            <option value="4">超值</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-phone" class="am-u-sm-3 am-form-label">商品名称 <span class="tpl-form-line-small-title">Type</span></label>
                                    <div class="am-u-sm-9">
                                        <select data-am-selected="{searchBox: 1}" name="gid" style="display: none;">
                                            <option value="1">家具</option>
                                            <option value="2">电器</option>
                                            <option value="3">食品</option>
                                            <option value="4">移动设备</option>
                                        </select>

                                    </div>
                                </div>


                                <div class="am-form-group">
                                    <label for="user-weibo" class="am-u-sm-3 am-form-label">折扣 <span class="tpl-form-line-small-title">Discount</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="discount" id="user-weibo" placeholder="请写入1-10之间的数字">
                                        <div>

                                        </div>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-weibo" class="am-u-sm-3 am-form-label">状态 <span class="tpl-form-line-small-title">Status</span></label>
                                    <div class="am-u-sm-9">
                                        开始: <input type="radio" name="astatus" id="user-weibo" value="1">
                                        结束: <input type="radio" name="astatus" id="user-weibo" value="0">
                                        <div>

                                        </div>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
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
<script type="text/javascript" src="{{ asset('/admin/assets/js/laydate.dev.js') }}"></script>
</body>
</html>
@stop

