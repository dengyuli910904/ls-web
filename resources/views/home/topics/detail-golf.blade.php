@extends('home.layouts.web_without_banner')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/web/reset.css">
    <link rel="stylesheet" type="text/css" href="/css/web/common.css">
    <link rel="stylesheet" type="text/css" href="/css/web/detail.css">
@endsection

@section('header')
    <div class="header-wrapper">
        <div class="top-area layout-width">
            <img class="logo" src="/images/web/common/logo.png" />
            <div class="search-area">
                <div class="search-bar">
                    <form>
                        <input type="text" placeholder="Search for...">
                        <button type="submit"></button>
                    </form>
                </div>
  			    <span class="login-area"><a class="login">登录</a> | <a>注册</a></span>
            </div>
        </div>
        <div class="menu-area">
            <ul class="menu layout-width">
                <li><a href="{{url('/')}}">首页</a></li>
                <li><a href="{{url('/news')}}">最新发布</a></li>
                <li><a href="{{url('/hotnews')}}">热门新闻</a></li>
                <li><a href="{{url('/news')}}">推荐新闻</a></li>
                <li><a href="{{url('/topics')}}">专题报道</a></li>
                <li><a href="#">体育常识</a></li>
                <li><a href="#">关于我们</a></li>
            </ul>
        </div>
    </div>
@endsection

@section('content')
    <div class="breadcrumb-wrapper">
        <div class="breadcrumb layout-width">
            {{ $topics['title'] }}
        </div>
    </div>
    <!--content-->
    <div class="content-wrapper layout-width">
        <p class="desc">{{ $topics['intro'] }}</p>
        <ul class="item-list" id="newslist">
            @foreach($list as $k => $l)
            <li><a href="/newsdetail?id={{ $l['uuid'] }}"><img src="{{ $l['cover'] }}" /></a></li>
            @endforeach
        </ul>
    </div>
    <div class="clear"></div>
@endsection

@section('javascript')
    @parent
    <script type="text/javascript">
        /*
        var str = '';
        //        if(page=="") page='1';
        var page = 1;
        var stop=true;//触发开关，防止多次调用事件
        $(window).scroll( function(event){
//当内容滚动到底部时加载新的内容 100当距离最底部100个像素时开始加载.
            if ($(this).scrollTop() + $(window).height() + 10 >= $(document).height() && $(this).scrollTop() > 10) {
//if(stop==true){
//stop=false;
//var canshu="page/"+page+";
                var url = "/topics/{{ $topics['id'] }}";
                var parm = {'page': page};
                page = page + 1;//当前要加载的页码
//加载提示信息
                $("#newslist").append("<li class='ajaxtips'><div style='font-size:2em'>Loding…..</div><>");
                $.get(url, parm, function(data){
                    if( data.data.length == 0 ) {
                        $('.topics-bottom-center').html('已全部加载完');
                        return;
                    }
                    $.each(data.data, function(data, val) {
                        //console.log(val);
                        var str = '';
                        str += '<li><a href="/newsdetail/id=' + val.uuid + '"><img src="' + val.cover + '" /></a></li>';
                        $("#newslist").append(str);//把新的内容加载到内容的后面
                    });
                    stop=true;
                },'JSON')
            }
        });
*/
    </script>
@endsection

@section('footer')
    <div class="footer-wrapper detail-footer-bg">
        <div class="footer-area layout-width">
            <ul class="bottom-nav-area">
                <li>
                    <img class="bottom-logo" src="{{asset('images/web/logo_foot.png')}}" />
                </li>
                <li>
                    <span class="channel-name">海南体育赛事频道</span>
                </li>
                <li>
  			  <span class="contact-area">
  			  	<span>地址：深圳市南山区深南大道</span>
  			  	<span>邮箱：lily@livesong.cn</span>
  			  	<span>热线：86-0755-1234656</span>
  			  	<span>传真：86-0755-1234656</span>
  			  </span>
                    <img class="qrcode" src="/images/web/common/qrcode.png" />
                </li>
            </ul>
            <div class="clear"></div>
            <div class="copy-right">@2017-2018 海南体育 版权所有 关于海南体育 | 联系我们 | 合作模式 | 海ICP备00000000号-1</div>
        </div>
    </div>
@endsection