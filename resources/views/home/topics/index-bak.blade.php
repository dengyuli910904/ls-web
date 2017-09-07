@extends('home.layouts.web_without_banner')

@section('styles')
    <link rel="stylesheet" type="text/css" href="/css/web/reset.css">
    <link rel="stylesheet" type="text/css" href="/css/web/common.css">
    <link rel="stylesheet" type="text/css" href="/css/web/topic.css">


@section('header')
        <!--header-->
    <div class="header-wrapper">
        <div class="top-area layout-width">
            <img class="logo" src="./images/web/common/logo.png" />
            <div class="search-area">
                <div class="search-bar">
                    <form>
                        <input type="text" placeholder="Search for...">
                        <button type="submit"></button>
                    </form>
                </div>
  			<span class="login-area"><a class="login">登录</a> | <a>注册</a>
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
            专题列表 | LIST OF TOPICS
        </div>
    </div>
    <div class="line-1 layout-width"></div>
    <!--content-->
    <div class="content-wrapper">
        <ul class="item-list layout-width" id="newslist">
            @foreach($list as $k => $l)
                <li class="item">
                    <a href="/topics/{{ $l['id'] }}">
                        <img src="{{ $l['cover'] }}" />
                        <h3 class="title">{{ $l['title'] }}</h3>
                        <span class="pub-date">{{ $l['created_date'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="clear"></div>
@endsection

@section('javascript')
    @parent
    <script src="{{ asset('js/web/topics.js') }}"></script>
@endsection

@section('footer')
        <!--footer-->
    <div class="footer-wrapper">
        <div class="footer-area layout-width">
            <ul class="bottom-nav-area">
                <li>
                    <img class="bottom-logo" src="{{asset('images/web/logo_foot.png')}}" height="60" />
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
                    <img class="qrcode" src="./images/web/common/qrcode.png" />
                </li>
            </ul>
            <div class="clear"></div>
            <div class="copy-right">@2017-2018 海南体育 版权所有 关于海南体育 | 联系我们 | 合作模式 | 海ICP备00000000号-1</div>
        </div>
    </div>
@endsection