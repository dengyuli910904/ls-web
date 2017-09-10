@extends('home.layouts.web_without_banner')
@section('title','体育百科')
@section('styles')
        <link href="{{ asset('web/css/web.css')}}" rel="stylesheet">
        <link href="{{ asset('web/css/knowledge.css')}}" rel="stylesheet">
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

       /* .form-control:focus {
            border-color: #f29000;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(236, 85, 8, 0.6);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(236, 85, 8, 0.6);
        }*/

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
    <section class="pd-t-10">
        <div class="container w1000 ptb20">
            <div class="pd-t-20">
                <h3 class="titlebar border-b pd-b-50"><a href="">体育常识 | SPORTS KONOWLEDGE</a></h3>
                <!-- <h4 class="b-l-main-5 pd-l-10"> 体育常识 | SPORTS KONOWLEDGE</h4> -->
                <!-- <hr/> -->
                <div class="pd-t-50 pd-b-50 content">
                    <div class="col-md-4 item center-block">
                        <a href="#">
                            <img src="{{asset('web/images/knowledge/1-1.png')}}">
                        </a>
                    </div>
                    <div class="col-md-4 item center-block">
                        <a href="#">
                            <img src="{{asset('web/images/knowledge/1-2.png')}}">
                        </a>
                    </div>
                    <div class="col-md-4 item center-block">
                        <a href="#">
                            <img src="{{asset('web/images/knowledge/1-3.png')}}">
                        </a>
                    </div>
                    <div class="col-md-4 item center-block">
                        <a href="#">
                            <img src="{{asset('web/images/knowledge/2-1.png')}}">
                        </a>
                    </div>
                    <div class="col-md-4 item center-block">
                        <a href="#">
                            <img src="{{asset('web/images/knowledge/2-2.png')}}">
                        </a>
                    </div>
                    <div class="col-md-4 item center-block">
                        <a href="#">
                            <img src="{{asset('web/images/knowledge/2-3.png')}}">
                        </a>
                    </div>
                    <div class="col-md-4 item center-block">
                        <a href="#">
                            <img src="{{asset('web/images/knowledge/3-1.png')}}">
                        </a>
                    </div>
                    <div class="col-md-4 item center-block">
                        <a href="#">
                            <img src="{{asset('web/images/knowledge/3-2.png')}}">
                        </a>
                    </div>
                    <div class="col-md-4 item center-block">
                        <a href="#">
                            <img src="{{asset('web/images/knowledge/3-3.png')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
