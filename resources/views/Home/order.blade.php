
@extends('layout/Hlayout')

@section('title')
    <title>订单成功页</title>
@endsection
@section('content')
    <link rel="stylesheet"  type="text/css" href="{{ asset('/home/AmazeUI-2.4.2/assets/css/amazeui.css') }}"/>
    <link href="{{ asset('/home/AmazeUI-2.4.2/assets/css/admin.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/home/basic/css/demo.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/home/css/sustyle.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ asset('/home/basic/js/jquery-1.7.min.js') }}"></script>

<div class="take-delivery">
 <div class="status">
   <h2>您已成功付款</h2>
   <div class="successInfo">
     <ul>
       <li>付款金额<em>¥{{ session('order')['ormb'] }}</em></li>
       <div class="user-info">
         <p>收货人：{{ session('order')['rec']  }}</p>
         <p>联系电话：{{ session('order')['tel']  }}</p>
         <p>收货地址：{{ session('order')['addr']  }}</p>
       </div>
             请认真核对您的收货信息，如有错误请联系客服

     </ul>

    </div>
  </div>
</div>
    <script src="{{ asset('/admin/assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
    <script>
        window.onload=function() {

            var wait = 3;
            layer.msg('下单成功,'+wait+'秒后跳转');
            timeOut();
            function timeOut() {
                if (wait == 1) {
                    window.location.href = '{{ url('/home/index') }}';
                    feedbackObj.fadeOut(100, function () {
                        feedbackObj.remove();

                    });
                    $('#opacity-mask').fadeOut(100);
                } else {
                    setTimeout(function () {
                        wait--;
                        layer.msg('下单成功,'+wait+'秒后跳转');
                        timeOut();
                    }, 1000)
                }
            }
        }
    </script>
@stop
