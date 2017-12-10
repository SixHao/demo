@extends('layout/Alayout')

@section('title')
    <title>用户列表</title>
@endsection
@section('content')

<!-- 内容区域 -->
<div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">用户管理</div>
                    </div>
                    <div class="widget-body  am-fr">

                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a style="color: white" href="{{ url('/admin/user/add') }}"> 用户添加</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @if(session('msg'))
                            <div style="color:red" class="alert alert-danger">{{session('msg')}}</div>
                        @endif
                        <form action="{{ asset('admin/user/list') }}" method="get">
                        <div class="am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                <thead>
                                    <tr>
        
        <th>
            每页条数：
            <select name="num"  style="background: #5EB95E">
                <option value="5"
                  @if($request['num'] == 5)  selected  @endif
                >5
                </option>
                <option value="10"
                  @if($request['num'] == 10)  selected  @endif
                >10
                </option>
            </select>
        </th>
        <th>用户名:</th>
        <td colspan="3"><input style="color: #4B5357" type="text" name="keywords1" value="{{$request->keywords1}}" placeholder="用户名"></td>
        <th>邮箱:</th>
        <td colspan="3"><input style="color: #4B5357" type="text" name="keywords2" value="{{$request->keywords2}}" placeholder="邮箱"></td>
        <td><input type="submit" style="background: #5EB95E" value="查询"></td>
        </tr>
                                    <tr>
                                        <th>ID</th>
                                        <th>用户名</th>
                                        <th>性别</th>
                                        <th>电话</th>
                                        <th>邮箱</th>
                                        <th>地址</th>
                                        <th>生日</th>
                                        <th>权限</th>
                                        <th>头像</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(session('info'))
                                    <div class="alert alert-danger">{{session('info')}}</div>
                                @endif
                                @foreach($data as $key => $v)
                                    <tr class="gradeX">
                                        <td>{{ $v->uid }}</td>
                                        <td>{{ $v->uname }}</td>
                                        <td>
                                        @if($v->sex == 'w')
                                        女
                                        @elseif($v->sex == 'm')
                                        男
                                        @else
                                        保密
                                        @endif
                                          </td>
                                        <td>{{ $v->phone }}</td>
                                        <td>{{ $v->email }}</td>
                                        <td>{{ $v->addr }}</td>
                                        <td>{{ date('Y-m-d',$v->birthday) }}</td>
                                        <td>
                                        @if($v->auth == '0')
                                        超级管理员
                                        @elseif($v->auth == '1')
                                        普通管理员
                                        @else
                                        普通用户
                                        @endif
                                        </td>
                                        <td><img  width="50px" height="30px" 
                                        @if($v->uface == '/uploads/default.jpg')
                                        src="{{ asset('/uploads/default.jpg') }}"
                                        @else
                                        src="{{ $v->uface }}"
                                        @endif
                                       ></td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <a href="{{url('/admin/user/edit')}}/{{$v->uid}}">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a>
                                                <a href="javascript:;" onclick="userDel({{$v->uid}})" class="tpl-table-black-operation-del">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                 @endforeach
                                    <!-- more data -->
                                </tbody>
                            </table>
                        </div>
                        </form>
                        <div class="am-u-lg-12 am-cf">
                         <?php
                        $v = empty($input) ? '' : $input;
                        ?>
                              {{--分页--}}
                         {!! $data->appends($request->all())->render() !!}
                <style>
                    .am-u-lg-12 ul li span{
                        padding:6px 12px;
                    }
                    .am-u-lg-12 ul li{
                        display: inline;
                    }
                    
                </style>
               
                    </div>
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
<script src="{{ asset('/admin/assets/js/ch-ui.admin.js') }}">
</script><script src="{{ asset('/admin/assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
 <script>
        
    function userDel(uid) {

        //询问框
        layer.confirm('您确认删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
            $.post("{{url('admin/user/delete')}}/"+uid,{"_method":"get"},function(data){
               
              // data是json格式的字符串，在js中如何将一个json字符串变成json对象
               if(data.error == 0){
                   layer.msg(data.msg, {icon: 6});
                   var t=setTimeout("location.href = location.href;",500);
               }else{
                   layer.msg(data.msg, {icon: 5});

                   var t=setTimeout("location.href = location.href;",500);
                   
               }


            });


        }, function(){

        });
    }
    




</script>

</body>

</html>
@stop