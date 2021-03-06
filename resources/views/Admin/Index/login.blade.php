<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台登录</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="{{asset('Admin/assets/i/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('Admin/assets/i/app-icon72x72@2x.png')}}">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="{{asset('Admin/assets/css/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('Admin/assets/css/amazeui.datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('Admin/assets/css/app.css')}}">
    <script src="{{asset('Admin/assets/js/jquery.min.js')}}"></script>

</head>

<body data-type="login">
    <script src="{{asset('Admin/assets/js/theme.js')}}"></script>
    <div class="am-g tpl-g">
        <!-- 风格切换 -->
        <div class="tpl-skiner">
            <div class="tpl-skiner-toggle am-icon-cog">
            </div>
            <div class="tpl-skiner-content">
                <div class="tpl-skiner-content-title">
                    选择主题
                </div>
                <div class="tpl-skiner-content-bar">
                    <span class="skiner-color skiner-white" data-color="theme-white"></span>
                    <span class="skiner-color skiner-black" data-color="theme-black"></span>
                </div>
            </div>
        </div>
        <div class="tpl-login">
            <div class="tpl-login-content">
                <div class="tpl-login-logo">

                </div>
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @if(is_object($errors))

                                @foreach ($errors->all() as $error)
                                    <li style="color:greenyellow; text-align: center;">{{ $error }}</li>
                                @endforeach
                            @else
                                <li style="color:greenyellow; text-align: center;">{{ $errors }}</li>
                            @endif
                        </ul>
                    </div>
                @endif
                <form class="am-form tpl-form-line-form" action="{{url('admin/dologin')}}" method="post">
                    <div class="am-form-group">
                        {{csrf_field()}}
                        <input type="text" class="tpl-form-input" name="uname" value="{{old('uname')}}" placeholder="请输入账号">

                    </div>

                    <div class="am-form-group">
                        <input type="password" class="tpl-form-input" name="pwd" value="{{old('pwd')}}" placeholder="请输入密码">

                    </div>


                    <div class="am-form-group">

                        <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('Admin/assets/js/amazeui.min.js')}}"></script>
    <script src="{{asset('Admin/assets/js/app.js')}}"></script>


</body>

</html>