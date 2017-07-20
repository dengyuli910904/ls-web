@extends('home.layouts.web_without_banner')
@section('style')
    @parent
    <link href="{{ asset('web/css/about.css')}}" rel="stylesheet">
@show
@section('content')
    <section class="pd-t-10">
        <div class="container">
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
                <img src="{{asset('images/about/about-banner5.png')}}" style="width:100%;">
            </div>

            <div class="pd-t-20">
                <h4 class="b-l-main-5 pd-l-10"> 团队管理</h4>
                <hr/>

                <!-- start row -->
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
                <!-- end row -->
                <!-- start row -->
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
                <!-- end row -->
                <!-- start row -->
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
                <!-- end row -->
                <!-- start row -->
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
                <!-- end row -->
                <!-- start row -->
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
                <!-- end row -->
                <!-- start row -->
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
                </div>
                <!-- end row -->
            </div>
        </div>
    </section>
@endsection
