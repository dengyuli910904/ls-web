@extends('home.layouts.master')
@section('title','海南体育赛事')
@section('styles')

    <style>

        /*---- 公共部分 -----*/
        *{margin:0; padding:0}
        ul,ol,li{ list-style:none; }

        .w1000 { width:1000px; }

        .hlh80{ height:80px; line-height:80px}
        .hlh100{ height:100px; line-height:100px}

        .ptb10 { padding: 10px  0; }/*padding-top & padding botton is 10px */
        .ptb20 { padding: 20px  0; }

        .pt10{ padding-top: 10px; }
        .pt80{ padding-top: 80px; }

        .pb50{ padding-bottom: 50px; }
        /*----- end 公共 -----*/

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
            background-color: #f29000;
            height:60px;
        }

        /*----- 导航 ----- */
        .nav > li {
            margin-top:15px;
            margin-bottom:15px;

        }

        .nav > li > a {
            position: relative;
            display: inline-block;
            padding:2px 30px;
            border-right:0.5px solid #ffffaa;
        }

        .nav > li > a:hover, .nav > li > a:focus{
            text-decoration:none;
            background-color: transparent;
        }

        .navbar-hns .navbar-nav > li > a {
            color: #fff;
            font-family: "Microsoft YaHei UI";
            font-size: 20px;
        }


        /*---- end 导航 -----*/
         /*二级菜单样式*/
        .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
            background-color: #f29000;
            border-color: #ffffaa;
        }
        .dropdown-menu>li>a {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: 500;
            font-size: 16px;
            line-height: 1.72857143;
            color: #333;
            white-space: nowrap;
        }
        .dropdown-menu {
            border: 1px solid #f29000;
            /*top: 150%;*/
        }
        /*End 二级菜单样式*/



        /*titlebar*/
        h3.titlebar{
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
        }
        /*
        h3.titlebar:after{
            top:36px;
            width:100%;
            border-top:1px solid #ececec;
        }*/

        /*---- 新闻 -----*/
        .news-area li{
            position: relative;
            float:left;
            width:50%;
            /*width:33.3%;*/
            line-height:30px;
            font-size:14px;
            overflow: hidden;
            -ms-text-overflow: ellipsis;
            text-overflow: ellipsis;
            white-space:nowrap;
            box-sizing:border-box;
            text-indent: 3px;
        }
        .news-area li > a{
            margin-left:10px;
        }

        /* 顺序数字圆形小图标
        .news-area li.toprank_blue a i {
            color: #3498db;
            border-color: #3498db;
        }
        .news-area li a i {
            display: block;
            top: 5px;
            left: 0;
            width: 18px;
            height: 18px;
            line-height: 16px;
            font-style: normal;
            color: #aab2bd;
            text-align: center;
            font-size: 12px;
            border: 1px #aab2bd solid;
            border-radius: 100%;
            position: absolute;
        }*/

        /*----- 专题  ----*/
        .topic-area h2.titlebar{
            text-align: center; !important;
            font-size: 30px;
            color:#2b2a2a;
            font-weight: 400;
            position: relative;
        }
        .caption a{ color: #333;}
        .caption a:hover{ color: #333;}
        .caption h4{ overflow: hidden; text-overflow:ellipsis; white-space: nowrap;}
        .caption .intro{ /*overflow: hidden; text-overflow:ellipsis; white-space: nowrap;*/
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
        }
        
        /*h2.titlebar:after{
            top:90px;
            width:100%;
            border-top:1px solid #ececec;
        }*/
        
        .circle-bg {
            width:150px;
            height:150px;
            -webkit-border-radius:50%;
            -moz-border-radius:50%;
            border-radius:50%;
            border:30px solid #fdedec;
            display: inline-block;
            box-sizing: border-box;
            background-color: red;
            padding-top: 25px;

        }

        .circle-bg:hover{
            border:30px solid #25c365;
        }

        .cursor-hand{
            cursor:pointer;
        }

        .cursor-hand:hover{
            background-color: #f7f8f8;
        }


        /*赛事新闻*/
        .contest-area div.row{
            /*margin-right: 0px;*/
            margin-left: 0px;
        }
        .contest-area .row.new-item{
            margin-top: 10px; 
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        }
        .contest-area .new-item h4 a{
            color: #333;important!
            /*font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;*/
        }
        .contest-area .new-item h4 a:hover{
            color: #f29000;important!
        }
        .contest-area .new-item .match-title{
            position: relative;
            line-height: 2rem;
            height: 2rem;
            overflow: hidden;
        }
        .contest-area .new-item .match-title::after{
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            padding: 0 20px 1px 45px;
        }
        .contest-area .new-item p.intro{
            position: relative;
            line-height: 2rem;
            height: 4rem;
            overflow: hidden;
        }
        .contest-area .new-item p.intro::after{
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            padding: 0 20px 1px 45px;
        }
        /*h4 a.match-title:hover{
            color: #f29000;important!
        }*/
        .pos{
            margin-top: 40px;
            /*margin-left: 20px;*/
            position: relative;
            color:#fff;
            text-align: center;
        }
        .square{
            padding-left: 10px;
            background-color: #25C365; 
            height:140px
        }
        .square:hover{
            cursor: pointer;
            background-color: rgb(250,0,0);
        }


        /*--- footer ---*/
        .footer-area{
            background-color: #535353;
        }

        .cr{
            color:#fff;
        }

        .cr .col-md-4{
            height:60px;
            border-right: 0.5px solid rgba(255,255,255,0.3);
        }


        /*合作伙伴*/
        #cooperative li{
            width: 16.666666667%;
            float: left;
            margin-bottom: 20px;
            text-align: center;
            /*padding: 5px;*/
        }
        #cooperative li img{
           height: 50px;
           text-align: center;
           /*width: 100%;*/
        }
        /*end 合作伙伴*/


    </style>
@endsection

@section('content')


    {{--  @include('home.libs.video') --}}

    <!-- 新闻动态 -->
    <section>
        <div class="news-area">
            <div class="container w1000 ptb20">

                <h3 class="titlebar"><a href="/news">新闻动态 | NEWS</a></h3>
                <ul>
                    @foreach ($data['dynamic'] as $news)
                        <li class="item">
                            <span class="glyphicon glyphicon-triangle-right" style="color: #9a9a9a;" aria-hidden="true"></span>
                            <a href="/news/detail?id={{$news->news_uuid}}">{{$news->news_title}}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </section>
    <!-- end 新闻动态 -->

    <!-- 精选专题 -->
    <section>
        <div class="topic-area">
            <div class="container w1000 ptb20">
                <h2 class="titlebar"><a href="/topics">精选专题</a><p class="pt10"><small>SELECTED TOPICS</small></p></h2>
                <div class="row ptb20">

                    @foreach($data['topics'] as $i=>$topics)
                    <div class="col-md-4">
                        <div class="thumbnail text-center cursor-hand pt80 pb50">
                            <a href="/topics/{{$topics->topics_id }}" class="circle-bg">
                                <i class="fa fa-3x fa-inverse">{{ $i+1 }}</i>
                            </a>
                            <div class="caption">
                                <h4><a href="/topics/{{$topics->topics_id }}">{{$topics->title}}</a></h4>
                                <p class="intro">{{$topics->intro}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- end 精选专题 -->

    <!-- 赛事新闻 -->
    <section>
        <div class="contest-area">
            <div class="container w1000 ptb20 pb50">
                <h3 class="titlebar"><a href="/news">赛事新闻 | CONTEST NEWS</a></h3>
                @foreach($data['match'] as $match)
                <div class="row new-item" style="margin-top: 10px; margin-left: 5px">
                    <div class="col-md-2 square" style="">
                        <div class="pos">
                            <h5 style="font-size: 30px; font-weight: 500">{{date('m/d',time($match->created_at))}}</h5>
                            <p>{{date('F',time($match->created_at))}}</p>
                        </div>
                    </div>
                    <div class="col-md-6" style="background-color: #f0f0f0; height:140px">
                        <h4 class="pd-t-20" style="padding-top:15px;">
                        <a class="match-title" href="/news/detail?id={{$match->news_uuid}}">{{$match->news_title}}</a></h4>
                        <p class="intro">
                            {{$match->news_intro}}
                        </p>
                    </div>
                    <div class="col-md-4" style="height:140px">
                        <img src="{{$match->news_cover}}" alt="" style="width:100%; height: 100%">
                    </div>
                </div>
                @endforeach
                <!-- <div class="row new-item" style="margin-top: 10px; margin-left: 5px">
                    <div class="col-md-2 square" style="">
                        <div class="pos">
                            <h5 style="font-size: 30px; font-weight: 500">08/12</h5>
                            <p>222</p>
                        </div>
                    </div>
                    <div class="col-md-6" style="background-color: #f0f0f0; height:140px">
                        <h4 class="pd-t-20" style="padding-top:15px;">
                        <a class="match-title" href="/news/detail?id=1">梵蒂冈梵蒂冈反对</a></h4>
                        <p>
                            梵蒂冈地方官
                        </p>
                    </div>
                    <div class="col-md-4" style="height:140px">
                        <img src="#" alt="" style="width:100%; height: 100%">
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- end 赛事新闻 -->

    @include('home.public.cooperative')
@endsection

@section('script')

@endsection