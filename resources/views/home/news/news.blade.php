@extends('home.layouts.master')
@section('style')
    @parent
    <link href="{{ asset('web/css/agency.css')}}" rel="stylesheet">
    <link href="{{ asset('css/web.css')}}" rel="stylesheet">
@show
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
<!-- Search -->
    <!-- <div class="row search-bar">
        <div class="col-md-4 col-md-offset-8 col-xs-6 col-xs-offset-4">
            <input type="text" placeholder="请输入要搜索的内容" class="search-ipt">
            <button class="search-btn">Search</button>
        </div>
    </div> -->
    <!-- End Search -->
    
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
        <div class="container">
            <div class="row">
                <div class="col-md-12 border-b pd-b-20">
                    <h4><span>新闻资讯</span> | <span>NEWS</span></h4>
                </div>
            </div>
            <div class="newslist">
            @foreach($data as $val) 
                <!-- 一条新闻开始 -->
                <div class="new-item row">
                    <div class="col-md-12 border-b pd-b-50 pd-t-50">
                        <div class="col-md-9">
                            <div class="title row pd-b-20">
                                <div class="col-md-10"><a href="{{url('newsdetail?id='.$val->id)}}">{{$val->title}}</a></div>
                                <div class="col-md-2 new-time t-r"><span class="glyphicon icon-time"></span>&nbsp;&nbsp;{{$val->newtime}}</div>
                            </div>
                            <div class="new-content">
                                {{$val->intro}}
                            </div>
                            <!-- <p class="t-r new-more"><a href="{{url('/newsdetail')}}">more></a></p> -->
                        </div>
                        <div class="col-md-3">
                            <img src="{{$val->cover}}"  class="img-responsive">
                        </div>
                    </div>
                </div>
                <!-- 一条新闻结束 -->
            @endforeach
                <!-- 一条新闻开始 -->
                <div class="new-item row">
                    <div class="col-md-12 border-b pd-b-50 pd-t-50">
                        <div class="col-md-9">
                            <div class="title row pd-b-20">
                                <div class="col-md-10">网球</div>
                                <div class="col-md-2 new-time t-r"><span class="glyphicon icon-time"></span>&nbsp;&nbsp;2017-6-15</div>
                            </div>
                            <div class="new-content">
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                            </div>
                            <!-- <p class="t-r new-more"><a href="{{url('/newsdetail')}}">more></a></p> -->
                        </div>
                        <div class="col-md-3">
                            <img src="{{ asset('images/news/t_2.png')}}"  class="img-responsive">
                        </div>
                    </div>
                </div>
                <!-- 一条新闻结束 -->

                <!-- 一条新闻开始 -->
                <div class="new-item row">
                    <div class="col-md-12 border-b pd-b-50 pd-t-50">
                        <div class="col-md-9">
                            <div class="title row pd-b-20">
                                <div class="col-md-6">网球</div>
                                <div class="col-md-6 new-time t-r"><span class="glyphicon icon-time"></span>&nbsp;&nbsp;2017-6-15</div>
                            </div>
                            <div class="new-content">
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                            </div>
                            <!-- <p class="t-r new-more"><a href="{{url('/newsdetail')}}">more></a></p> -->
                        </div>
                        <div class="col-md-3">
                            <img src="{{ asset('images/news/t_3.png')}}"  class="img-responsive">
                        </div>
                    </div>
                </div>
                <!-- 一条新闻结束 -->
                @include('home.profile.pagenation')
                <!-- <div class="col-md-12 t-c">
                    <ul class="pagination">
                        <li class="disabled"><a href="#"><span class="glyphicon icon-step-backward"></span></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><img src="{{asset('images/news/next.png')}}" width="30px"></a></li>
                    </ul>
                </div> -->
                <!-- {{ $data->links() }}  -->
            </div>
        </div>
    </section>

    <section id="cooperative" class="pd-t-20 pd-b-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border-b pd-b-20">
                    <h4><span>合作伙伴</span> | <span>COOPERATIVE PARTNER</span></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
