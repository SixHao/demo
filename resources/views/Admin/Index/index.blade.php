@extends('layout/Alayout')

@section('title')
    <title>后台首页</title>
@endsection
@section('content')

    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">服务器信息</div>


                        </div>
                        <div class="widget-body  am-fr">

                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">

                                    <tbody>
                                    <tr class="gradeX">
                                        <td style="width: 35%;">系统类型</td>
                                        <td>{{ php_uname('s') }}</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td style="width: 35%;">Apache运行环境</td>
                                        <td>{{ $_SERVER['SERVER_SOFTWARE'] }}</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td style="width: 35%;">PHP版本</td>
                                        <td>{{ PHP_VERSION }}</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td style="width: 35%;">上传限制</td>
                                        <td><?php echo get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"不允许上传";?></td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td style="width: 35%;">传输协议</td>
                                        <td>{{ getenv('SERVER_PROTOCOL') }}</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td style="width: 35%;">请求方法</td>
                                        <td>{{ getenv('REQUEST_METHOD') }}</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td style="width: 35%;">北京时间</td>
                                        <td>{{ date('Y-m-d H:i:s') }}</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td style="width: 35%;">服务器域名</td>
                                        <td>{{ $_SERVER['HTTP_HOST'] }}</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td style="width: 35%;">占用端口</td>
                                        <td>{{ $_SERVER['SERVER_PORT'] }}</td>
                                    </tr>
                                    <tr class="gradeX">
                                        <td style="width: 35%;">客户端IP</td>
                                        <td>{{ $_SERVER['REMOTE_ADDR'] }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@stop