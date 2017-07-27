<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('home.public.script')

    @include('home.public.style')
    <!-- @yield('styles') -->
    @section('styles')
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

    </style>
    @show
</head>
<body id="page-top" class="index">
      
    <!-- Navigation -->
    @include('home.public.header')
   
    <div class="wrapper container-fluid">
         @yield('content')
    </div>

     @include('home.public.footer')

   
</body>
    @yield('script')
</html>