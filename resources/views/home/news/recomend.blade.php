@extends('home.layouts.web')
@section('title','推荐新闻')
@section('styles')
    @parent
    <!-- <link href="{{ asset('web/css/agency.css')}}" rel="stylesheet"> -->
    <link href="{{ asset('web/css/web.css')}}" rel="stylesheet">
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
            background-color: #f26700;/*#f29000;*/
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
        /* START NEWS*/
        .newslist{
            /*margin:0 15px;*/
            /*width: 100%;*/
        }
        .newslist li{
            /*margin: 20px 15px;*/
            float: left;
            width: 100%;
            padding: 25px 0px 25px 0px;
            margin: 0;
        }
        .newslist li .title{
            line-height: 25px;
            height: 75px;
            overflow: hidden;
        }
        .new-item img{ border:1px solid #ddd;}
        .fa{
            color: #ddd;
            width: 25px;
            height: 25px;
            padding: 10px 20px;
            font-size: 20px;
        }
        /* END NEWS*/

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

    </style>
@endsection

@section('content')

    
    <!-- Header -->
    <!-- <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">&nbsp;</div>
                <div class="intro-heading">&nbsp;</div>
            </div>
        </div>
    </header> -->
    <section class="pd-t-50 pd-b-20">
        <div class="container w1000 ptb20">
            <div class="col-md-9">
                <h3 class="titlebar"><a href="">推荐新闻 | RECOMMENDED NEWS</a></h3>
                <!-- <div class="row">
                    <div class="col-md-12 border-b pd-b-20">
                        <h4><span>推荐新闻</span> | <span>RECOMMENDED NEWS</span></h4>
                    </div>
                </div> -->
                <ul class="newslist">
                @foreach($data as $val) 
                    <!-- 一条新闻开始 -->
                   <li class="new-item border-b">
                        <!-- <div class="col-md-12 pd-b-50 pd-t-50"> -->
                            <div class="col-md-4">
                                <img src="{{ $val->cover}}" width="180px" height="120px">
                            </div>
                            <div class="col-md-8">
                                <div class="title row pd-b-20">
                                   <a href="{{url('news/detail?id='.$val->id)}}" onerror="this.src='{{asset('web/images/news/no-img.jpg')}}'">{{$val->title}}</a>
                                </div>
                               
                                <p class="t-r new-more">
                                    <a><i class="fa fa-share-alt" aria-hidden="true"></i> {{$val->collect_count}}</a>
                                    <a><i class="fa fa-comment" aria-hidden="true"></i> {{$val->comment_count}}</a>
                                     <!-- <a href="#"><img src="{{asset('images/news/ico_3.png')}}"><span> {{$val->collect_count}}</span></a> -->
                                    <!-- <a href="#" class="pd-l-20"><img src="{{asset('images/news/ico_1.png')}}"><span> {{$val->comment_count}}</span></a> -->
                                </p>
                            </div>
                        <!-- </div> -->
                    </li>
                    <!-- 一条新闻结束 -->
                @endforeach
                </ul>   
                @include('home.profile.pagenation.pagenation')
                    <!-- {{ $data->links() }}  -->
                
            </div>
            <div class="col-md-3">
                @include('home.profile.right-slider')
            </div>
        </div>
    </section>

    
@endsection
