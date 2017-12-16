@extends('layout/Alayout')

@section('title')
    <title>用户添加</title>
      <style type="text/css">

        .am-form-group *:focus{outline :none;}

        .am-form-group{

            width: 700px;

            height: auto;
            padding-bottom:5px;

        }

        .am-form-group input[type=text],.am-form-group input[type=password]{

            width: 100px;

           

            border :1px solid #aaa;

            padding: 3px 8px;

            border-radius: 5px;

        }

        .am-form-group input:focus{

            border-color: #c00;

        }
        .am-form-group span{
            color: white;
        }

        .am-form-group input[type=text]{

            transition: padding .25s;

            -o-transition: padding  .25s;

            -moz-transition: padding  .25s;

            -webkit-transition: padding  .25s;

        }

        .am-form-group input[type=password]{

            transition: padding  .25s;

            -o-transition: padding  .25s;

            -moz-transition: padding  .25s;

            -webkit-transition: padding  .25s;

        }

        .am-form-group input:focus{

            padding-right: 70px;

        }
        .tips{

            color: rgba(0, 0, 0, 0.5);

            padding-left: 10px;
            display: none;

        }

        .tips_true,.tips_false{

            padding-left: 10px;
            display: block;
        }

        .tips_true{

            color: green;
           
        }

        .tips_false{

            color: red;
            

        }

  </style>
@endsection
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="row-content am-cf">
                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">用户添加</div>
                                
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/user/insert') }}" method="post" enctype="multipart/form-data" name="form1" onsubmit="return check()">

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
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">用户名 <span class="tpl-form-line-small-title">uname</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="uname" placeholder="请输入用户名"
                                            name="uname" value="{{ old('uname') }}"   onblur="checkna()" required>
                                            <span class="tips" id="divname">长度6~20个字符</span>
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">密码 <span class="tpl-form-line-small-title">pwd</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="password" class="tpl-form-input" id="pwd" placeholder="请输入密码" name="pwd"  value="{{ old('pwd') }}"   onblur="checkpsd1()" required>
                                            <span class="tips" id="divpassword1">密码必须由字母和数字组成</span>
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">确认密码 <span class="tpl-form-line-small-title">pwd</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="password" class="tpl-form-input" id="re_pwd" placeholder="请再次输入密码" name="re_pwd" value="{{ old('re_pwd') }}"
                                            onblur="checkpsd2()" required>
                                            <span class="tips" id="divpassword2">两次密码需要相同</span>
                                        </div>
                                    </div>


                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">性别 <span class="tpl-form-line-small-title">sex</span></label>
                                        <div>
                                         <input type="radio" name="sex" value="m" @if(old('sex') == 'm') checked @endif checked>男
                                         <input type="radio" name="sex" value="w" @if(old('sex') == 'w') checked @endif>女
                                         <input type="radio" name="sex" value="x" @if(old('sex') == 'x') checked @endif>保密
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-3 am-form-label">电话 <span class="tpl-form-line-small-title">phone</span></label>
                                       <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="phone" placeholder="请输入您的电话" name="phone" value="{{ old('phone') }}"
                                            onblur="checkphone()" required>
                                            <span class="tips" id="divphone">请输入您的手机号码</span>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">邮箱 <span class="tpl-form-line-small-title">email</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" placeholder="请输入您的邮箱" name="email" value="{{ old('email') }}"
                                            onblur="checkemail()" id="email" required>
                                            <span class="tips" id="divemail">请输入您的邮箱</span>
                                        </div>
                                    </div><div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">地址 <span class="tpl-form-line-small-title">addr</span></label>
                                        <div class="am-u-sm-9">
                                          <input type="text" placeholder="请输入您的地址" name="addr" value="{{ old('addr') }}" id="addr"
                                          onblur="checkaddr()" required>
                                          <span class="tips" id="divaddr">请输入您的地址</span>
                                        </div>
                                    
                                    </div><div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">生日 <span class="tpl-form-line-small-title">birth</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text
                                            " placeholder="请输入您的生日" name="birthday" id="J-xl" value="{{ old('birthday') }}"
                                            >
                                            <span class="tips" id="divbir">请输入您的生日</span>
                                        </div>
                                    </div><div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">权限 <span class="tpl-form-line-small-title">auth</span></label>
                                        <div class="am-u-sm-9">
                                            <select data-am-selected="{searchBox: 1}" style="display: none;" name="auth">
  <option value="0" @if(old('auth') == '0') selected @endif>超级管理员</option>
  <option value="1" @if(old('auth') == '1') selected @endif>普通管理员</option>
  <option value="2" @if(old('auth') == '2') selected @endif>普通用户</option>
</select>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">头像 <span class="tpl-form-line-small-title">Images</span></label>
                                        <div class="am-u-sm-9">
                                            <div class="am-form-group am-form-file">
                                                <div class="tpl-form-file-img">
                                                <input type="hidden" name="uface" value="/uploads/default.jpg" id="upload_file">
                                                    <img id="imghead" width="50px" src="{{asset('/uploads/default.jpg')}}" \>
                                                </div>
                                                <input id="doc-form-file" onclick="abc()" type="file" multiple="true" name="uface1">
                                                <script type="text/javascript">

                                function checkna(){

                                    na=$("#uname").val();

                                    if( na.length <3 || na.length >12)  

                                    {   

                                        divname.innerHTML='<font class="tips_false">长度是3~12个字符</font>';

                                         

                                    }else{  

                                        divname.innerHTML='<font class="tips_true">输入正确</font>';

                                       

                                    }  

                                

                              }

                              //验证密码 

                                function checkpsd1(){    

                                    psd1=$("#pwd").val();  

                                     flagZM=false ;

                                     flagSZ=false ; 

                                     flagQT=false ;

                                    if(psd1.length<6 || psd1.length>12){   

                                        divpassword1.innerHTML='<font class="tips_false">长度应为6到12位</font>';

                                    }else

                                        {   

                                          for(i=0;i < psd1.length;i++)   

                                            {    

                                                if((psd1.charAt(i) >= 'A' && psd1.charAt(i)<='Z') || (psd1.charAt(i)>='a' && psd1.charAt(i)<='z')) 

                                                {   

                                                    flagZM=true;

                                                }

                                                else if(psd1.charAt(i)>='0' && psd1.charAt(i)<='9')    

                                                { 

                                                    flagSZ=true;

                                                }else    

                                                { 

                                                    flagQT=true;

                                                }   

                                            }   

                                            if(!flagZM||!flagSZ||flagQT){

                                            divpassword1.innerHTML='<font class="tips_false">密码必须是字母数字的组合</font>'; 

                                             

                                            }else{

                                                

                                            divpassword1.innerHTML='<font class="tips_true">输入正确</font>';

                                             

                                            }  

                                         

                                        }   

                                }

                                //验证确认密码 

                                function checkpsd2(){ 

                                    if(($("#pwd").val())!=($("#re_pwd").val())) { 

                                         divpassword2.innerHTML='<font class="tips_false">您两次输入的密码不一样</font>';

                                    } else { 

                                         divpassword2.innerHTML='<font class="tips_true">输入正确</font>';

                                    }

                                }
                                
                                //验证手机

                                

                                function checkphone(){

                                      myreg = /^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/; 
                                    
                                    if (!myreg.test($("#phone").val())) 

                                      {

                                        divphone.innerHTML='<font class="tips_false">请输入有效的手机号码</font>' ;

                                      }

                                    else {

                                        divphone.innerHTML='<font class="tips_true">输入正确</font>' ;

                                    }

                                }

                                //验证邮箱

                                

                                function checkemail(){

                                    apos=$("#email").val().indexOf("@");

                                    dotpos=$("#email").val().lastIndexOf(".");

                                    if (apos<1||dotpos-apos<2) 

                                      {

                                        divemail.innerHTML='<font class="tips_false">请输入有效的邮箱</font>' ;

                                      }

                                    else {

                                        divemail.innerHTML='<font class="tips_true">输入正确</font>' ;

                                    }

                                } 

                                // 验证地址
                                function checkaddr()
                                {
                                    if(($("#addr").val())=="")
                                    {

                                        divaddr.innerHTML='<font class="tips_false">请输入您的地址</font>' ;

                                      }

                                    else {

                                        divaddr.innerHTML='<font class="tips_true">输入正确</font>' ;

                                    }
                                }  

                                  // 验证生日
                                function checkbir()
                                {
                                    if(($("#birthday").val())=="")
                                    {

                                        divbir.innerHTML='<font class="tips_false">请输入您的生日</font>' ;

                                      }

                                    else {

                                        divbir.innerHTML='<font class="tips_true">输入正确</font>' ;

                                    }
                                }  

                                function abc() {
                                    $("#doc-form-file").change(function () {
                                        $('#imghead').show();
                                        uploadImage();
                                    });
                                };
                                function uploadImage() {
                                    // 判断是否有选择上传文件
                                    var imgPath = $("#doc-form-file").val();
                                    if (imgPath == "") {
                                        alert("请选择上传图片！");
                                        return;
                                    }
                                    //判断上传文件的后缀名
                                    var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                    if (strExtension != 'jpg' && strExtension != 'gif'
                                        && strExtension != 'png' && strExtension != 'bmp') {
                                        alert("请选择图片文件");
                                        return;
                                    }
                                    var formData = new FormData($('#art_form')[0]);
                                    formData.append('uface', $('#doc-form-file')[0].files[0]);
                                    formData.append('_token',"{{csrf_token()}}");
                                    $.ajax({
                                        type: "POST",
                                        url: "/admin/user/upload",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            // console.log(data);
                                           $('#imghead').attr('src',data);
                                            $('#upload_file').attr('value',data);
                                            $('#imghead').show();
                                            
                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                            alert("上传失败，请检查网络后重试");
                                        }
                                    });
                                }
                                 function check()
                                {
                                    if(na.length <3 || na.length >12){
                                        alert('用户名应为3~12位');
                                        return false;
                                    } else if (psd1.length<6 || psd1.length>12) {
                                        alert('密码应为6~12位');
                                        return false;
                                    } else if (!flagZM||!flagSZ||flagQT) {
                                         alert('密码必须是字母数字的组合');
                                        return false;
                                    } else if (($("#pwd").val())!=($("#re_pwd").val())) {
                                        alert('您两次输入的密码不一样');
                                        return false;
                                    } else if (!myreg.test($("#phone").val())) {
                                        alert('请输入有效的手机号码');
                                        return false;
                                    } else if (apos<1||dotpos-apos<2) {
                                        alert('请输入有效的邮箱');
                                        return false;
                                    } else {
                                        
                                        return true;
                                    }
                                    
                                }
                                // function check()
                                // {
                                //     var check = checkna() && chcekpsd1() && checkpsd2() && checkpnone() && checkemail() && checkaddr() && checkbir();
                                //     return check();
                                // }
                            </script>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success">提交</button>
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
<script type="text/javascript">
  laydate({

            elem: '#J-xl'

        });
</script>
</body>

</html>
@endsection