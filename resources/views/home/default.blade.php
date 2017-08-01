@extends('home.layouts.master')

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
            /*width:50%;*/
            width:33.3%;
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
        .caption .intro{ overflow: hidden; text-overflow:ellipsis; white-space: nowrap;}
        /*
        h2.titlebar:after{
            top:90px;
            width:100%;
            border-top:1px solid rgba(236,85,8,0.2);
        }
        */
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



        .pos{
            margin-top: 40px;
            margin-left: 20px;
            position: relative;
            color:#fff;
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
                <h3 class="titlebar"><a href="">新闻动态 | NEWS</a></h3>
                <ul>
                    @foreach ($data['news'] as $news)
                        <li class="item">
                            <span class="glyphicon glyphicon-triangle-right" style="color: #9a9a9a;" aria-hidden="true"></span>
                            <a href="/news/detail?id={{$news->id}}">{{$news->title}}
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

                <h2 class="titlebar">精选专题<p class="pt10"><small>SELECTED TOPICS</small></p></h2>
                <div class="row ptb20">

                    @foreach($data['topics'] as $i=>$topics)
                    <div class="col-md-4">
                        <div class="thumbnail text-center cursor-hand pt80 pb50">
                            <div class="circle-bg">
                                <i class="fa fa-3x fa-inverse">{{ $i+1 }}</i>
                            </div>
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
                <h3 class="titlebar"><a href="">赛事新闻 | CONTEST NEWS</a></h3>
                @for($i=0; $i<3; $i++)
                <div class="row" style="margin-top: 10px; margin-left: 5px">
                    <div class="col-md-2 " style="background-color: #25C365; height:140px">
                        <div class="pos">
                            <h5 style="font-size: 30px; font-weight: 500">06/15</h5>
                            <p>MARCH</p>
                        </div>
                    </div>
                    <div class="col-md-6" style="background-color: #f0f0f0; height:140px">
                        <h5 style="font-weight: 600">网球比赛</h5>
                        <p>近日,某国际学校举办网球公开赛,那英13岁的儿子也参加了比赛,可以看出一招一式非常娴熟。中场休息时,那英给儿子递水、拿球拍,悉心照顾</p>
                    </div>
                    <div class="col-md-4" style="height:140px">
                        <img src="{{ asset('images/img_2.png') }}" alt="" style="width:100%; height: 100%">
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>
    <!-- end 赛事新闻 -->

    @include('home.public.cooperative')

@endsection

@section('script')

@endsection