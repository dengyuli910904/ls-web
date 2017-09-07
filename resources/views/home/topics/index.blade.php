@extends('home.layouts.web')
@section('title','最新新闻')
@section('styles')
    @parent
    <!-- <link href="{{ asset('web/css/agency.css')}}" rel="stylesheet"> -->
    <link href="{{ asset('css/web/web.css')}}" rel="stylesheet">
    <style type="text/css">

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
        
        h3.titlebar:after{
            top:45px;
            width:100%;
            border-top:1px solid #ececec;
        }

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

        /*----- 专题  ----*/
        .topic-area h2.titlebar{
            text-align: center; !important;
            font-size: 30px;
            color:#2b2a2a;
            font-weight: 400;
            position: relative;
        }

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
            text-align: center;
            padding: 5px;
        }
        #cooperative li img{
        }
        /*end 合作伙伴*/

        /*Start 专题列表*/
       /* .list li{
            margin-left: 0px;
            margin-right: 0px;
        }*/
        .list li{ font-size: 16px;}
        .list li img{
            margin-left: 0px;
            margin-right: 0px;
        }
        .list li h4{ font-weight: 500; font-size: 23px;}
        .list li h4 a:hover{ color: rgb(250,0,0);}
        li img{ border:1px solid #ddd;}
        .list li .intro{
            line-height: 23px;
            height: 90px;
            overflow: hidden;
        }
        .list li .title a{
            line-height: 30px;
            height: 30px;
            overflow: hidden;
        }
        /*.list li span{ padding: 10px 10px;}*/
        /*End 新闻列表*/
    </style>
@endsection
@section('content')
    <section style="padding:10px 0;">
        <div class="container w1000">
            <div id="myCarousel" class="carousel slide">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="{{asset('images/web/topics/banner.png')}}" alt="First slide">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pd-t-20 pd-b-50">
        <div class="container w1000 ptb20">
            <h3 class="titlebar pd-b-50"><a href="#">专题列表 | LIST OF TOPICS</a></h3>
            <ul class="list">
            @foreach($list as $val) 
                <!-- 一条新闻开始 -->
                <li>
                    <h4 class="pd-t-20 pd-b-10"><a href="/topics/{{ $val['id'] }}">{{$val->title}}</a></h4>
                    <div class="row border-b pd-b-20"> 
                        <div class="col-md-3 t-l">
                            <img src="{{$val->cover}}" width="180px" height="120px;" onerror="this.src='{{asset('images/web/news/no-img.jpg')}}'">
                        </div>
                        <div class="col-md-9">
                            <div class="intro">
                                {{$val->intro}}
                            </div>
                            <div class="row">
                                <div class="col-md-4 t-l">
                                    <span class=" pd-r-20">Lily</span>
                                    <span>2017年6月30日</span>
                                </div>
                                <div class="col-md-8 t-r">
                                    <span class="glyphicon glyphicon-eye-open pd-r-10" aria-hidden="true">100</span>
                                    <span class="glyphicon glyphicon-comment pd-r-10" aria-hidden="true">10</span>
                                    <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </li>
                <!-- 一条新闻结束 -->
            @endforeach
            </ul>   
            <nav aria-label="Page navigation" class="t-c">
              {{ $list->links() }}
            </nav>
            
        </div>
    </section>
@endsection