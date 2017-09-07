@extends('home.layouts.web_without_banner')
@section('title','管理团队')
@section('styles')
    @parent
    <link href="{{ asset('css/web/about.css')}}" rel="stylesheet">
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
        a{
            color: #9a9a9a;
            text-decoration: none;
        }

        a:hover, a:focus{
            color: #f29000;
            text-decoration: none;
        }
        /*----- end 公共 -----*/
        /*----- 导航 ----- */
         .menubg{
            background-color: #f29000;
            height:60px;
        }
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
    <section class="pd-t-10 pd-b-50">
        <div class="container w1000">
            <div class="row">
                <div class="col-md-offset-2 col-md-10">
                    <ul class="nav-about-title">
                        <li><a href="{{url('about/')}}">公司简介</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="#" class="active">管理团队</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/culture')}}">公司文化</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/history')}}">发展经历</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/connectus')}}">联系我们</a></li>
                    </ul>
                </div>
            </div>
            <div class="t-c">
                <img src="{{asset('images/web/about/about-banner5.png')}}" style="width:100%;">
            </div>

            <div class="pd-t-20">
                <h4 class="b-l-main-5 pd-l-10"> 团队管理</h4>
                <hr/>

                <!-- <div class="row pd-t-50">
                    <div class="col-md-5">
                        <img src="{{asset('web/img/about/team_1.png')}}"  class="img-responsive">
                    </div>
                    <div class="col-md-7">
                        <h4>张XX</h4>
                        <h5>创始人、董事长兼CEO</h5>
                        <p>个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介
                        个人简介个人简介个人简介个人简介个人简介个人简介个人简介</p>
                    </div>
                </div>


                <div class="row pd-t-50">
                    <div class="col-md-7">
                        <h4>张XX</h4>
                        <h5>创始人、董事长兼CEO</h5>
                        <p>个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介
                        个人简介个人简介个人简介个人简介个人简介个人简介个人简介</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('web/img/about/team_2.png')}}"  class="img-responsive">
                    </div>
                </div>


                <div class="row pd-t-50">
                    <div class="col-md-5">
                        <img src="{{asset('web/img/about/team_1.png')}}"  class="img-responsive">
                    </div>
                    <div class="col-md-7">
                        <h4>张XX</h4>
                        <h5>创始人、董事长兼CEO</h5>
                        <p>个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介
                        个人简介个人简介个人简介个人简介个人简介个人简介个人简介</p>
                    </div>
                </div>


                <div class="row pd-t-50">
                    <div class="col-md-7">
                        <h4>张XX</h4>
                        <h5>创始人、董事长兼CEO</h5>
                        <p>个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介
                        个人简介个人简介个人简介个人简介个人简介个人简介个人简介</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('web/img/about/team_2.png')}}"  class="img-responsive">
                    </div>
                </div>


                <div class="row pd-t-50">
                    <div class="col-md-5">
                        <img src="{{asset('web/img/about/team_1.png')}}"  class="img-responsive">
                    </div>
                    <div class="col-md-7">
                        <h4>张XX</h4>
                        <h5>创始人、董事长兼CEO</h5>
                        <p>个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介
                        个人简介个人简介个人简介个人简介个人简介个人简介个人简介</p>
                    </div>
                </div>


                <div class="row pd-t-50">
                    <div class="col-md-7">
                        <h4>张XX</h4>
                        <h5>创始人、董事长兼CEO</h5>
                        <p>个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介个人简介
                        个人简介个人简介个人简介个人简介个人简介个人简介个人简介</p>
                    </div>
                    <div class="col-md-5">
                        <img src="{{asset('web/img/about/team_1.png')}}" class="img-responsive">
                    </div>
                </div> -->
                
            </div>
        </div>
    </section>
@endsection
