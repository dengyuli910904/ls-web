@extends('home.layouts.web_without_banner')

@section('styles')
    @parent
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('web/css/reset.css')}}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('web/css/topic1.css')}}">
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
    .item-list{ min-height: 400px;}
    .item-list .post-desc{ font-size: 23px; line-height: 26px; font-weight: 500;}
    .item-list h3 a{}
    .item-list h3 a:hover{ text-decoration: none; cursor: pointer;}
    /*.item-list li img{ border: 1px solid gray;}*/
    </style>
@endsection

@section('content')
    <!-- <div class="banner layout-width">
        <img src="/web/images/topic/banner1.jpg" />
    </div> -->
    <div class="breadcrumb-wrapper">
        <div class="breadcrumb layout-width">
            新闻列表 | LIST OF NEWS
        </div>
    </div>
    <div class="line-1 layout-width"></div>
    <!--content-->
    <div class="content-wrapper">
        <div class="layout-width">
            <ul class="item-list">
                @foreach($list as $k => $l)
                <li>
                    <h3><a class="title" href="/news/detail?id={{$l['news_uuid']}}">{{ $l['title'] }}</a></h3>
                    <img class="thumb" src="{{ $l['cover'] }}" onerror="this.src='{{asset('web/images/news/no-img.jpg')}}'" />
                    <p class="post-area">
                        <p class="post-desc">{{ $l['intro'] }}</p>
                        <div class="post-options">
                            <div class="right-option">
                                <span class="hot">{{ $l['click_count'] }}</span>
                                <span class="commit">{{ $l['read_count'] }}</span>
                                <span class="share"></span>
                            </div>
                            <div class="left-option">
                                <span class="author">{{ $l['editor'] }}</span>
                                <span class="pub-date">{{ $l['publishtime'] }}</span>
                            </div>
                        </div>
                    </p>
                    <div class="clear"></div>
                </li>
                @endforeach
            </ul>
            {{ $list->links() }}
        </div>
    </div>
    <div class="clear"></div>
    
@endsection