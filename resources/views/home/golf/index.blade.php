@extends('home.layouts.golf')
@section('title','海南体育赛事')
@section('styles')

    <style>

        /*---- 公共部分 -----*/
        *{margin:0; padding:0}
        ul,ol,li{ list-style:none; }

        .w1320 { width:1320px; }
        .w1000{ width: 1000px;}

        .hlh80{ height:80px; line-height:80px}
        .hlh100{ height:100px; line-height:100px}

        .ptb10 { padding: 10px  0; }/*padding-top & padding botton is 10px */
        .ptb20 { padding: 20px  0; }
        .ptb50 { padding: 50px  0; }

        .pt10{ padding-top: 10px; }
        .pt80{ padding-top: 80px; }

        .pb50{ padding-bottom: 50px; }
        .pb20{ padding-bottom: 20px;}
        /*----- end 公共 -----*/
        .container{ padding-left: 0px; padding-right: 0px;}

        /* 头部背景图*/
        .site-branding-area .row.header-bg{
            background: url('{{ asset("images/golf/banner.png")}}');
            height: 240px;
            margin: 40px 0px 0px 0px;
        }
        .site-branding-area .row h2{
            color: #fff;
            line-height: 240px;
            text-align: center;
            font-size: 30px;
        }

        .form-control:focus {
            border-color: #f29000;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(236, 85, 8, 0.6);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(236, 85, 8, 0.6);
        }

        a{
            color: #9a9a9a;
            text-decoration: none;
        }

        a:hover, a:focus{
            color: #f29000;
            text-decoration: none;
        }

        .menubg{
            background-color: #fff;
            height:60px;
        }

        /*----- 导航 ----- */
        .navbar-hns{
            margin-bottom: 0px;
        }
        .nav > li {
            margin-top:15px;
            margin-bottom:15px;

        }

        .nav > li > a {
            position: relative;
            display: inline-block;
            padding:2px 39px;
            /*border-right:0.5px solid #ffffaa;*/
        }

        .nav > li > a:hover, .nav > li > a:focus{
            text-decoration:none;
            background-color: transparent;
        }

        .navbar-hns .navbar-nav > li > a {
            color: #000;
            font-family: "Microsoft YaHei UI";
            font-weight: 700;
            font-size: 20px;
        }
        /*---- end 导航 -----*/
        /* 轮播图*/
        /*a.carousel-control{ top: 20px;}*/
        #banner .container{ width: 1000px;}
        #banner .carousel-inner{ height: 100%;}
        /*titlebar*/
        h4.titlebar{
            /*color: #000;*/
            font-weight: 700;
            line-height: 45px;
        }
        h4.titlebar a{
            color: #000;
        }
        h4.titlebar:before{
            display: block;
            left: 0;
            content: '';
            height: 0;
            width: 100%;
            background-color: #000;
        }
        h4.titlebar:after{
            display: block;
            left: 0;
            content: '';
            height: 9px;
            width: 100%;
            background: url("{{ asset('images/golf/line-bg-2.png') }}") no-repeat;
            border-top: 1px solid  #e8e8e8;
        }

       /* h3.titlebar{
            margin-bottom: 15px;
            height: 30px;
            font-size: 18px;
            line-height: 30px;
            font-weight: 700;
            text-indent: 20px;
            position: relative;
        }
        h2.titlebar:before, h2.titlebar:after,h3.titlebar:before, h3.titlebar:after{
            display: block;
            left:5px;
            content:'';
            position:absolute;
        }
        h3.titlebar:before{
            top:5px;
            width:5px;
            height:25px;
            background:#ec5508;
        }*/
        /*
        h3.titlebar:after{
            top:36px;
            width:100%;
            border-top:1px solid #ececec;
        }*/

        /*---- 新闻 -----*/
        .news-area p{
            word-wrap:break-word; 
            word-break:normal; 
            position: relative;
            line-height: 2rem;
            height: 7rem;
            overflow: hidden;
            clear: both;
        }
        .news-area li{
            position: relative;
            float:left;
            width:100%;
            /*width:33.3%;*/
            line-height:30px;
            font-size:14px;
            overflow: hidden;
            -ms-text-overflow: ellipsis;
            text-overflow: ellipsis;
            white-space:nowrap;
            box-sizing:border-box;
            text-indent: 3px;
            padding: 20px 0px;
            color: #000;
            font-size: 16px;
            word-wrap:break-word;
            word-break:break-all
        }
        .news-area li h4{
            font-size: 16px;
            font-weight: 700;
        }
        .news-area li:first-child:before{
            content: '';
            border: none;
            height: 0px;
            margin-bottom: 0px;
        }
        .news-area li:before{
            display: block;
            content: "";
            width: 99%;
            height: 10px;
            left: 0;
            top: 0px;
            margin-bottom: 20px;
            /*background: #ddd;*/
            border-top:1px solid #ddd;
        }
        /*.news-area li:after{
            display: block;
            content: "";
            width: 99%;
            height: 1px;
            left: 0;
            top: -100px;
            margin-bottom: 10px;
            background: #ddd;
        }*/
        .news-area li > a{
            margin-left:10px;
        }
        .news-area li .tags{
            color: rgb(250,0,0);
            border:1px solid #ddd;
            padding: 5px 15px;
            margin-right: 5px;
        }

        /*精彩图说*/
        .news-pic .caption{
            /*height: 100px;*/
            padding: 20px 0;
        }
        .news-pic .caption h4{
            font-weight: 700;
        }
        /*----- 专题  ----*/
        /*.topic-area h2.titlebar{
            text-align: center; !important;
            font-size: 30px;
            color:#2b2a2a;
            font-weight: 400;
            position: relative;
        }
        .caption a{ color: #333;}
        .caption a:hover{ color: #333;}
        .caption h4{ overflow: hidden; text-overflow:ellipsis; white-space: nowrap;}
        .caption .intro{ 
            position: relative;
            line-height: 2rem;
            height: 6rem;
            overflow: hidden;
        }
        .caption .intro::after{
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            padding: 0 20px 1px 45px;
        }*/
        
        /*h2.titlebar:after{
            top:90px;
            width:100%;
            border-top:1px solid #ececec;
        }*/

        /* 赛事行程安排 */
        #schedule{
            background: #eee;
            background: rgb(238,238,238,0.3);
            padding: 20px 0px;
        }
        #schedule .container{
            
            /*opacity: 0.3;*/
        }
        #schedule h4{
            color: #000;
            font-size: 20px;
            font-weight: 700;
            padding-left: 10px;
        }
        #schedule h4:before{
            content: '';
            width: 0px;
            height: 0px;
        }
        #schedule ul{
            width: 100%;
            padding: 10px;
        }
        #schedule ul li{
            width: 50%;
            float: left;
            padding: 5px 0;

            /*display: table;*/
        }
        #schedule ul li span{
            color: #000;
            font-size: 16px;
            padding: 10px 20px;
        }
        /* 赛事行程安排 */

        /* 视频新闻 */
        .news-video video{
            /*border: 1px solid #eee;*/
            width: 100%;
            max-height: 350px;
            background: rgb(30,30,30);
            border-radius: 10px 10px 0px 0px;
        }
        .news-video .video-list{
            margin-top:-5px;
        }
        .news-video .video-list ul{
            display: table;
            width: 100%;
        }
        .news-video .video-list ul li{
            float: left;
            width: 33.33%;
            background: #e9611d;
            opacity: 0.5;
            line-height: 50px;
            color: #000;
            text-align: center;
            padding:0 30px; 
            font-weight: 700;

        }
        .news-video .video-list ul li.hover{
            /*background: #e9611d;*/
            opacity: 0.3;
        }
        /*--- footer ---*/
        .footer-area{
            background-color: #052a1d;
        }
        .footer-area .partner-list:after{
            content: '';
            height: 1px;
            width: 100%;
            background: #eee;
            top: 100%;
            left: 0;
        }
        .footer-area ul{
            width: 50%;
            margin-left: 25%;
        }
        .footer-area ul:before{
            
        }
        .footer-area ul li{
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            padding: 10px 30px;
        }

        .cr{
            color:#fff;
        }

        .cr .col-md-4{
            height:60px;
            border-right: 0.5px solid rgba(255,255,255,0.3);
        }



    </style>
@endsection

@section('content')


    {{--  @include('home.libs.video') --}}

    <!-- 比赛动态 -->
    <section id="dynamic">
        <div class="news-area">
            <div class="container w1000 ptb50">

                <h4 class="titlebar"><a href="/news">比赛动态</a></h4>
                <ul>
                    @foreach ($data['dynamic'] as $news)
                        <li class="item">
                            <!-- <div class="row"> -->
                                <div class="col-md-8">
                                    <h4><a href="/news/detail?id={{$news->news_id}}">标题：{{$news->news_title}}</a></h4>
                                    <p class="intro">
                                        {{$news->news_intro}}
                                    </p>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <span class="tags">海南赛事</span>
                                            <span class="tags">高尔夫</span>
                                        </div>
                                        <div class="col-md-3" style="text-align:right;">
                                            {{$news->news_time}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 t-r" style="text-align:right;" >
                                    <img src="{{$news->cover}}" style="width:360px; height:200px;" onerror="this.src='{{asset('web/img/news/no-img.jpg')}}'">
                                </div>
                            <!-- </div> -->
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </section>
    <!-- end 新闻动态 -->

    <!-- start 赛程安排 -->
     @include('home.profile.schedule')
    <!-- <section id="schedule" name="schedule">
        <div class="container w1320">
            <h4 class=""><a href="javascript:void(0)">2017海南公开赛赛程安排</a></h4>
            <div class="row">
                <ul>
                    @for($i = 0; $i<10 ;$i++)
                        <li>
                            <span>7.5 00:00</span>
                            <span>法国0-1德国</span>
                            <span>集锦</span>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </section> -->
    <!-- end 赛程安排 -->

    <!-- 精彩图说 -->
    <section>
        <div class="news-pic" id="news-pic">
            <div class="container w1000 ptb20">
                <h4 class="titlebar"><a href="javascript:void(0);">精彩图说</a></h4>
                <div class="row ptb20">

                     @foreach ($data['picdata'] as $pic)
                        <div class="col-sm-3 col-md-3">
                            <div class="thumbnail">
                              <img alt="{{$pic->name}}" style=" max-height: 320px;" src="{{ $pic->cover}}"  class="img-responsive" data-holder-rendered="true">
                              <div class="caption text-center">
                                <h4><a href="/golf/newsinfo?id={{$pic->id}}">{{$pic->name}}</a></h4>
                              </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- end 精彩图说 -->

    <!-- 独家视频 -->
    <section>
        <div class="news-video" id="news-video">
            <div class="container w1000 ptb20">

                <h4 class="titlebar"><a href="javascript:void(0);">独家视频</a></h4>
                <div class="row ptb20">
                    <!-- <div> -->
                        <video width="100%" controls="controls" src="{{ asset('videos/golf/VID_20170323_193609.mp4') }}">
                            
                        </video>
                        <div class="video-list">
                            <ul>
                                <li>2017高尔夫北京巡回赛开幕式</li>
                                <li class="hover">2017高尔夫北京巡回赛开幕式</li>
                                <li>2017高尔夫北京巡回赛开幕式</li>
                            </ul>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- end 独家视频 -->

    <!-- 高端旅游 -->
    <section>
        <div class="contest-area" id="contest-area">
            <div class="container w1000 pt20 pb50">
                <h4 class="titlebar"><a href="javascript:void(0);">高端旅游</a></h4>
                <div class="row ptb20">
                    <ul>
                        <li class="col-md-4 text-center">
                           <a href="javascript:void(0);"><img src="{{ asset('images/golf/lv-img0.png') }}" class="img-responsive"></a>
                        </li>
                         <li class="col-md-4 text-center">
                            <a href="javascript:void(0);"><img src="{{ asset('images/golf/lv-img1.png') }}" class="img-responsive"></a>
                        </li>
                         <li class="col-md-4 text-center">
                            <a href="javascript:void(0);"><img src="{{ asset('images/golf/lv-img2.png') }}" class="img-responsive"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- end 高端旅游 -->

   
@endsection

@section('script')

@endsection