@extends('home.layouts.web_without_banner')
@section('title','发展历史')
@section('styles')
    @parent
    <link href="{{ asset('web/css/about.css')}}" rel="stylesheet">
    <link href="{{ asset('web/css/agency.css')}}" rel="stylesheet">
    <link href="{{ asset('css/web.css')}}" rel="stylesheet">
    <style type="text/css">

        /*---- 公共部分 -----*/
        *{margin:0; padding:0}
        ul,ol,li{ list-style:none; }

        .w1000 { width:1000px; }
        /*----- end 公共 -----*/
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
        <div class="container w1000">
            <div class="row">
                <div class="col-md-offset-2 col-md-10">
                    <ul class="nav-about-title">
                        <li><a href="{{url('about/')}}">公司简介</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/team')}}">管理团队</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/culture')}}">公司文化</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="#" class="active">发展经历</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/connectus')}}">联系我们</a></li>
                    </ul>
                </div>
            </div>
            <div class="t-c">
                <img src="{{asset('images/about/about-banner3.png')}}" style="width:100%;">
            </div>

            <div class="pd-t-20">
                <h4 class="b-l-main-5 pd-l-10"> 发展经历</h4>
                <hr/>

                <!-- <div class="timeline"> -->
                <div class="row">
                    
                    <div class="col-lg-12 col-md-12 pd-t-50">
                        <h3>2017</h3>
                        <ul class="timeline">
                            <li  class="timeline-inverted">
                                <div class="timeline-time">06月</div>
                                <div class="timeline-image"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-body">
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-time">05月</div>
                                <div class="timeline-image"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-body">
                                        <p class="text-muted">2017-06-26 公司成立公司成立公司成立公司成立公司成立公司成立公司成立公司成立公司成立公司成立公司成</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                    </div>
                                </div>
                            </li>
                           
                            <!-- <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <h4>Be Part
                                        <br>Of Our
                                        <br>Story!</h4>
                                </div>
                            </li> -->
                        </ul>
                    </div>

                    <div class="col-lg-12 col-md-12 pd-t-50">
                        <h3>2016</h3>
                        <ul class="timeline">
                            <li  class="timeline-inverted">
                                <div class="timeline-time">06月</div>
                                <div class="timeline-image"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-body">
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-time">05月</div>
                                <div class="timeline-image"></div>
                                <div class="timeline-panel">
                                    <div class="timeline-body">
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                        <p class="text-muted">2017-06-26 公司成立公司成立</p>
                                    </div>
                                </div>
                            </li>
                           
                            <!-- <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <h4>Be Part
                                        <br>Of Our
                                        <br>Story!</h4>
                                </div>
                            </li> -->
                        </ul>
                    </div>
                </div>
        </div>
    </section>
@endsection
@section('scripts')
    @parent
   
@show
