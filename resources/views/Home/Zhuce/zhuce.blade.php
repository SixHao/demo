<!DOCTYPE html>
<html>
  
  <head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
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
      <a href="{{asset('/home/home/demo.html ')}}">
        <img alt="" src="{{asset('/home/images/1504680318.png ')}}" /></a>
    </div>
    <div class="res-banner" style="height: 490px;">
      <div class="res-main">
        <div class="login-banner-bg">
          <span></span>
          <img src="/home/images/big.jpg" /></div>
        <div class="login-box"  style="height:443px;">
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
                  @foreach ($errors->all() as $error)
                    <li style="list-style: none;">{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="am-tabs-bd">
              <div class="am-tab-panel am-active">
                <form method="post" action="/home/zhuce/doemailzhuce">
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
                    <input type="password" name="password" id="password" placeholder="设置密码"></div>
                  <div class="user-pass">
                    <label for="passwordRepeat">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="repassword" id="passwordRepeat" placeholder="确认密码"></div>
                     <div class="am-cf">
                  <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                </form>
                <div class="login-links">
                  <label for="reader-me">
                    <input id="reader-me" type="checkbox">点击表示您同意商城《服务协议》</label></div>
               
              </div>
              <div class="am-tab-panel">
                <form method="post" action="/home/zhuce/dophonezhuce">
                	{{ csrf_field() }}
                  <div class="user-phone">
                    <label for="phone">
                      <i class="am-icon-mobile-phone am-icon-md"></i>
                    </label>
                    <input type="tel" name="phone" id="phone" placeholder="请输入手机号"></div>
                  <div class="verification">
                    <label for="code">
                      <i class="am-icon-code-fork"></i>
                    </label>
                    <input type="tel" name="phonecode" id="code" placeholder="请输入验证码">
                    <a class="btn" href="javascript:void(0);" onclick="sendcode();" id="sendMobileCode">
                      <input type="button" style="width: 110px; font-size: 12px;" onClick="sendCode(this)" id="dyMobileButton" value="获取验证码"></a>
                  </div>
                  <script type="text/javascript">
                     var clock = '';
                     var nums = 30;
                     var btn;
                     function sendCode(thisBtn)
                     { 
                         btn = thisBtn;
                         btn.disabled = true; //将按钮置为不可点击
                         btn.value = nums+'秒后可重新获取';
                         clock = setInterval(doLoop, 1000); //一秒执行一次
                     }
                     function doLoop()
                     {
                         nums--;
                         if(nums > 0)
                         {
                            btn.value = nums+'秒后可重新获取';
                         }else{
                            clearInterval(clock); //清除js定时器
                            btn.disabled = false;
                            btn.value = '获取验证码';
                            nums = 30; //重置时间
                        }
                     }
                  </script>
         <script>
    function sendcode(){
//        1. 获取要发送的手机号
      $phone = $('[name="phone"]').val();
      //alert($phone);

//      2. 向服务器的发送短信的接口发送ajax请求

      $.post("{{url('/home/zhuce/sendcode')}}",{'phone':$phone,'_token':'{{csrf_token()}}'},function(data){
        console.log(data);
        var obj = JSON.parse(data);
        if(obj.status == 0){
                    layer.msg(obj.message, {icon: 6,area: ['100px', '80px']});
        }else{
                    layer.msg(obj.message, {icon: 5,area: ['100px', '80px']});
        }


      })
    }
  </script>
          </script>
                  <div class="user-pass">
                    <label for="password">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="password" id="password" placeholder="设置密码"></div>
                  <div class="user-pass">
                    <label for="passwordRepeat">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="repassword" id="passwordRepeat" placeholder="确认密码"></div>
                    <div class="am-cf">
                  	<input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                </form>

                <div class="login-links">
                  <label for="reader-me">
                    <input id="reader-me" type="checkbox">点击表示您同意商城《服务协议》</label></div>
                
                <hr></div>

              <div class="am-tab-panel am-active">
                <form method="post" action="/home/zhuce/douserzhuce">
                  {{ csrf_field() }}
                  <div class="user-email">
                    <label for="email">
                      <i>♚</i>
                    </label>
                    <input type="text" name="username" id="email" placeholder="请输入用户名"></div>
                  <div class="user-pass">
                    <label for="password">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="password" id="password" placeholder="设置密码"></div>
                  <div class="user-pass">
                    <label for="passwordRepeat">
                      <i class="am-icon-lock"></i>
                    </label>
                    <input type="password" name="repassword" id="passwordRepeat" placeholder="确认密码"></div>
                  <div class="am-cf">
                    <input type="submit" name="" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl"></div>
                </form>
                <div class="login-links">
                  <label for="reader-me">
                    <input id="reader-me" type="checkbox">点击表示您同意商城《服务协议》</label></div>

              </div>
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