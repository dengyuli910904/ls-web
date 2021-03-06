@extends('home.layouts.web_without_banner')
@section('title','海南体育赛事')
@section('styles')
     @parent
    <!-- <link href="{{ asset('web/css/agency.css')}}" rel="stylesheet"> -->
    <link href="{{ asset('css/web/web.css')}}" rel="stylesheet">
    <link href="{{ asset('css/web/myemojiPl.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/web/golf.css') }}">
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

    h4{ line-height: 60px; color: rgb(75,75,75);}

    .news-content img{ text-align: center; max-width: 100%;}
    /* 导航 */
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
    .footer-area h3{ font-size: 24px;}

    /*Start Share*/
    #ak_share         { padding:10px 0; font-size:12px; }
    .ak_share         { height:1%; overflow:hidden; }
    .ak_share dt { float:left; font-weight:bold; color:#A5A5A5; height:16px; line-height:16px; }
    .ak_share dd { margin-right:10px; margin-left:0; height:16px; float:left;  }
    .ak_share a:hover { color:#ed7811; text-decoration:underline;}
    /*.ak_share a{ float:left; height:16px; line-height:16px; padding-left:18px; background:url(http://www.yem120.com/images/share.gif) left top no-repeat; color:#666; text-decoration:none; }*/

    .ak_share .t_163_s         { background-position: 0 -16px; }
    .ak_share .t_qq_s         { background-position: 0 -32px; }
    .ak_share .qzone_s         { background-position: 0 -48px; }
    .ak_share .douban_s         { background-position: 0 -64px; }
    /*End Share*/ 
    .msg-handle a{}
    .msg-handle a:hover{ color: rgb(250,0,0);}

    </style>
@endsection

@section('content')
 <div class="container border-b">
        首页&nbsp;>&nbsp;新闻
    </div>
    <section class="pd-t-20 pd-b-20" id="news-detail">
         <div class="container w1000">
            <div style="width:660px;">
                <div class="row">
                    <div class="col-md-12  pd-b-10 t-c">
                        <h4>标题</h4>
                        <p>发布时间 {{$data->newtime}}   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;来源：{{$data->resource}}</p>
                    </div>
                    <div class="t-r">
                        <span class="pd-l-10 glyphicon glyphicon-eye-open"> 阅读 {{$data->read_count}}人</span>
                        <span class="pd-l-20 glyphicon glyphicon-star"> 收藏 {{$data->collect_count}}人</span>
                        <span class="pd-l-20 glyphicon glyphicon-pencil"> 参与 {{$data->click_count}}人</span>
                    </div>
                </div>
                <div class="row news-content pd-t-30 sms_pic">
                    <div class="bigpic">
                        <div class="btn pre"></div><div class="btn next"></div>
                        <img class="bpic" src="{{ $data['picdata'][0]['url'] }}" />
                        <div class="intro">
                            <div class="bg"></div>
                            <b class="bclose">隐藏</b>
                            <div class="txt">
                                <h2>{{ $data['picdata'][0]['name'] }}</h2>
                                <p>{{ $data['picdata'][0]['description'] }}</p>
                            </div>
                        </div>
                    </div>
                    <div id="ztbox">
                        <div class="spic">
                            <div id="left"></div>
                            <div id="conter">    
                                <ul>
                                  @foreach($data['picdata'] as $pic)
                                    <li><img class="smallpic" src="{{ $pic->url }}" /><span class="snum"><b></b>/<strong></strong></span>
                                        <div class="txt">
                                            <h2>{{$pic->name}}</h2>
                                            <p>{{$pic->description}}</p>
                                        </div>
                                      </li>
                                  @endforeach
                                </ul>   
                            </div>
                            <div id="right"></div>
                        </div>
                        <div id="scroll"><span></span></div>
                    </div>
                  <div class="clear"></div>
                </div>
            </div>
            <div id="my-app">
                <div class="t-r row msg-handle pd-b-20">
                    <div id="ak_share">
                        <dl class="ak_share">

                            <dt>分享：</dt>
                            <dd>
                                <a class="t_sina_s" href="javascript:(function(){window.open('http://v.t.sina.com.cn/share/share.php?title='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href)+'&source=bookmark','_blank','width=450,height=400');})()" title="分享到新浪微博" rel="nofollow">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0, 0, 300, 300">
                                        <path d="M180.661 20.256c-2.258.513-3.387 2.464-1.437 2.464.513 0 2.361 1.231 4.106 2.669 2.566 2.053 3.182 3.49 3.182 6.467 0 7.185-4.208 8.622-15.91 5.645-8.623-2.155-35.107-3.079-45.782-1.437-30.282 4.414-56.766 21.659-68.365 44.448-13.961 27.51-4.517 61.384 24.02 86.123 4.414 3.798 11.702 8.931 16.116 11.292 10.675 5.748 14.473 9.238 12.934 12.01-1.643 3.182-4.722 4.414-13.55 5.338-9.957 1.129-13.653 2.668-19.298 7.698-12.01 10.881-13.755 32.232-2.669 32.232 2.977 0 5.44-3.695 6.159-9.238 1.232-9.033 8.314-14.371 15.5-11.702.821.41 2.258 1.95 3.079 3.593 3.285 6.261.924 14.781-5.645 20.94-5.954 5.543-11.292 12.934-11.292 15.603 0 3.285 5.851 9.033 9.957 9.854 9.033 1.745 20.017-11.496 24.534-29.46.923-3.798 2.668-8.315 3.9-10.163 4.004-5.851 11.805-5.953 15.603-.102 1.54 2.361 1.643 3.49.719 9.136-1.745 10.059-5.338 16.526-14.063 25.354-6.057 6.262-7.802 8.623-7.802 10.881 0 6.262 7.083 11.292 13.961 9.957 2.771-.513 5.44-2.361 9.649-6.467 6.056-6.159 6.569-7.185 11.394-25.662 3.49-13.447 7.391-17.451 14.884-15.398 1.745.411 4.722 2.259 6.467 4.106 2.566 2.566 3.182 4.106 3.182 7.596 0 3.593-.718 5.236-4.414 9.855-8.725 10.675-9.854 15.397-4.722 19.709 3.696 3.182 6.467 3.387 10.779.718 8.314-5.03 15.808-21.864 15.808-35.414 0-6.467-2.772-14.576-6.365-18.682-1.745-1.951-5.851-4.928-9.033-6.57-15.192-7.699-16.424-19.093-2.258-21.043 6.672-.924 16.116-3.285 22.583-5.749 24.123-8.828 44.447-28.639 51.12-49.888 2.463-8.006 2.977-23.199 1.026-32.437-3.9-19.196-13.755-34.696-28.844-45.885-7.494-5.543-8.726-7.699-9.855-17.04-1.437-11.189-4.003-15.295-12.113-19.401-3.592-1.745-13.036-2.874-17.245-1.95zm-11.291 42.292c8.109 4.003 15.603 11.189 21.762 20.633 5.337 8.212 5.748 12.01 1.642 14.063-3.798 1.95-5.646.513-11.189-7.904-9.752-14.885-17.861-20.428-30.384-20.428-8.418 0-17.554 2.156-25.663 6.262-6.672 3.285-8.828 3.593-10.676 1.745-4.721-4.722 3.388-11.189 20.838-16.424 4.62-1.335 8.726-1.745 16.63-1.54 9.238.308 11.189.719 17.04 3.593zm-39.315 42.702c10.983 2.567 28.331 6.262 38.493 8.212 22.173 4.414 30.385 7.904 34.08 14.474 5.851 10.368.514 23.404-12.523 29.974-24.944 12.831-66.62 4.722-90.435-17.451-9.854-9.135-13.755-16.629-13.755-26.278 0-15.911 7.596-17.451 44.14-8.931z"/></svg>
                                </a>
                            </dd>
                            <!-- <dd>
                                <a class="t_163_s" href="javascript:(function(){window.open('http://t.163.com/article/user /checkLogin.do?link=http://news.163.com/&source=' + '&info='+encodeURIComponent(document.title)+' '+encodeURIComponent(location.href),'_blank','width=510,height=300');})()" title="分享到网易微博" rel="nofollow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0, 0, 300, 300">
                                        <path d="M180.661 20.256c-2.258.513-3.387 2.464-1.437 2.464.513 0 2.361 1.231 4.106 2.669 2.566 2.053 3.182 3.49 3.182 6.467 0 7.185-4.208 8.622-15.91 5.645-8.623-2.155-35.107-3.079-45.782-1.437-30.282 4.414-56.766 21.659-68.365 44.448-13.961 27.51-4.517 61.384 24.02 86.123 4.414 3.798 11.702 8.931 16.116 11.292 10.675 5.748 14.473 9.238 12.934 12.01-1.643 3.182-4.722 4.414-13.55 5.338-9.957 1.129-13.653 2.668-19.298 7.698-12.01 10.881-13.755 32.232-2.669 32.232 2.977 0 5.44-3.695 6.159-9.238 1.232-9.033 8.314-14.371 15.5-11.702.821.41 2.258 1.95 3.079 3.593 3.285 6.261.924 14.781-5.645 20.94-5.954 5.543-11.292 12.934-11.292 15.603 0 3.285 5.851 9.033 9.957 9.854 9.033 1.745 20.017-11.496 24.534-29.46.923-3.798 2.668-8.315 3.9-10.163 4.004-5.851 11.805-5.953 15.603-.102 1.54 2.361 1.643 3.49.719 9.136-1.745 10.059-5.338 16.526-14.063 25.354-6.057 6.262-7.802 8.623-7.802 10.881 0 6.262 7.083 11.292 13.961 9.957 2.771-.513 5.44-2.361 9.649-6.467 6.056-6.159 6.569-7.185 11.394-25.662 3.49-13.447 7.391-17.451 14.884-15.398 1.745.411 4.722 2.259 6.467 4.106 2.566 2.566 3.182 4.106 3.182 7.596 0 3.593-.718 5.236-4.414 9.855-8.725 10.675-9.854 15.397-4.722 19.709 3.696 3.182 6.467 3.387 10.779.718 8.314-5.03 15.808-21.864 15.808-35.414 0-6.467-2.772-14.576-6.365-18.682-1.745-1.951-5.851-4.928-9.033-6.57-15.192-7.699-16.424-19.093-2.258-21.043 6.672-.924 16.116-3.285 22.583-5.749 24.123-8.828 44.447-28.639 51.12-49.888 2.463-8.006 2.977-23.199 1.026-32.437-3.9-19.196-13.755-34.696-28.844-45.885-7.494-5.543-8.726-7.699-9.855-17.04-1.437-11.189-4.003-15.295-12.113-19.401-3.592-1.745-13.036-2.874-17.245-1.95zm-11.291 42.292c8.109 4.003 15.603 11.189 21.762 20.633 5.337 8.212 5.748 12.01 1.642 14.063-3.798 1.95-5.646.513-11.189-7.904-9.752-14.885-17.861-20.428-30.384-20.428-8.418 0-17.554 2.156-25.663 6.262-6.672 3.285-8.828 3.593-10.676 1.745-4.721-4.722 3.388-11.189 20.838-16.424 4.62-1.335 8.726-1.745 16.63-1.54 9.238.308 11.189.719 17.04 3.593zm-39.315 42.702c10.983 2.567 28.331 6.262 38.493 8.212 22.173 4.414 30.385 7.904 34.08 14.474 5.851 10.368.514 23.404-12.523 29.974-24.944 12.831-66.62 4.722-90.435-17.451-9.854-9.135-13.755-16.629-13.755-26.278 0-15.911 7.596-17.451 44.14-8.931z"/></svg>
                                </a> 
                            </dd> -->
                            <dd>
                                <a class="t_qq_s" href="javascript:(function(){window.open('http://v.t.qq.com/share/share.php?title='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href)+'&source=bookmark','_blank','width=610,height=350');})()" title="分享到腾讯微博" rel="nofollow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0, 0, 300, 300">
                                        <path d="M134.576 26.089c-35.5 7.9-60.3 37.1-63.2 74.1-.3 4.6-1 8.3-1.5 8.3-1.5 0-4.8 6.4-4.8 9.3 0 1.5-.7 3.9-1.6 5.2-1.2 1.9-1.5 4.2-1.2 9.7l.4 7.3-6.3 8.3c-15.4 20.2-21.4 41.7-16.8 59.7 2.1 7.9 3.4 9.2 7.5 7.5 3.2-1.3 11.5-9.9 13.3-13.8 1.1-2.4 2.7-3 2.7-1 0 2.4 6.1 14.2 10.6 20.6 2.5 3.5 4.4 6.5 4.2 6.6-.1.2-2.1 1.3-4.3 2.4-8.2 4.2-11.8 10.3-11.9 20.7-.1 3.6.5 5.9 1.9 7.9 1.1 1.6 2.5 3.7 3.1 4.7 3.5 6 9.9 9 23.3 11 10 1.4 16.9.8 36.6-3.1 19.9-3.9 28.2-3.9 48.9.2 29.3 5.8 47.1 3.9 56.5-6 7-7.6 9.1-13.8 6.7-19.7-.8-1.8-1.2-3.6-.9-3.8.2-.3-.3-1.9-1.1-3.6-1.9-3.5-6.7-7.4-11.9-9.6l-3.6-1.5 5.3-7.8c2.9-4.3 6.5-11 8.1-15l2.8-7.2 3.7 5.7c3.9 6 9.3 11.6 12.2 12.6 4.2 1.5 7.7-7.2 8.5-20.8.4-7.2.1-10.8-1.6-17.5-2.4-9.9-10.2-26-16.4-34.3-4.3-5.7-4.4-5.7-3.4-11 1.2-6.8-.4-14.9-4.3-21.1-2.4-3.7-3.2-6.5-4-13.4-3.7-32.6-26.6-60-58.5-70.2-9.3-3-28.8-3.7-39-1.4zm43.1 36c4.4 2.9 7.6 9.8 8.2 17.3 1.6 23.2-16.4 34.1-26 15.7-3.3-6.1-3.2-19.3.1-25.9 3.8-7.9 11.7-11 17.7-7.1zm-42 1c4.5 3 7.7 9.8 8.2 17.8.5 9-1 14.7-5.4 19.5-4 4.5-8.1 5.7-12.7 3.7-7.2-3.1-11-10.4-11-21.6 0-8.4 2.4-14.7 7.1-18.7 3.3-2.8 10.1-3.1 13.8-.7zm43.2 48.3c13 3.3 27.2 10.6 27.2 14.1 0 1.9-8.8 7.5-14.2 9-3.2 1-3.1.7 1-4.8 3.6-4.8 2.1-4.9-4-.3-22.2 16.7-49 17.1-70.6.9-3-2.2-5.6-3.8-5.8-3.5-.3.2.5 2.1 1.7 4.1 1.2 2 1.9 3.9 1.6 4.2-.7.7-9-2.9-12.7-5.6-1.7-1.2-3-3-3-4.1 0-4.2 18.2-12.4 33.9-15.4 10.8-2.1 33.9-1.3 44.9 1.4zm-64.6 35c8.3 2.9 23 5.1 33.5 5.1 6.3 0 9.3.4 9.3 1.2 0 1.5-19.7.4-30.6-1.7-8.6-1.6-17.4-4.3-18.8-5.6-1.6-1.4.5-1.1 6.6 1zm57.3 5.1c-1.6.4-5.5.7-8.5.7h-5.5l6-.7c3.3-.4 7.1-.7 8.5-.7 2.2-.1 2.1 0-.5.7zm-80.8 14.8c.8.5.6 4-.8 13.7-2.4 16.1-1.9 22.3 2.3 27 3.8 4.4 10.4 6.8 18.7 6.9 13.8.2 15.1-1.6 15.1-21v-12.7l8.3.9c30.2 3.2 59.3-2.9 80.6-17.1 3-2 5.8-3.2 6.2-2.8 3.7 3.7 5.1 28 2.4 38.8-8 30.9-35.5 52.7-68.5 54.2-23.2 1.1-42.2-6-58-21.7-12-12-18.9-26.2-20.5-42.6-.7-7.7.8-20.7 3.1-26.2l1.4-3.3 4.2 2.6c2.4 1.4 4.8 2.9 5.5 3.3zm-8.6 66.8c.8.9 3 2.7 4.9 3.9 1.9 1.3 5.3 4 7.6 6.1 2.2 2.2 7.3 6.5 11.2 9.7 5.2 4.2 7.2 6.5 7.2 8.1 0 3-2 3.6-13.8 3.6-16.5 0-29.2-4.6-32.4-11.6-1.1-2.3-.9-3.3 1.4-7.5 2.4-4.6 2.5-4.9.7-5.4-2.5-.8-1.4-2.7 3.1-6 4.1-2.8 8.2-3.2 10.1-.9zm144.7-.2c5.6 2.9 7.8 7.6 3.5 7.6-1.4 0-1.4.3.2 2 1 1.1 2 4.1 2.3 6.8.4 4.5.2 5-3.2 8-5.6 4.9-13 6.7-27.4 6.5-9.2 0-12.8-.4-13.8-1.5-2.1-2 .3-4.9 7.4-8.9 8.9-5.1 12.4-7.8 13.6-10.1.6-1.2 2.5-2.5 4.2-3 2-.5 4.1-2.2 5.9-4.8 3.1-4.5 3.5-4.6 7.3-2.6zm-62.1-156.6c-2.4 2.6-3.9 7.3-3.2 10 .8 3.3 2.7 2.3 4-2.4 1.3-4.9 5.1-6.1 6-2l1 5.2c1 4.5 3 2.1 3-3.6-.1-4.3-.5-5.6-2.4-7.1-2.9-2.4-6.3-2.4-8.4-.1zm-34.1-.9c-3.9 4.3-3.6 12.6.6 15.6 3.1 2.1 4.5 1.9 7.3-1 1.9-1.8 2.5-3.5 2.5-7 0-7.5-6.3-12.1-10.4-7.6zm6.9 6.2c0 2.8-2.9 3.8-3.9 1.3-.7-1.9 1.1-4.7 2.8-4.1.6.2 1.1 1.4 1.1 2.8z"/></svg>
                                </a>
                            </dd>
                            <dd>
                                <a class="qzone_s" href="javascript:void(window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(document.location.href)));" title="分享到QQ空间" rel="nofollow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0, 0, 300, 300">
                                        <path d="M148.075 17.702c-1.367.559-5.218 4.658-5.218 5.59 0 .31-6.025 13.106-13.416 28.385-7.391 15.28-13.727 28.634-14.099 29.689-.311.994-.87 2.174-1.118 2.547-.311.373-2.05 3.727-3.913 7.453-1.988 4.1-4.1 7.516-5.28 8.448-2.857 2.422-.932 2.174-58.137 8.571-25.838 2.919-28.695 3.354-30.248 4.783-1.118.993-1.553 4.596-.745 6.708.248.559 11.366 11.118 24.72 23.478 42.236 39.006 39.503 36.273 39.503 39.193 0 1.428-.869 6.583-1.863 11.552-1.056 4.969-3.416 17.392-5.342 27.64-1.925 10.249-4.161 21.988-4.969 26.087-4.285 21.863-4.348 22.485-2.111 24.845 2.111 2.236 4.534 1.987 10.931-1.242 5.963-3.044 6.522-3.354 18.261-10.249 4.286-2.484 9.876-5.714 12.422-7.143 2.547-1.428 7.267-4.223 10.435-6.149 3.168-1.925 5.901-3.478 6.087-3.478.124 0 2.05-1.118 4.224-2.485 2.174-1.366 4.161-2.484 4.41-2.484.248 0 2.484-1.242 4.969-2.795 5.9-3.665 10.993-5.528 13.913-4.969 1.242.248 4.223 1.429 6.584 2.733 6.211 3.292 45.341 25.838 57.515 33.106 10.373 6.211 13.416 7.391 16.957 6.459 2.36-.559 3.043-3.975 2.236-10.745-.373-3.044-.932-6.46-1.243-7.64-.497-1.988-2.546-12.981-7.515-40.559-2.298-13.106-2.298-13.354 2.857-15.279 7.143-2.671 10.497-5.031 9.193-6.336-.435-.435-4.41.062-12.671 1.553-15.342 2.795-18.51 3.23-34.721 4.72-18.447 1.74-35.466 2.112-58.199 1.305-17.764-.621-38.882-2.174-40.062-2.919-.931-.622-.497-2.547.932-3.789.745-.684 10.186-7.454 20.932-15.093 33.664-23.851 55.528-39.628 57.329-41.305 3.106-2.919 2.857-3.043-10.062-4.72-20.435-2.609-25.777-3.044-59.069-4.597-11.118-.496-21.18-1.118-22.36-1.304-12.174-2.05 49.876-7.64 76.087-6.832 17.205.497 37.454 1.925 49.379 3.478 11.118 1.491 11.801 1.615 11.801 2.857 0 .994-1.18 1.864-27.329 19.876-10.745 7.453-22.174 15.342-25.404 17.578-3.167 2.236-6.459 4.534-7.205 5.031-3.478 2.36-15.155 10.497-18.385 12.857-2.049 1.49-3.664 3.105-3.664 3.602 0 1.18 3.043 1.926 12.422 3.044 24.907 2.919 71.242 4.534 73.292 2.484.435-.435.373-1.801-.311-4.658-.496-2.174-.931-4.224-.931-4.534 0-.87 10.559-11.429 25.155-25.093 38.571-36.15 39.441-37.019 39.441-39.876 0-2.485-2.05-4.721-5.093-5.466-1.491-.373-10.373-1.367-19.752-2.298-9.379-.87-19.751-1.864-22.981-2.174-3.23-.373-10.062-1.056-15.217-1.615-19.69-1.988-25.715-2.733-27.143-3.416-2.733-1.242-5.28-6.336-24.1-48.696-13.416-30.31-14.596-32.733-16.459-34.41-1.553-1.428-3.975-1.987-5.652-1.304z"/></svg>
                                </a>
                            </dd>
                        </dl>


                    </div>
                     <div style="padding-top:5px; padding-right:30px;">

                        <!-- <a v-show="!iscollect" href="javascript:void(0);" v-on:click="collect(1)" title="收藏" alt="收藏"><span class="glyphicon glyphicon-star-empty"></span></a> -->
                        <!-- <a v-show="iscollect" href="javascript:void(0);" v-on:click="collect(0)" title="收藏" alt="收藏"><span class="glyphicon glyphicon-star"></span></a> -->
                        <!-- <a href="#"><span class="glyphicon glyphicon-star"></span></a> -->
                    </div>
                    <!-- <div class="jiathis_style">
                        <a class="jiathis_button_qzone"></a>
                        <a class="jiathis_button_tsina"></a>
                        <a class="jiathis_button_tqq"></a>
                        <a class="jiathis_button_weixin"></a>
                        <a class="jiathis_button_renren"></a>
                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                    </div> -->
                    
                    <!-- JiaThis Button END -->
                </div>
                <div class="border-t-dashed m-t-20 row" style="clear:both;"></div>
                <div class="row pd-t-50">
                    <p>共<span>@{{msgcount}}</span>条评论</p>
                    <input type="hidden" name="uuid" id="news_uuid" value="{{$data->id}}">
                    <input type="hidden" name="msgcount" id="msgcount" value="{{$data->msgcount}}">
                    <div class="Main3 comment_input">     
                        <div class="Input_Box">     
                            <div contenteditable="true" class="Input_text"></div>                      
                          <div class="Input_Foot">
                            <a class="imgBtn" href="javascript:void(0);">'◡'</a> 
                            <a class="btn btn-news-default" v-on:click="docomments()">登录并发表</a>
                            <!-- <a href=""><button type="button" class="btn btn-news-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">登录并发表</button></a> -->
                          </div>     
                        </div>
                        <div class="faceDiv">
                            <div class="emoji_container">
                            </div>
                        </div>    
                    </div>
                </div>
                <div class="msg pd-t-50">

                    <div v-for="(item,index) in newslist" class="row border-t-dashed pd-t-20 pd-b-20">
                        <div class="row msg-item">
                            <div class="col-md-1 head-img "><img src="{{asset('web/img/news/user_1.png')}}"></div>
                            <div class="col-md-11">
                                <div class="col-md-10">
                                    <p><span class="user-name">@{{item.user_name}}</span><span class="pd-l-20">[来自PC端]</span></p>
                                </div>
                                <div class="col-md-2 t-r">
                                    @{{item.created_at}}
                                </div>
                                <div class="col-md-12  comment-content" v-html="item.content">
                                </div>
                                <div class="t-r col-md-12">
                                    <span v-on:click="handle(1,item.id,index)" class="glyphicon glyphicon-thumbs-up ding">[@{{item.likes_count}}]</span>
                                    <span  v-on:click="handle(0,item.id,index)" class="pd-l-10 glyphicon glyphicon-thumbs-down cai">[@{{item.dislike_count}}]</span>
                                    <span v-on:click="showreplay($event,index)" data-handle="1" class="pd-l-10 glyphicon glyphicon-comment">[@{{item.comments_count}}]</span>
                                    <span class="pd-l-10 replay glyphicon" v-on:click="replay($event,index)" data-handle="1">回复</span>
                                </div>
                            </div>
                        </div>
                        <div class="row doreplay pd-b-20 none">
                            <!-- <div class="col-md-1 head-img"><img src="{{asset('images/news/m_1.png')}}" class="img-circle"></div> -->
                            <div class="col-md-offset-1  col-md-10">
                                <div v-bind:class="item.class">     
                                    <div class="Input_Box">     
                                        <div contenteditable="true" class="Input_text" v-on:focus="showfoot(item.class,1)" v-on:blur="showfoot(item.class,0)"></div>                      
                                        <div class="Input_Foot none">
                                            <a class="imgBtn" href="javascript:void(0);">'◡'</a> 
                                            <a class="btn btn-news-default" v-on:click="doreplay(index)">登录并发表</a>
                                        </div>     
                                    </div> 
                                    <div class="faceDiv">
                                        <div class="emoji_container">
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="comment none">
                            <div class="commentitem pd-t-20 border-t-dashed" v-for="(val,i) in item.replaylist">
                                <div class="col-md-offset-1 col-md-1 head-img"><img src="{{asset('web/img/news/user_1.png')}}"></div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <p><span class="user-name">@{{val.user_name}}</span><span class="pd-l-20">[来自PC端]</span></p>
                                        </div>
                                        <div class="col-md-3 t-r date-str">
                                            @{{val.created_at}}
                                        </div>
                                    </div>
                                    <div class="row comment-content" v-html="val.content"> </div>
                                    
                                </div>
                                <div class="t-r">
                                    <a href="javascript:void(0);" v-on:click="handle(1,item.id,index)"><span class="glyphicon glyphicon-thumbs-up ding">[@{{val.likes_count}}]</span>&nbsp;</a>
                                    <a href="javascript:void(0);"  v-on:click="handle(0,item.id,index)" class="pd-l-10"><span class="glyphicon glyphicon-thumbs-down cai">[@{{val.dislike_count}}]</span></a>
                                    <!-- <a href="javascript:void(0);"  v-on:click="showreplay($event,index)" class="pd-l-10"  data-handle="1"><span class="glyphicon glyphicon-comment">[@{{val.comments_count}}]</span></a>
                                    <a class="pd-l-10 replay" v-on:click="replay($event,index)" data-handle="1">回复</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
         </div>
    </section>
   
@endsection

@section('script')
    <script type="text/javascript"> 
function myEvent(obj, ev, fu){
    obj.attachEvent ? obj.attachEvent('on' + ev, fu) : obj.addEventListener(ev, fu, false);
}
window.onload = function(){
    var oBox = document.getElementById('ztbox');
    var oLeft = document.getElementById('left');
    var oRight = document.getElementById('right');
    var oConter = document.getElementById('conter');
    var oUl = oConter.getElementsByTagName('ul')[0];
    var oLi = oConter.getElementsByTagName('li');
    var oScroll = document.getElementById('scroll');
    var oSpan = oScroll.getElementsByTagName('span')[0];
    var i = 0;
    oUl.style.width = oLi.length * (oLi[0].offsetWidth + 4)+'px';
    //var iWidth = oScroll.offsetWidth/(oUl.offsetWidth / oConter.offsetWidth - 1)
    var iWidth=88;
    oLeft.onmouseover = oRight.onmouseover = function(){
        this.className = 'hover';
        //点击左侧按钮
        oLeft.onclick = function(){
            var butscroll = oSpan.offsetLeft - iWidth;
            oscroll(butscroll);
        };
        //点击右侧按钮
        oRight.onclick = function(){
            var butscroll = oSpan.offsetLeft + iWidth;
            oscroll(butscroll);
        };
    };
    //点击滚动条
    oScroll.onclick = function(e){
        var oEvent = e || event;
        var butscroll = oEvent.clientX - oBox.offsetLeft -43 - oSpan.offsetWidth / 2;
        oscroll(butscroll);
    };
    oSpan.onclick = function(e){
        var oEvent = e || event;
        oEvent.cancelBubble=true;
    }
    oLeft.onmouseout = oRight.onmouseout = function(){
        this.className = '';
    };
    //拖拽滚动条
    var iX = 0;
    oSpan.onmousedown = function(e){
        var oEvent = e || event;
        iX = oEvent.clientX - oSpan.offsetLeft;
        document.onmousemove = function(e){
            var oEvent = e || event;
            var l = oEvent.clientX - iX;
            td(l);
            return false;
        };
        document.onmouseup = function(){
            document.onmousemove = null;
            document.onmouseup = null;
        };
        return false;
    };
    //滚轮事件
    function fuScroll(e){
        var oEvent = e || event;
        var l = oSpan.offsetLeft;
        oEvent.wheelDelta ? (oEvent.wheelDelta > 0 ? l-=iWidth : l+=iWidth) : (oEvent.detail ? l+=iWidth : l-=iWidth);
        oscroll(l)
        if(oEvent.PreventDefault){
            oEvent.PreventDefault();
        }
    }
    myEvent(oConter, 'mousewheel', fuScroll);
    myEvent(oConter, 'DOMMouseScroll', fuScroll);
    //滚动事件
    function oscroll(l){
        if(l < 0){
            l = 0;
        }else if(l > oScroll.offsetWidth - oSpan.offsetWidth){
            l = oScroll.offsetWidth - oSpan.offsetWidth;
        }
        var scrol = l / (oScroll.offsetWidth - oSpan.offsetWidth);
        sMove(oSpan, 'left', Math.ceil(l));
        sMove(oUl, 'left', '-'+Math.ceil((oUl.offsetWidth - (oConter.offsetWidth)) * scrol));
    }

    function td(l){
        if(l < 0){
            l = 0;
        }else if(l > oScroll.offsetWidth - oSpan.offsetWidth){
            l = oScroll.offsetWidth - oSpan.offsetWidth;
        }
        var scrol = l / (oScroll.offsetWidth - oSpan.offsetWidth);
        oSpan.style.left = l+'px';
        oUl.style.left = '-'+(oUl.offsetWidth - (oConter.offsetWidth + 4)) * scrol +'px';
    }
};
//运动框架
function getStyle(obj, attr){
    return obj.currentStyle ? obj.currentStyle[attr] : getComputedStyle(obj, false)[attr];
}
function sMove(obj, attr, iT, onEnd){
    clearInterval(obj.timer);
    obj.timer = setInterval(function(){
        dMove(obj, attr, iT, onEnd);
    },30);
}
function dMove(obj, attr, iT, onEnd){
    var iCur = 0;
    attr == 'opacity' ? iCur = parseInt(parseFloat(getStyle(obj, attr)*88)) : iCur = parseInt(getStyle(obj, attr));
    var iS = (iT - iCur) / 6;
    iS = iS > 0 ? Math.ceil(iS) : Math.floor(iS);
    if(iCur == iT){
        clearInterval(obj.timer);
        if(onEnd){
            onEnd();
        }
    }else{
        if(attr == 'opacity'){
            obj.style.ficter = 'alpha(opacity:'+(iCur + iS)+')';
            obj.style.opacity = (iCur + iS) / 88;
        }else{
            obj.style[attr] = iCur + iS +'px';
        }
    }
}
//图片切换
function picCha(){
    var bsrc=$(this).attr('src');
    $('.bpic').attr('src',bsrc);
    var h2title=$(this).parent().find('.txt h2').text();
    var ptitle=$(this).parent().find('.txt p').text();
    $('.intro h2').text(h2title);
    $('.intro p').text(ptitle);
};
$(function(){
    $('.smallpic').bind('click',picCha);
    $('#conter li').click(function(){
        $(this).siblings().removeClass('on');
        $(this).addClass('on');
    });
    var num=$('#conter ul li').length;
    $('.snum strong').text(num);
    $('#conter ul li').each(function(){
        var fnum=$(this).index()+1;
        $(this).find('b').text(fnum);
    });
    $('.pre').click(function(){
        var h2title=$(this).parents('.sms_pic').find('.on').prev('li').find('h2').text();
        var ptitle=$(this).parents('.sms_pic').find('.on').prev('li').find('p').text();
        $('.intro h2').text(h2title);
        $('.intro p').text(ptitle);
        $(this).parents('.sms_pic').find('.on').removeClass('on').prev().addClass('on');
        var qsrc=$('.on').find('img').attr('src');
        //alert(qsrc);
        var firstSrc=$('#conter li').first().find('img').attr('src');
        //alert(firstSrc);
        $('.bpic').attr('src',qsrc);
        if(qsrc==firstSrc){
            // alert('这是第一页');
            $('#conter li:first').addClass('on');
            $('.bigpic').hover(function(){$('.pre').hide()});
        }else{
            $('.bigpic').hover(function(){$('.next').show()},function(){$('.next').hide()});
        };
        //tiaoCha();
    });
    $('.next').click(function(){
            var h2title=$(this).parents('.sms_pic').find('.on').next('li').find('h2').text();
            var ptitle=$(this).parents('.sms_pic').find('.on').next('li').find('p').text();
            $('.intro h2').text(h2title);
            $('.intro p').text(ptitle);
            $(this).parents('.sms_pic').find('.on').removeClass('on').next().addClass('on');
            var qsrc=$('.on').find('img').attr('src');
            var lastSrc=$('#conter li').last().find('img').attr('src');
            //alert(lastSrc);
            $('.bpic').attr('src',qsrc);
            if(qsrc==lastSrc){
                // alert('已经到最后一页');
                $('.bigpic').hover(function(){$('.next').hide()});
            }else{
                $('.bigpic').hover(function(){$('.pre').show()},function(){$('.pre').hide()});
            };
            
        });
    $('.bigpic').hover(function(){$('.btn').show()},function(){$('.btn').hide()});
    $('.bclose').click(function(){
        $('.intro').hide();
    });
    
})
</script>
<script type="text/javascript" src="{{asset('web/js/myemojiPl.js')}}"></script>
<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
<script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/comments.js')}}"></script>
@endsection