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
    <link rel="stylesheet" href="{{asset('/home/AmazeUI-2.4.2/assets/css/amazeui.min.css ')}}" />
    <link href="{{asset('/home/css/dlstyle.css')}}" rel="stylesheet" type="text/css">
    <script src="{{asset('/home/AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('/home/AmazeUI-2.4.2/assets/js/amazeui.min.js')}}"></script>
  </head>
  
  <body>
    <div class="login-boxtitle">
      <a href="{{asset('/')}}">
        <img alt="" src="{{asset('/home/images/logobig.png ')}}" /></a>
    </div>
    <div class="res-banner" style="height: 490px;">
      <div class="res-main">
        <div class="login-banner-bg">
          <span></span>
          <img src="/home/images/big.jpg" /></div>
        <div class="login-box"  style="height:443px;">
          <div class="am-tabs" id="doc-my-tabs">
            <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
             
              <li>
                <a href="/home/">账号登录</a></li>
            </ul>

            <!-- 显示错误 -->
           @if (count($errors) > 0)
                <div style="text-align: center">
                    <ul>
                        @if(is_object($errors))
                            @foreach ($errors->all() as $error)
                                <li style="color:red">*{{ $error }}</li>
                            @endforeach
                        @else
                            <li style="color:red">{{ $errors }}</li>
                        @endif
                    </ul>
                </div>
            @endif
          
           <div class="am-tab-panel am-active">
                <form method="post" action="{{url('/home/login/dologin')}}">
                  {{ csrf_field() }}
                  <div class="user-email">
                    <label for="email">
                      <i>♚</i>
                    </label>
                    <input type="text" name="username" id="email" placeholder="请输入用户名/手机/邮箱"></div>
                  <div class="user-pass">
                    <label for="password">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="password" id="password" placeholder="请输入密码"></div>
                 
                  <div class="am-cf">
                    <input type="submit" name="" value="登录" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                   
                </form>
                 <a href="{{url('/home/zhuce/zhuce') }}"><div class="am-cf">
                    <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl"></div></a>
              
                  <a href="{{url('/home/login/forget') }}" style="float:right;color:red;">忘记密码</a>
                    <!-- <input type="submit" name="" value="" style="background-color: white;text-align: right;color:blue;border:0px;" class="am-btn am-btn-primary am-btn-sm am-fl"></a>
 -->
              
              <script>$(function() {
                  $('#doc-my-tabs').tabs();
                })</script>
            </div>




          </div>
        </div>
      </div>
      <div class="footer " style="margin-top: 100px;">
        <div class="footer-hd ">
          <p>
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