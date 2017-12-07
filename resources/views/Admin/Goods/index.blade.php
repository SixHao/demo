@extends('layout/Alayout')

@section('title')
    <title>商品列表</title>
@endsection
@section('content')
<div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">商品列表</div>
                                @if(session('msg'))
                            <li style="color:red">{{session('msg')}}</li>
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

                            </div>
                            <div class="widget-body  am-fr">

                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                    <div class="am-form-group">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href="{{ url('/admin/goods/add') }}" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 添加商品</a>
                                            </div>
                                            
                                            <form action="{{ url('/admin/goods/index') }}" method="get">
                                                

                                            每页条数：
                                                <select name="num" style="background-color: #5ed95e">
                                                    <option value="5"
                                                            @if($request['num'] == 5)  selected  @endif
                                                    >5
                                                    </option>
                                                    <option value="10"
                                                            @if($request['num'] == 10)  selected  @endif
                                                    >10
                                                    </option>
                                                </select>

                                            
                                            




                                            <div class="am-btn-group am-btn-group-xs">
                                                
                                            



                                            </div>
                                        </div>
                                    </div>
                                </div>

                               
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                        <input type="text" class="am-form-field " placeholder="请输入商品名称" value="{{ $request->keywords }}" name="keywords">
                                        <span class="am-input-group-btn">
                                        <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"></button>
                                      </span>
                                    </div>
                                </div>
                   </form>





                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                        <thead>
                                            <tr>
                                                <th>编号</th>
                                                <th>商品名称</th>
                                                <th>商品图片</th>
                                                <th>类别</th>
                                                <th>定价</th>
                                                <th>库存</th>
                                                <th>上架时间</th>
                                                <th>状态</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($goods as $k=>$v)
                                            <tr class="gradeX">
                                               
                                                <td class="first am-text-middle">{{$v->gid}}</td>
                                                <td style="width:200px;text-overflow:ellipsis;overflow:hidden;" class="am-text-middle">{{$v->gname}}</td>
                                                 <td>
                                                    <img width="50px" src="{{$v->gpic}}" class="tpl-table-line-img" alt="">
                                                </td>
                                                 <td class="am-text-middle">{{$v->tname}}</td>
                                                  <td class="am-text-middle">{{$v->gprice}}</td>
                                                <td class="am-text-middle">{{$v->stock}}</td>
                                               
                                                 <td class="am-text-middle">{{date('Y-m-d',$v->ctime)}}</td>
                                                <td class="am-text-middle over">
                                                @if($v->status == 1)
                                                <button type="button" id="over">上架</button>
                                                @elseif($v->status == 2)
                                                <button type="button" id="over">下架</button>
                                                @else
                                                <button type="button" id="over">新品</button>
                                                @endif
                                                </td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                        <a href="{{ url('/admin/goods/edit') }}/{{ $v->gid }}">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                        <a href="javascript:;"  onclick="del({{ $v->gid }})" class="tpl-table-black-operation-del">
                                                            <i class="am-icon-trash"></i> 删除
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <style>
                                #over {


                                    display: inline-block;
                                    outline: none;
                                    cursor: pointer;
                                    text-align: center;
                                    text-decoration: none;
                                    font: bold 12px  Arial, Helvetica, sans-serif;
                                    padding: .6em 2em .65em;
                                    text-shadow: 0 1px 1px rgba(0, 0, 0, .3);
                                    -webkit-border-radius: .3em;
                                    -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
                                    background:-webkit-gradient(linear, 22 1, 39 bottom, from(gray), to(rgba(0, 0, 0,1)));
                                }
                                #over:hover {
                                    text-decoration: none;
                                }
                                #over:active {
                                    position: relative;
                                    top: 1px;
                                }
                            </style>
                                <div class="am-u-lg-12 am-cf">

                                        
                                            {!! $goods->appends($request->all())->render() !!}


                                            
                                </div>
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

    

    <script>
         $('.over').on('click',function () {
            // alert(111);
            var t = $(this);
            var gid = $(this).parent().find('.first').html();
            $.ajax(
                {
                    url:"{{ url('/admin/goods/ajax') }}",
                    type:'post',
                    data:{gid:gid,'_token':"{{ csrf_token() }}"},
                    success:function (data) {
                        if(data.status == 1)
                        {
                            t.html('<button id="over">上架</button>');
                            setTimeout("location.href = location.href;",2000);
                            setTimeout("layer.msg('修改中...');",1);
                            setTimeout("layer.alert('修改完成')",1000);
                        } else {
                            t.html('<button id="over">下架</button>');
                            setTimeout("location.href = location.href;",2000);
                            setTimeout("layer.msg('修改中...');",1);
                            setTimeout("layer.alert('修改完成')",1000);
                        }
                    },
                    dataType:'json'
                }
            );
        });


        function del(gid)
        {
            // alert(111);
            layer.confirm('您确定要删除吗？', {
              btn: ['确定','取消'] //按钮
            }, function(){

                $.ajax(
                {
                    url:"{{ url('/admin/goods/destroy') }}/"+gid,
                    type:'post',
                    data:{'_token':"{{ csrf_token() }}"},
                    success:function(data)
                    {
                        if(data.status == 1)
                        {
                           layer.msg(data.msg, {icon: 0});
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
    @endsection