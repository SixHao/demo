@extends('layout/Hlayout')

@section('title')
    <title>网站首页</title>
@endsection
@section('content')

    <div class="shopNav">
        <div class="slideall">

            <div class="long-title"><span class="all-goods">全部分类</span></div>
            <div class="nav-cont">
                <ul>
                    <li class="index"><a href="#">首页</a></li>
                    <li class="qc"><a href="#">闪购</a></li>
                    <li class="qc"><a href="#">限时抢</a></li>
                    <li class="qc"><a href="#">团购</a></li>
                    <li class="qc last"><a href="#">大包装</a></li>
                </ul>

            </div>

            <!--侧边导航 -->
<div id="nav" class="navfull">
        <div class="area clearfix">
            <div class="category-content" id="guide_2">

                <div class="category">
                    <ul class="category-list" id="js_climit_li">
                        @foreach($cates as $k1=>$v1 )
                        <li style="height: 43px;" class="appliance js_toggle relative first">
                            <div class="category-info">
                                <h3 class="category-name b-category-name"><i><img src="{{ asset('/Home/images/cake.png') }}"></i><a href="{{ url('/home/goodslist') }}/{{ $v1->tid }}" class="ml-22" title="点心">{{ $v1->tname }}</a></h3>
                                <em>&gt;</em></div>
                            <div class="menu-item menu-in top"  style=" background-color: rgba(255,255,255,0.7);border:0px;width:1085px;">
                                <div class="area-in" >
                                    <div class="area-bg">
                                        <div class="menu-srot">
                                            <div class="sort-side">
                                                @foreach($v1['sub'] as $k2=>$v2)
                                                <dl class="dl-sort"  ">
                                                    <dt><a href="{{ url('/home/goodslist') }}/{{ $v2->tid }}" title="蛋糕">{{ $v2->tname }}</a></dt>
                                                    @foreach($v2['sub'] as $k3 => $v3)
                                                    <dd><a title="蒸蛋糕" href="{{ url('/home/goodslist') }}/{{ $v3->tid }}"><span style="color: #000;">{{ $v3->tname }}</span></a></dd>
                                                    @endforeach
                                                </dl>
                                                @endforeach

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <b class="arrow"></b>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </div>


    <!--轮播-->

            <script type="text/javascript">
                (function() {
                    $('.am-slider').flexslider();
                });
                $(document).ready(function() {
                    $("li").hover(function() {
                        $(".category-content .category-list li.first .menu-in").css("display", "none");
                        $(".category-content .category-list li.first").removeClass("hover");
                        $(this).addClass("hover");
                        $(this).children("div.menu-in").css("display", "block")
                    }, function() {
                        $(this).removeClass("hover")
                        $(this).children("div.menu-in").css("display", "none")
                    });
                })
            </script>



    <!--小导航 -->
    <div class="am-g am-g-fixed smallnav">
        <div class="am-u-sm-3">
            <a href="sort.html"><img src="{{ asset('/Home/images/navsmall.jpg') }}" />
                <div class="title">商品分类</div>
            </a>
        </div>
        <div class="am-u-sm-3">
            <a href="#"><img src="{{ asset('/Home/images/huismall.jpg') }}" />
                <div class="title">大聚惠</div>
            </a>
        </div>
        <div class="am-u-sm-3">
            <a href="#"><img src="{{ asset('/Home/images/mansmall.jpg') }}" />
                <div class="title">个人中心</div>
            </a>
        </div>
        <div class="am-u-sm-3">
            <a href="#"><img src="{{ asset('/Home/images/moneysmall.jpg') }}" />
                <div class="title">投资理财</div>
            </a>
        </div>
    </div>

    <!--走马灯 -->

    {{--<div class="marqueen">--}}
        {{--<span class="marqueen-title">商城头条</span>--}}
        {{--<div class="demo">--}}

            {{--<ul>--}}
                {{--<li class="title-first"><a target="_blank" href="#">--}}
                        {{--<img src="{{ asset('/Home/images/TJ2.jpg') }}">--}}
                        {{--<span>[特惠]</span>商城爆品1分秒--}}
                    {{--</a></li>--}}
                {{--<li class="title-first"><a target="_blank" href="#">--}}
                        {{--<span>[公告]</span>商城与广州市签署战略合作协议--}}
                        {{--<img src="{{ asset('/Home/images/TJ.jpg') }}">--}}
                        {{--<p>XXXXXXXXXXXXXXXXXX</p>--}}
                    {{--</a></li>--}}

                {{--<div class="mod-vip">--}}
                    {{--<div class="m-baseinfo">--}}
                        {{--<a href="../person/index.html">--}}
                            {{--<img src="{{ asset('/Home/images/getAvatar.do.jpg') }}">--}}
                        {{--</a>--}}
                        {{--<em>--}}
                            {{--Hi,<span class="s-name">小叮当</span>--}}
                            {{--<a href="#"><p>点击更多优惠活动</p></a>--}}
                        {{--</em>--}}
                    {{--</div>--}}
                    {{--<div class="member-logout">--}}
                        {{--<a class="am-btn-warning btn" href="{{ asset('/Home/login.html') }}">登录</a>--}}
                        {{--<a class="am-btn-warning btn" href="{{ asset('/Home/register.html') }}">注册</a>--}}
                    {{--</div>--}}
                    {{--<div class="member-login">--}}
                        {{--<a href="#"><strong>0</strong>待收货</a>--}}
                        {{--<a href="#"><strong>0</strong>待发货</a>--}}
                        {{--<a href="#"><strong>0</strong>待付款</a>--}}
                        {{--<a href="#"><strong>0</strong>待评价</a>--}}
                    {{--</div>--}}
                    {{--<div class="clear"></div>--}}
                {{--</div>--}}

                {{--<li><a target="_blank" href="#"><span>[特惠]</span>洋河年末大促，低至两件五折</a></li>--}}
                {{--<li><a target="_blank" href="#"><span>[公告]</span>华北、华中部分地区配送延迟</a></li>--}}
                {{--<li><a target="_blank" href="#"><span>[特惠]</span>家电狂欢千亿礼券 买1送1！</a></li>--}}

            {{--</ul>--}}
            {{--<div class="advTip"><img src="{{ asset('/Home/images/advTip.jpg') }}"/></div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="clear"></div>
    </div>
    <script type="text/javascript">
        if ($(window).width() < 640) {
            function autoScroll(obj) {
                $(obj).find("ul").animate({
                    marginTop: "-39px"
                }, 500, function() {
                    $(this).css') }}({
                    marginTop: "0px"
                }).find("li:first").appendTo(this);
            })
        }
        $(function() {
            setInterval('autoScroll(".demo")', 3000);
        })
        }
    </script>
    </div>

<div class="banner">
    <!--轮播 -->
    <div class="am-slider am-slider-default scoll" data-am-flexslider id="demo-slider-0">
        <ul class="am-slides">
            @foreach($banner as $k=>$v)
            <li class="banner1"><a href="{{ $v->url }}"><img style="width: 1350px; margin-left: -1350px;" src="{{ $v->src }}" /></a></li>
            @endforeach
        </ul>
    </div>
    <div class="clear"></div>
</div>

    <!--热门活动 -->

    <div class="am-container activity ">
        <div class="shopTitle ">
            <h4>活动</h4>
            <h3>每期活动 优惠享不停 </h3>

        </div>
        <div class="am-g am-g-fixed ">
            @foreach($active as $k=>$v)
            <div class="am-u-sm-3 ">
                <div class="icon-sale
                @if($k == 1)
                        one
                    @elseif($k == 2)
                        two
                    @elseif($k == 3)
                        three
                    @elseif($k == 4)
                        four
                    @endif
                "></div>
                <h4>
                    @if($v->atype == 1)
                        秒杀
                    @elseif($v->atype == 2)
                        特惠
                    @elseif($v->atype == 3)
                        团购
                    @elseif($v->atype == 4)
                        超值
                    @endif
                </h4>
                <div class="activityMain ">
                    <a href="{{ url('/home/detials') }}/{{ $v->gid }}"> <img width="296px;" height="296px;" src="{{ $v->apic }} "></a>
                </div>
                <div class="info ">
                    <h3>{{ $v->aname }}</h3>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <div class="clear "></div>


    @foreach($data as $k=>$v)
        @if($v['pid'] == 0)
    <div id="f{{ floor(($k/3))+1 }}">
        <!--甜点-->

        <div class="am-container ">
            <div class="shopTitle ">
                <h4>{{ $v['tname'] }}</h4>
                <div class="today-brands ">
                    @foreach($data as $k2=>$v2)
                        @if($v2['pid'] == $v['tid'])
                    <a href="# ">{{ $v2['tname'] }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

        <div class="am-g am-g-fixed floodFour" style="overflow: hidden;height: 480px;">
            <div class="am-u-sm-5 am-u-md-4 text-one list ">
                <div class="word" style="overflow: hidden;width: 240px; height: 150px;">
                    @foreach($data as $k2=>$v2)
                        @if($v2['pid'] == $v['tid'])
                            @foreach($data as $k3=>$v3)
                                @if($v3['pid'] == $v2['tid'])
                                    @foreach($goods as $val)
                                        @if($v3['tid'] == $val['tid'])
                    <a class="outer" href="{{ url('/home/goodslist') }}/{{ $val['gid'] }}"><span class="inner"><b class="text">{{ $v3['tname'] }}</b></span></a>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                </div>
                <a href="#">
                    <div class="outer-con ">
                        <div class="title ">
                            开抢啦！
                        </div>
                        <div class="sub-title ">
                            精美大礼包
                        </div>
                    </div>
                    @foreach($data as $k2=>$v2)
                        @if($v2['pid'] == $v['tid'])
                            @foreach($data as $k3=>$v3)
                                @if($v3['pid'] == $v2['tid'])
                                    @foreach($goods as $val)
                                        @if($val['tid'] == $v3['tid'])
                                            <img src="{{ $val['gpic'] }}" style="width:210px; height: 210px;" />
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </a>

                <div class="triangle-topright"></div>
            </div>

            @foreach($data as $k2=>$v2)
                @if($v2['pid'] == $v['tid'])
                    @foreach($data as $k3=>$v3)
                        @if($v3['pid'] == $v2['tid'])
                            @foreach($goods as $val)
                                @if($val['tid'] == $v3['tid'])
                                    <div class="am-u-sm-7 am-u-md-4 text-two">
                                        <div class="outer-con ">
                                            <div class="title " style="width: 185px;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;
">
                                                {{ $val['gname'] }}
                                            </div>
                                            <div class="sub-title ">
                                                ¥{{ $val['gprice'] }}
                                            </div>
                                        </div>
                                        <a href="{{ url('/home/details') }}/{{ $val['gid'] }}"><img width="180px;" height="180px;" src="{{ $val['gpic'] }}" /></a>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        <div class="clear "></div>
    </div>


    @endif
@endforeach
@stop()