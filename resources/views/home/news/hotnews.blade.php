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
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 border-b pd-b-20">
                        <h4><span>热门新闻</span> | <span>HOT NEWS</span></h4>
                    </div>
                </div>
                <div class="newslist">
                @foreach($data as $val) 
                    <!-- 一条新闻开始 -->
                    <div class="new-item row">
                        <div class="col-md-12 border-b pd-b-50 pd-t-50">
                            <div class="col-md-3">
                                <img src="{{ $val->cover}}"  class="img-responsive">
                            </div>
                            <div class="col-md-9">
                                <div class="title row pd-b-20 pd-l-30">
                                   {{$val->title}}
                                </div>
                               
                                <p class="t-r new-more">
                                    <a href="#"><img src="{{asset('images/news/ico_3.png')}}"><span> 666</span></a>
                                    <a href="#" class="pd-l-20"><img src="{{asset('images/news/ico_1.png')}}"><span> 888</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- 一条新闻结束 -->
                @endforeach
                    <!-- 一条新闻开始 -->
                    <div class="new-item row">
                        <div class="col-md-12 border-b pd-b-50 pd-t-50">
                            <div class="col-md-3">
                                <img src="{{ asset('images/news/r-t.png')}}"  class="img-responsive">
                            </div>
                            <div class="col-md-9">
                                <div class="title row pd-b-20 pd-l-30">
                                    直播之后，下一个现象及封口是视频社交啊？
                                </div>
                               
                                <p class="t-r new-more">
                                    <a href="#"><img src="{{asset('images/news/ico_3.png')}}"><span> 666</span></a>
                                    <a href="#" class="pd-l-20"><img src="{{asset('images/news/ico_1.png')}}"><span> 888</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- 一条新闻结束 -->

                    <!-- 一条新闻开始 -->
                    <div class="new-item row">
                        <div class="col-md-12 border-b pd-b-50 pd-t-50">
                            <div class="col-md-3">
                                <img src="{{ asset('images/news/r-t.png')}}"  class="img-responsive">
                            </div>
                            <div class="col-md-9">
                                <div class="title row pd-b-20 pd-l-30">
                                    直播之后，下一个现象及封口是视频社交啊？
                                </div>
                               
                                <p class="t-r new-more">
                                    <a href="#"><img src="{{asset('images/news/ico_3.png')}}" align="absmiddle"><span> 666</span></a>
                                    <a href="#" class="pd-l-20"><img src="{{asset('images/news/ico_1.png')}}" align="absmiddle"><span> 888</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- 一条新闻结束 -->
                   <!--  <div class="col-md-12 t-c">
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
                    @include('home.profile.pagenation')
                    <!-- {{ $data->links() }}  -->
                </div>
            </div>
            <div class="col-md-3">
                @include('home.profile.right-slider')
            </div>
        </div>
    </section>

    
@endsection
