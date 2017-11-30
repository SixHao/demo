<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset=utf-8"utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>注册</title>
  <link href="{{asset('/Home/css/bootstrap.min.css')}}"  rel="stylesheet">
  <link href="{{asset('/Home/css/normalize.css')}}"  rel="stylesheet">
  <link href="{{asset('/Home/css/public.css')}}"  rel="stylesheet">
  <link href="{{asset('/Home/css/validator.css')}}"  rel="stylesheet">
  <link href="{{asset('/Home/css/completer.css')}}" rel="stylesheet">
  <link href="{{asset('/Home/css/jedate.css')}}"  rel="stylesheet">
  <link href="{{asset('/Home/css/date.css')}}"  rel="stylesheet">
  <link href="{{asset('/Home/css/magic-check.css')}}"  rel="stylesheet" >
  <link href="{{asset('/Home/css/jquery-ui.css')}}"  rel="stylesheet">  
  <link href="{{asset('/Home/css/index.css')}}"  rel="stylesheet">  
  <script src="{{asset('/Home/js/jquery.min.js')}}" ></script>
  <script src="{{asset('/Home/js/bootstrap.min.js')}}" ></script>
 <script type="text/javascript" src="{{asset('/Home/js/public.js')}}" ></script>
  <script type="text/javascript" src="{{asset('/Home/js/jedate.js')}}" ></script>
  <script type="text/javascript" src="{{asset('/Home/js/date.js')}}" ></script>
  <script type="text/javascript" src="{{asset('/Home/js/jquery-validate.js')}}" ></script>
  <script type="text/javascript" src="{{asset('/Home/js/validator.js')}}" ></script>
  <script type="text/javascript" src="{{asset('/Home/js/jquery-ui-1.10.2.js')}}" ></script>
  <script type="text/javascript" src="{{asset('/Home/js/index.js')}}" ></script>

  
</head>
<body>
<header>
</header>
<div class="container">

@if (count($errors) > 0)
    <div class="mws-form-message warning">
    	注册失败
      
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


  <div class="form-box row">
    <form action="{{ asset('/home/dozhuce') }}" class="form-horizontal" role="form" id="register-form" method="post">

    	{{csrf_field() }}
      <div class="form-group">
        <label for="uname" class="col-sm-2  control-label">帐 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 号 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="uname" name="uname" placeholder="请输入帐户" >
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="phone" class="col-sm-2  control-label">手 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 机 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="phone" name="phone" placeholder="请输入手机号">    
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="email" class="col-sm-2  control-label">邮 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 箱 :</label>
        <div class="col-sm-10 input-parent">
          <input type="text" class="form-control vinput" id="email" name="email" placeholder="请输入邮箱"/>       
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="birthday" class="col-sm-2  control-label">生 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 日 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="birthday" name="birthday" placeholder="请选择生日" readonly>
          <span></span>
        </div>
      </div>
      <div class="form-group ">
        <label for="password" class="col-sm-2  control-label">密 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 码 :</label>
        <div class="col-sm-10  input-parent">
          <input type="password" class="form-control vinput" id="pwd" name="pwd" placeholder="请输入密码"/>
          <i class="glyphicon glyphicon-eye-close form-control-feedback" id="toogle-password"></i>
          <span></span>
        </div>
      </div>
      <div class="form-group">
        <label for="notpass" class="col-sm-2  control-label">确认密码 :</label>
        <div class="col-sm-10  input-parent">
          <input type="text" class="form-control vinput" id="notpass" name="notpass" placeholder="请再次输入密码"/>
          <i class="glyphicon glyphicon-eye-close form-control-feedback" id="toggle-notpass"></i>
          <span></span>
        </div>
      </div>
      <br>
      <div class="form-group">
        <div class="col-sm-12">
          <input type="checkbox" class="magic-checkbox" id="accept" name="accept" />
          <label for="accept" class="accept"><span>我已阅读并接受</span> <a href="javascript:;">《版权声明》</a> <span>和</span> <a href="javascript:;">《隐私保护》</a></label>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-12">
          <input type="submit" class="btn btn-primary form-control" id="submit" value="注册"/> 
        </div>
      </div>
    </form>
  </div>
</div>

<footer>
</footer>
</body>

</html>