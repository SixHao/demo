@extends('layout/Alayout')

@section('title')
    <title>角色授权</title>
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
                                <div class="widget-title am-fl">角色授权</div>
                                
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/role/doauth') }}" method="post">

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
                                        <label for="role-name" class="am-u-sm-3 am-form-label">角色名 <span class="tpl-form-line-small-title">name</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" disabled class="tpl-form-input" id="uname" value="{{ $role->rname }}" placeholder="请输入角色名" name="rname">
                                            <input type="hidden" class="tpl-form-input" value="{{ $role->rid }}" name="rid">
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="role-name" class="am-u-sm-3 am-form-label">权限 <span class="tpl-form-line-small-title">anth</span></label>
                                        <div class="am-u-sm-9" style="margin-top: -25px; width: 800px; left: 270px;">
                                            @foreach($permission as $k=>$v)
                                                @if(in_array($v->pid,$own_permission))
                                                    <div style="width:200px;display: inline-block;">
                                                        <input style="vertical-align: center;" checked type="checkbox" class="tpl-form-input" value="{{ $v->pid }}" name="pid[]">
                                                        <span style="margin-right: 20px;" id="divname">{{ $v->pname }}</span>
                                                    </div>
                                                @else
                                                    <div style="width:200px;display: inline-block;">
                                                        <input style="vertical-align: center;" type="checkbox" class="tpl-form-input" value="{{ $v->pid }}" name="pid[]">
                                                        <span style="margin-right: 20px;" id="divname">{{ $v->pname }}</span>
                                                    </div>
                                                @endif
                                            @endforeach
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