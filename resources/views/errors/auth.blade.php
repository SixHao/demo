@extends('layout/Alayout')

@section('title')
    <title>404错误</title>
@endsection
@section('content')



        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">



            <div class="row-content am-cf">
                <div class="widget am-cf">
                    <div class="widget-body">
                        <div class="tpl-page-state">
                            <div class="tpl-page-state-title am-text-center tpl-error-title">404</div>
                            <div class="tpl-error-title-info">Page Not Found</div>
                            <div class="tpl-page-state-content tpl-error-content">

                                <p>对不起,没有找到您所需要的页面,可能是您没有权限,请先授权。</p>
                                <a href="{{ '/admin/index ' }}" type="button" class="am-btn am-btn-secondary am-radius tpl-error-btn">Back Home</a></div>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
    </div>
    <script src="assets/js/amazeui.min.js"></script>
    <script src="assets/js/amazeui.datatables.min.js"></script>
    <script src="assets/js/dataTables.responsive.min.js"></script>
    <script src="assets/js/app.js"></script>

</body>

</html>
@stop