@extends('home.layouts.web_black')
@section('styles')
    <link rel="stylesheet" href="{{ asset('web/css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('web/css/index.css')}}">
    <script>
        (function () {
            var e = 'abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video'.split(', ');
            var i = e.length;
            while (i--) {
                document.createElement(e[i]);
            }
        })();
    </script>
    @endsection

@section('content')
    @include('home.public.menu_black')
    @include('home.profile.banner.banner_black')
    <!--精彩赛事-->
    <div class="container sports">
        <!--精彩赛事 图标-->
        <ul class="sports-icons">
            <li class="clicked">
                <a href="#">
                    <div class="icons">
                        <span class="icon-sports icon0"></span>
                    </div>
                    <span class="title">高尔夫球赛</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="icons">
                        <span class="icon-sports icon1"></span>
                    </div>
                    <span class="title">亲水运动季</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="icons">
                        <span class="icon-sports icon2"></span>
                    </div>
                    <span class="title">国际马拉松赛</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="icons">
                        <span class="icon-sports icon3"></span>
                    </div>
                    <span class="title">全民健身</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="icons">
                        <span class="icon-sports icon4"></span>
                    </div>
                    <span class="title">环岛自行车赛</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="icons">
                        <span class="icon-sports icon5"></span>
                    </div>
                    <span class="title">大帆船赛</span>
                </a>
            </li>
        </ul>
        <!--经常赛事 列表-->
        <div class="play-list clearfix">
            <div class="title">
                <h1>精彩赛事</h1>
            </div>
            <div class="list">
                <div class="bd">
                    <ul class="infoList">
                        <li>
                            <div class="content">
                                <p class="mb30">
                                    <span class="label">海南马拉松</span>
                                    <span class="info run">进行中</span>
                                </p>
                                <p class="mb20">
                                    <span><i class="icon-clock"></i>比赛时间</span>
                                    <span class="fr">2月26日</span>
                                </p>
                                <p>
                                    <span><i class="icon-address"></i>比赛城市</span>
                                    <span class="fr">三亚</span>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="content">
                                <p class="mb30">
                                    <span class="label">海南马拉松</span>
                                    <span class="info waiting">还有9天</span>
                                </p>
                                <p class="mb20">
                                    <span><i class="icon-clock"></i>比赛时间</span>
                                    <span class="fr">2月26日</span>
                                </p>
                                <p>
                                    <span><i class="icon-address"></i>比赛城市</span>
                                    <span class="fr">三亚</span>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="content">
                                <p class="mb30">
                                    <span class="label">海南马拉松</span>
                                    <span class="info run">进行中</span>
                                </p>
                                <p class="mb20">
                                    <span><i class="icon-clock"></i>比赛时间</span>
                                    <span class="fr">2月26日</span>
                                </p>
                                <p>
                                    <span><i class="icon-address"></i>比赛城市</span>
                                    <span class="fr">三亚</span>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="content">
                                <p class="mb30">
                                    <span class="label">海南马拉松</span>
                                    <span class="info waiting">还有9天</span>
                                </p>
                                <p class="mb20">
                                    <span><i class="icon-clock"></i>比赛时间</span>
                                    <span class="fr">2月26日</span>
                                </p>
                                <p>
                                    <span><i class="icon-address"></i>比赛城市</span>
                                    <span class="fr">三亚</span>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="content">
                                <p class="mb30">
                                    <span class="label">海南马拉松</span>
                                    <span class="info run">进行中</span>
                                </p>
                                <p class="mb20">
                                    <span><i class="icon-clock"></i>比赛时间</span>
                                    <span class="fr">2月26日</span>
                                </p>
                                <p>
                                    <span><i class="icon-address"></i>比赛城市</span>
                                    <span class="fr">三亚</span>
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class="content">
                                <p class="mb30">
                                    <span class="label">海南马拉松</span>
                                    <span class="info waiting">还有9天</span>
                                </p>
                                <p class="mb20">
                                    <span><i class="icon-clock"></i>比赛时间</span>
                                    <span class="fr">2月26日</span>
                                </p>
                                <p>
                                    <span><i class="icon-address"></i>比赛城市</span>
                                    <span class="fr">三亚</span>
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="hd">
                    <a href="javascript:;" class="arr-left next">
                        <img src="{{ asset('web/images/index/icon/arr-left.png') }}" width="7" height="8" alt="">
                    </a>
                    <a href="javascript:;" class="arr-right prev">
                        <img src="{{ asset('web/images/index/icon/arr-right.png')}}" width="7" height="8" alt="">
                    </a>
                </div>
            </div>

        </div>
    </div>
    <!--搜索框-->
    <div class="container search">
        <input type="text" placeholder="请输入关键词">
        <a href="javascript:;">
            <img src="{{ asset('web/images/index/icon/search.png')}}" width="28" height="28" alt="">
        </a>
    </div>
    <!--图片集-->
    <div class="container imgs">
        <ul class="clearfix">
            @foreach($data['picdata'] as $pic)
            <li>
                <a href="/golf/newsinfo?id={{$pic->id}}">
                    <img src="{{ $pic->cover }}" width="400" height="266" alt="">
                    <div class="info">
                        <h1>{{ $pic->name }}</h1>
                        <p>{{$pic->publishtime}}</p>
                    </div>
                </a>
            </li>
            @endforeach
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<img src="{{ asset('web/images/index/small1.jpg')}}" width="400" height="395" alt="">--}}
                    {{--<div class="info">--}}
                        {{--<h1>海南天景岛</h1>--}}
                        {{--<p>2017.11.20</p>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<img src="{{ asset('web/images/index/small2.jpg')}}" width="400" height="395" alt="">--}}
                    {{--<div class="info">--}}
                        {{--<h1>海南天景岛</h1>--}}
                        {{--<p>2017.11.20</p>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<img src="{{ asset('web/images/index/small3.jpg')}}" width="400" height="395" alt="">--}}
                    {{--<div class="info">--}}
                        {{--<h1>海南天景岛</h1>--}}
                        {{--<p>2017.11.20</p>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<img src="{{ asset('web/images/index/small4.jpg')}}" width="400" height="395" alt="">--}}
                    {{--<div class="info">--}}
                        {{--<h1>海南天景岛</h1>--}}
                        {{--<p>2017.11.20</p>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<img src="{{ asset('web/images/index/small5.jpg')}}" width="400" height="395" alt="">--}}
                    {{--<div class="info">--}}
                        {{--<h1>海南天景岛</h1>--}}
                        {{--<p>2017.11.20</p>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</li>--}}
        </ul>
    </div>
    <!--最新动态-->
    <div class="container news">
        <div class="title">
            <span class="new">NEWS</span>最新动态
            <div class="line"></div>
        </div>
        <ul class="listInfo clearfix">
            @foreach ($data['dynamic'] as $news)
                <li>
                    <div class="img">
                        <a href="/news/detail?id={{$news->news_uuid}}">
                            <img src="{{ $news->cover }}" width="180" height="119" alt="">
                        </a>
                    </div>
                    <div class="info">
                        <a href="/news/detail?id={{$news->news_uuid}}">{{ $news->news_title }}</a>
                        <p class="time">{{ $news->newtime }}</p>
{{--                        <p>{{ $news->news_intro }}</p>--}}
                    </div>
                </li>
                @endforeach

        </ul>
        <div class="moreNews hide">
            <a href="#">查看更多</a>
        </div>
    </div>
    <div class="container videos">
        <div class="title">
            <h1>精彩视频</h1>
            <div class="line"></div>
        </div>
        <div class="videoIndex">
            <a href="javascript:;" data-video="http://lsweb.oss-cn-shenzhen.aliyuncs.com/videos/2015%E6%B5%B7%E5%8D%97%E5%85%AC%E5%BC%80%E8%B5%9B%E5%AE%A3%E4%BC%A0%E7%89%87%E5%AD%97%E5%B9%95%E7%89%88.mov" class="imgHref">
                <video src="http://lsweb.oss-cn-shenzhen.aliyuncs.com/videos/2015%E6%B5%B7%E5%8D%97%E5%85%AC%E5%BC%80%E8%B5%9B%E5%AE%A3%E4%BC%A0%E7%89%87%E5%AD%97%E5%B9%95%E7%89%88.mov" width="465" height="265"></video>
            </a>
            <div class="info">
                <h3>2017海南公开赛宣传片</h3>
                <p>
                    海南体育赛事有限公司（简称“赛事公司”）成立于2008年，注册资本壹亿元，系
                    海南省文体厅旗下事业单位海南省体育赛事中心的全资子公司。 要负责运营海南岛
                    国际公路自行车赛、环海南岛国际大帆船赛、海南省高尔夫公开赛、海南（三亚）
                    国际马拉松四大品牌赛事。
                </p>
            </div>
        </div>
        <ul class="videoList clearfix">
            <li>
                <a href="javascript:;" data-video="http://lsweb.oss-cn-shenzhen.aliyuncs.com/videos/%E5%B9%BF%E5%B7%9E%E7%AB%99%E8%A7%86%E9%A2%91.mp4" class="imgHref">
                    <video src="http://lsweb.oss-cn-shenzhen.aliyuncs.com/videos/%E5%B9%BF%E5%B7%9E%E7%AB%99%E8%A7%86%E9%A2%91.mp4" width="220" height="125"></video>
                    <h3>
                        <span class="icon-move"></span>
                        2017海南公开赛
                    </h3>
                    <p>
                        <span>2017.10.21</span>
                        |
                        <span>2017海南公开赛</span>
                    </p>
                </a>
            </li>
            <li>
                <a href="javascript:;" data-video="http://hns.oss-cn-shenzhen.aliyuncs.com/video/23c482d1320733b01768fb31b14d4fc8.mp4" class="imgHref">
                    <video src="http://hns.oss-cn-shenzhen.aliyuncs.com/video/23c482d1320733b01768fb31b14d4fc8.mp4" width="220" height="125"></video>
                    <h3>
                        <span class="icon-move"></span>
                        广州站视频
                    </h3>
                    <p>
                        <span>2017.10.21</span>
                        |
                        <span>广州站视频</span>
                    </p>
                </a>
            </li>

            @for($i=0;$i<4;$i++)
            <li>
                <a href="javascript:;" data-video="http://lsweb.oss-cn-shenzhen.aliyuncs.com/videos/%E4%B8%9A%E4%BD%99%E8%B5%9B%E5%86%B3%E8%B5%9B%E8%BD%AE%E8%A7%86%E9%A2%91%E7%B4%A0%E6%9D%90.mov" class="imgHref">
                    <video src="http://lsweb.oss-cn-shenzhen.aliyuncs.com/videos/%E4%B8%9A%E4%BD%99%E8%B5%9B%E5%86%B3%E8%B5%9B%E8%BD%AE%E8%A7%86%E9%A2%91%E7%B4%A0%E6%9D%90.mov" width="220" height="125"></video>
                    <h3>
                        <span class="icon-move"></span>
                        业余赛决赛轮视频
                    </h3>
                    <p>
                        <span>2017.10.21</span>
                        |
                        <span>业余赛决赛轮视频</span>
                    </p>
                </a>
            </li>
            @endfor

        </ul>
    </div>
    <div class="container cooperation">
        <h1>商务合作</h1>
        <div class="line"></div>
        <h5>全球顶级赛事合作商</h5>
        <ul>
            @foreach($data['partner'] as $p)
            <li>
                <a href="#">
                    <img src="{{ $p->cover }}" width="320" height="215" alt="">
                    <div class="bg"></div>
                </a>
                <p>{{$p->name}}</p>
            </li>
            @endforeach
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<img src="{{ asset('web/images/index/coop1.jpg')}}" width="320" height="215" alt="">--}}
                    {{--<div class="bg"></div>--}}
                {{--</a>--}}
                {{--<p>All Categories Request for Quotation<br/>Wholesaler Market</p>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#">--}}
                    {{--<img src="{{ asset('web/images/index/coop2.jpg')}}" width="320" height="215" alt="">--}}
                    {{--<div class="bg"></div>--}}
                {{--</a>--}}
                {{--<p>All Categories Request for Quotation<br/>Wholesaler Market</p>--}}
            {{--</li>--}}
        </ul>
    </div>
    <div class="container friends">
@endsection

@section('scripts')
    <script src="{{ asset('web/js/jquery.1.11.3.min.js')}}"></script>
    <script src="{{ asset('web/js/jquery.SuperSlide.2.1.1.js')}}"></script>
    <script src="{{ asset('web/js/layer/layer.js')}}"></script>
    <script src="{{ asset('web/js/index.js')}}"></script>
    @endsection
