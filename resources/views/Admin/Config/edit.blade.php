@extends('layout/Alayout')

@section('title')
    <title>配置添加</title>
@endsection
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="row-content am-cf">
                <div class="row">

                                        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">修改配置</div>

                            </div>
                            <div class="widget-body am-fr">
                            <div class="am-u-sm-12">
                                <div class="am-form-group">

                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a style="color: white" href="{{ url('/admin/config/index') }}">配置列表</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                                <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{ url('/admin/config/update/'.$data->wid) }}" method="post" enctype="multipart/form-data">

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
                                        <label for="user-name" class="am-u-sm-3 am-form-label">配置标题: <span class="tpl-form-line-small-title">wtitle</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入配置标题"
                                            name="wtitle" value="{{$data->wtitle}}">
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">配置名称: <span class="tpl-form-line-small-title">wname</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入配置名称"
                                            name="wname" value="{{$data->wname}}">
                                        </div>
                                    </div>

                                    </div>

                                        <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">配置内容: <span class="tpl-form-line-small-title">wcontent</span></label>
                                        <div class="am-u-sm-9">
                                            <textarea type="text" class="tpl-form-input" id="user-name" placeholder="请输入配置内容" name="wcontent">{{$data->wcontent}}</textarea>
                                            <p>注意: 下面类型值是radio的情况下,请输入代表数字</p>
                                        </div>
                                    </div>


                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">配置类别: <span class="tpl-form-line-small-title">wtype</span></label>
                                        <div>
                                         <input type="radio" name="wtype" value="input"   onclick="showTr(this)"    @if($data->wtype == 'input') checked @endif>input
                                         <input type="radio" name="wtype" value="textarea"   onclick="showTr(this)" @if($data->wtype == 'textarea') checked @endif>textarea
                                         <input type="radio" name="wtype" value="radio"  onclick="showTr(this)"     @if($data->wtype == 'radio')  checked @endif>radio
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                         <div class="wvalue" style="display:none">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">配置类型值: <span class="tpl-form-line-small-title">wvalue</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text"  id="user-name" placeholder="请输入类型值" name="wvalue"  value="{{$data->wvalue}}">
                                            <p>注意: 类型值只有在radio的情况下才需要配置, 格式 1|开启,0|关闭</p>
                                            </div>

                                        </div>
                                    </div>
                                     @if($data->wtype == 'radio')
                                        <div class="am-form-group">
                                         <div class="wvalue">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">配置类型值: <span class="tpl-form-line-small-title">wvalue</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text"  id="user-name" placeholder="请输入类型值" name="wvalue"  value="{{$data->wvalue}}">
                                            <p>注意: 类型值只有在radio的情况下才需要配置, 格式 1|开启,0|关闭</p>
                                            </div>

                                        </div>
                                    </div>
                                     @endif
                                        <div class="am-form-group">

                                        <label for="user-name" class="am-u-sm-3 am-form-label">配置排序: <span class="tpl-form-line-small-title">worder</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入数字排序" name="worder"  value="{{$data->worder}}">
                                        </div>
                                    </div>
                                      <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">配置说明: <span class="tpl-form-line-small-title">wtips</span></label>
                                        <div class="am-u-sm-9">
                                            <textarea type="text" class="tpl-form-input" id="user-name" placeholder="请输入说明" name="wtips">{{$data->wtips}}</textarea>
                                        </div>
                                    </div>



                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
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
    <script>
    function showTr(obj){
        switch($(obj).val()){
            case 'input':
                $('.wvalue').hide();
                break;
            case 'textarea':
                $('.wvalue').hide();
                break;
            case 'radio':
                $('.wvalue').show();
        }

    }
    </script>
<script src="{{ asset('/admin/assets/js/amazeui.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/amazeui.datatables.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/app.js') }}"></script>
</body>

</html>
@endsection
