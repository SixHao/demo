<!DOCTYPE html>
<html>
  
  <head lang="en">
    <meta charset="UTF-8">
    <title>登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" href="{{asset('/home/AmazeUI-2.4.2/assets/css/amazeui.min.css')}}" />
    <link href="{{asset('/home/css/dlstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/home/AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('/home/AmazeUI-2.4.2/assets/js/amazeui.min.js')}}"></script>
  </head>
  
  <body class="login-boxtitle">
      <a href="{{asset('/home/home/demo.html')}}">
        <img alt="" src="{{asset('/home/images/log_1.png')}}" /></a>
    </div>
    <div class="res-banner " style="height: 450px;">
      <div class="res-main">
        <div class="login-banner-bg">
          <span></span>
          <img src="{{asset('/home/images/big.jpg')}}" /></div>
        <div class="login-box" ">
          <div class="am-tabs" id="doc-my-tabs">
            <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
              <li class="am-active">
                <a href="/home/">邮箱</a></li>
              <li>
                <a href="/home/">手机号</a></li>
              <li>
                <a href="/home/">用户名</a></li>
            </ul>

            <!-- 显示错误 -->
            @if (count($errors) > 0)
              <div class="" style="text-align: center;color: red; font-size: 12px;">
                <ul>
                  @if(is_object($errors))
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                  @else
                    <li >{{ $errors}}</li>
                  @endif
                </ul>
              </div>
            @endif

            <div class="am-tabs-bd">
              <div class="am-tab-panel am-active">
                <form method="post" action="{{asset('/home/dologin')}}">
                  {{ csrf_field() }}
                  <div class="user-email">
                    <label for="email">
                      <i class="am-icon-envelope-o"></i>
                    </label>
                    <input type="email" name="email" id="email" placeholder="请输入邮箱账号"></div>
                  <div class="user-pass">
                    <label for="password">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="pwd" id="pwd" placeholder="请输入密码"></div>
                 
                     <div class="am-cf">
                  <input type="submit" name="" value="登录" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                   <a class="am-btn am-btn-primary am-btn-sm am-f2" href="{{asset('/home/zhuce')}}" style="font-size: 16px;">注册</a>
                </form>
                
               
              </div>
              <div class="am-tab-panel">
                <form method="post" action="{{asset('/home/dologin')}}">
                  {{ csrf_field() }}
                  <div class="user-phone">
                    <label for="phone">
                      <i class="am-icon-mobile-phone am-icon-md"></i>
                    </label>
                    <input type="tel" name="phone" id="phone" placeholder="请输入手机号"></div>
                  <div class="user-pass">
                    <label for="password">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="pwd" id="pwd" placeholder="请输入密码"></div>
                
                    <div class="am-cf">
                    <input type="submit" name="" value="登录" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                      <a class="am-btn am-btn-primary am-btn-sm am-f2" href="{{asset('/home/zhuce')}}" style="font-size: 16px;">注册</a>
                </form>

               
                <hr></div>

              <div class="am-tab-panel am-active">
                <form method="post" action="{{asset('/home/dologin')}}">
                  {{ csrf_field() }}
                  <div class="user-email">
                    <label for="email">
                      <i>♚</i>
                    </label>
                    <input type="text" name="uname" id="email" placeholder="请输入用户名"></div>
                  <div class="user-pass">
                    <label for="password">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="pwd" id="pwd" placeholder="请输入密码"></div>
                 
                  <div class="am-cf">
                    <input type="submit" name="" value="登录" class="am-btn am-btn-primary am-btn-sm am-f"></div>
                   <a class="am-btn am-btn-primary am-btn-sm am-f2" href="{{asset('/home/zhuce')}}" style="font-size: 16px;">注册</a></div>
                </form>
               

              </div>
              <script>$(function() {
                  $('#doc-my-tabs').tabs();
                })</script>
            </div>
       </div>
        </div>
      </div>
      <div class="footer">
        <div class="footer-hd ">
          <p >
            <a href="/home/# ">恒望科技</a>
            <b>|</b>
            <a href="/home/index ">商城首页</a>
            <b>|</b>
            <a href="/home/# ">支付宝</a>
            <b>|</b>
            <a href="/home/# ">物流</a></p>
        </div>
        <div class="footer-bd ">
          <p>
            <a href="/home/# ">关于恒望</a>
            <a href="/home/# ">合作伙伴</a>
            <a href="/home/# ">联系我们</a>
            <a href="/home/# ">网站地图</a>
            <em>© 2015-2025 Hengwang.com 版权所有</em></p>
        </div>
      </div>
  </body>

</html>