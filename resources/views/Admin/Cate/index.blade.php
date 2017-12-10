@extends('layout/Alayout')

@section('title')
    <title>后台首页</title>
@endsection
@section('content')
 <div class="tpl-content-wrapper" >
        <div class="row-content am-cf">
             <div class="row">
               <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                  <div class="widget am-cf">
                     <div class="widget-head am-cf">
                     <div class="widget-title  am-cf">分类列表</div>
                      @if(session('msg'))
                            <li style="color:red">{{session('msg')}}</li>
                           @endif

                      </div>
        <div class="widget-body  am-fr">
              <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a style="color: white" href="{{ url('/admin/cate/add') }}"> 添加分类</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>

           <div class="am-u-sm-12">
                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r" >
                <thead>
                  <tr>
                    <th >类别ID</th>
                    <th>类别名称</th>
                    <th>PID</th>
                    <th>PATH</th>
                    <th>操作</th>
                    
                   </tr>
                </thead>

                @foreach($cates as $k=>$v)
                <tbody>
                     <tr class="gradeX" >
                        <td >{{$v->tid}}</td>
                        <td>{{$v->tname}}</td>
                        <td>{{$v->pid}}</td>
                        <td>{{$v->path}}</td>
                        <td>
                         <div class="tpl-table-black-operation"  >
                         <a href="{{asset('admin/cate/create')}}/{{$v->tid}}" style="color:white;">
                         <i class="am-icon-pencil" ></i> 添加子分类
                          </a>

                          @if( $v->pid == 0)
                          <a href="javascript:;" style="color:white;">
                          @else
                          <a href="{{asset('admin/cate/edit')}}/{{$v->tid}}" style="color:white;">
                          @endif
                         <i class="am-icon-pencil" ></i> 编辑
                          </a>
                            <a href="javascript:;" onclick="del({{ $v->tid }})" style="color:white;">
                         <i class="am-icon-pencil" ></i> 删除
                          </a>
                                 </div>
                            </td>
                      </tr>
                        
                     <!-- more data -->
                     </tbody>
                     @endforeach
                   </table>
                </div>
                 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
 <script>
        function del(tid)
        {
            // alert(111);
            layer.confirm('您确定要删除吗？', {
              btn: ['确定','取消'] //按钮
            }, function(){

                $.ajax(
                {
                    url:"{{ url('/admin/cate/destroy') }}/"+tid,
                    type:'post',
                    data:{'_token':"{{ csrf_token() }}"},
                    success:function(data)
                    {
                        if(data.status == 1)
                        {
                           layer.msg(data.msg, {icon: 2});
                           setTimeout("location.href = location.href;",500);
                       } else
                       {
                           layer.msg(data.msg, {icon: 1});
                           setTimeout("location.href = location.href;",500);
                           //location.href = location.href;
                       }
                    },
                    dataType:'json',
                }
            );

            });

        }



</script>
    <script src="{{ asset('/admin/assets/js/amazeui.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/amazeui.datatables.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/app.js') }}"></script>
</body>
</html>
@endsection
