<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>找回密码</title>
<link href="{{url('/home/forget/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{url('/home/forget/gloab.css')}}"  rel="stylesheet">
<link href="{{url('/home/forget/index.css')}}"  rel="stylesheet">
<script src="{{asset('/home/forget/jquery-1.11.1.min.js')}}" ></script>
<script src="{{asset('/home/forget/register.js')}}"></script>
</head>
<body class="bgf4">
<div class="login-box f-mt10 f-pb50">
	<div class="main bgf">    
    	<div class="reg-box-pan display-inline">  
        	<div class="step">        	
                <ul>
                    <li class="col-xs-4 on">
                        <span class="num"><em class="f-r5"></em><i>1</i></span>                	
                        <span class="line_bg lbg-r"></span>
                        <p class="lbg-txt">填写账户信息<span>(请确保您是邮箱注册)</span></p>
                    </li>
                    <li class="col-xs-4">
                        <span class="num"><em class="f-r5"></em><i>2</i></span>
                        <span class="line_bg lbg-l"></span>
                        <span class="line_bg lbg-r"></span>
                        <p class="lbg-txt">重置密码</p>
                    </li>
                    <li class="col-xs-4">
                        <span class="num"><em class="f-r5"></em><i>3</i></span>
                        <span class="line_bg lbg-l"></span>
                        <p class="lbg-txt">修改密码成功</p>
                    </li>
                </ul>
            </div>
        	<div class="reg-box" id="verifyCheck" style="margin-top:20px;">
            	<div class="part1">  
            		              	
                    <div class="item col-xs-12">
                        <span class="intelligent-label f-fl"><b class="ftx04">*</b>用户号：</span>    
                        <div class="f-fl item-ifo">
                            <input class="emailajax" type="text" size="40" maxlength="40" class="txt03 f-r3 required" tabindex="1"   data-valid="isNonEmpty" id="adminNo"  name="email" placeholder="请输入邮箱"/>                	<span class="ie8 icon-close close hide"></span>
                            <label class="icon-sucessfill blank hide"></label>
                            <label class="focus"><span></span></label>
                            <label class="focus valid"></label>
                        </div>
                    </div>
                    
                   <div class="item col-xs-12" style="height:auto">
                        <span class="intelligent-label f-fl">&nbsp;</span>  
                        <p class="f-size14 required"  data-valid="isChecked" data-error="请先同意条款"> 
                        	<input type="checkbox" checked /><a href="javascript:showoutc();" class="f-ml5">我已阅读并同意条款</a>
                        </p>                       
                        <label class="focus valid"></label> 
                    </div> 
                    <div class="item col-xs-12">
                        <span class="intelligent-label f-fl">&nbsp;</span>    
                        <div class="f-fl item-ifo">
                           <a href="javascript:;" class="btn btn-blue f-r3" id="btn_part1">立即找回</a>                         
                        </div>
                    </div> 
                </div>
               
                <div class="part2" style="display:none">
                	   <div class="item col-xs-12">
                        <span class="intelligent-label f-fl"><b class="ftx04">*</b>新密码：</span>    
                        <div class="f-fl item-ifo">
                            <input type="password" class="newpwdajax" id="password" maxlength="20" class="txt03 f-r3 required" tabindex="3" style="ime-mode:disabled;" onpaste="return  false" autocomplete="off" data-valid="isNonEmpty||between:6-20||level:2" data-error="密码不能为空||密码长度6-20位||该密码太简单，有被盗风险，建议字母+数字的组合" /> 
                            <span class="ie8 icon-close close hide" style="right:55px"></span>
                            <span class="showpwd" data-eye="password"></span>                        
                            <label class="icon-sucessfill blank hide"></label>
                            <label class="focus">6-20位英文（区分大小写）、数字、字符的组合</label>
                            <label class="focus valid"></label>
                            <span class="clearfix"></span>
                            <label class="strength">
                            	<span class="f-fl f-size12">安全程度：</span>
                            	<b><i>弱</i><i>中</i><i>强</i></b>
                            </label>    
                        </div>
                    </div>
                    <div class="item col-xs-12">
                        <span class="intelligent-label f-fl"><b class="ftx04">*</b>确认密码：</span>    
                        <div class="f-fl item-ifo">
                            <input type="password" maxlength="20" class="txt03 f-r3 required" tabindex="4" style="ime-mode:disabled;" onpaste="return  false" autocomplete="off" data-valid="isNonEmpty||between:6-16||isRepeat:password" data-error="密码不能为空||密码长度6-16位||两次密码输入不一致" id="rePassword" />
                            <span class="ie8 icon-close close hide" style="right:55px"></span>
                            <span class="showpwd" data-eye="rePassword"></span>
                            <label class="icon-sucessfill blank hide"></label>
                            <label class="focus">请再输入一遍上面的密码</label> 
                            <label class="focus valid"></label>                          
                        </div>
                    </div>

                    <div class="item col-xs-12">
                        <span class="intelligent-label f-fl">&nbsp;</span>    
                        <div class="f-fl item-ifo">
                           <a href="javascript:;" class="btn btn-blue f-r3" id="btn_part2">提交</a>                    
                        </div>
                    </div> 
                </div>
                 
                <div class="part4 text-center" style="display:none">
                	<h3>恭喜您修改密码成功，现在开始您的购物之旅吧！</h3>
                    <p class="c-666 f-mt30 f-mb50">页面将在 <strong id="times" class="f-size18">10</strong> 秒钟后，跳转到<a href="{{url('/home/login/login/')}}" class="c-blue">登录页面</a></p>
                </div>          
            </div>
        </div>
    </div>
</div>
<div class="m-sPopBg" style="z-index:998;"></div>
<div class="m-sPopCon regcon">
	<div class="m-sPopTitle"><strong>服务协议条款</strong><b id="sPopClose" class="m-sPopClose" onClick="closeClause()">X</b></div>
    <div class="apply_up_content">
    	<pre class="f-r0">
		<strong>同意以下服务条款，提交信息</strong>
        </pre>
    </div>
    <center><a class="btn btn-blue btn-lg f-size12 b-b0 b-l0 b-t0 b-r0 f-pl50 f-pr50 f-r3" href="javascript:closeClause();">>已阅读并同意此条款</a></center>
</div>

<script>
$(function(){	
	
	$("#btn_part1").on('click',function()
	{
		var email = $('.emailajax').val();
		// alert(username);
		$.ajax(
			{
				url:'/home/login/ajax',
				type:'post',
				data:{email:email,"_token":"{{ csrf_token() }}"},
				success:function(data)
				{
					if (data.status == 1)
					{
						alert(data.msg);
                        return;
						// if(!verifyCheck._click()) return;
						// $(".part1").hide();
						// $(".part2").show();
						// $(".step li").eq(1).addClass("on");

					} else if(data.status == 0){
						alert(data.msg);
						return;

					}
				},
				dataType:'json'
			}
		);
		
	});
});


	
	
	$("#btn_part2").click(function(){			
		if(!verifyCheck._click()) return;
		$(".part2").hide();
		$(".part4").show();
		$(".step li").eq(2).addClass("on");
		countdown({
			maxTime:10,
			ing:function(c){
				$("#times").text(c);
			},
			after:function(){
				window.location.href="{{url('/home/login/login')}}";		
			}
		});		
	});	

function showoutc(){$(".m-sPopBg,.m-sPopCon").show();}
function closeClause(){
	$(".m-sPopBg,.m-sPopCon").hide();		
}
</script>
</body>
</html>
