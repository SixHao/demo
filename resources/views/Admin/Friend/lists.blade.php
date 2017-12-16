@extends('layout/Alayout')

@section('content')

<!-- 内容区域 -->
<div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">友情链接</div>
                    </div>
                    <div class="widget-body  am-fr">

                        <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a style="color: white" href="{{ url('/admin/friend/add') }}"> 友情链接添加</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                         @if(session('msg'))
                            <div style="color:red" class="alert alert-danger">{{session('msg')}}</div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ asset('admin/friend/list') }}" method="get">
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
        <th>链接名:</th>
        <td><input style="color: #4B5357" type="text" name="keywords1" value="{{$request->keywords1}}" placeholder="链接名"></td>
        <td><input type="submit" style="background: #5EB95E" value="查询"></td>
        </tr>
                                    <tr>
                                        <th>ID</th>
                                        <th>链接名称</th>
                                        <th>链接地址</th>
                                        <th>链接logo</th>
                                        <th>内容</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(session('info'))
                                    <div class="alert alert-danger">{{session('info')}}</div>
                                @endif
                                @foreach($data as $key => $v)
                                    <tr class="gradeX">
                                        <td>{{ $v->fid }}</td>
                                        <td>{{ $v->fname }}</td>
                                        <td>{{ $v->furl }}</td>
                                        <td><img  width="50px" height="30px" 
                                        @if($v->flogo == '/updates/default.jpg')
                                        src="{{ asset('/uploads/default.jpg') }}"
                                        @else
                                        src="{{ $v->flogo }}"
                                        @endif
                                       ></td>
                                        <td>{{ $v->fcontent }}</td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                <a href="{{url('/admin/friend/edit')}}/{{$v->fid}}">
                                                    <i class="am-icon-pencil"></i> 编辑
                                                </a>
                                                <a href="javascript:;" onclick="urlDel({{$v->fid}})" class="tpl-table-black-operation-del">
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
                                    .am-u-lg-12 ul{
                                        float: right;
                                    }
                                    .am-u-lg-12 ul li a{
                                        color: #fff;
                                    }
                                    .am-u-lg-12 ul li{
                                        display: inline-block;
                                        padding:6px 12px;
                                        background-color: #666;
                                        color: #fff;
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
<script src="{{ asset('/admin/assets/js/app.js') }}">
</script><script src="{{ asset('/admin/assets/js/ch-ui.admin.js') }}">
</script><script src="{{ asset('/admin/assets/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
 <script>
        
    function urlDel(fid) {

        //询问框
        layer.confirm('您确认删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
            //admin/user/1
            $.post("{{url('/admin/friend/delete')}}/"+fid,{"_method":"get"},function(data){
               
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