
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
       <li>付款金额<em>¥<?=$_SESSION['']['']?></em></li>
       <div class="user-info">
         <p>收货人：<?=$_SESSION['']['']?></p>
         <p>联系电话：<?=$_SESSION['']['']?></p>
         <p>收货地址：<?=$_SESSION['']['']?></p>
       </div>
             请认真核对您的收货信息，如有错误请联系客服
                               
     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="../person/order.html" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
        <a href="../person/orderinfo.html" class="J_MakePoint">查看<span>交易详情</span></a>
     </div>
    </div>
  </div>
</div>

@stop
