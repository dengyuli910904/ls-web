@extends('home.layouts.web_without_banner')
@section('style')
    @parent
    <link href="{{ asset('web/css/about.css')}}" rel="stylesheet">
@show
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
    <section class="pd-t-10">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-10">
                    <ul class="nav-about-title">
                        <li><a href="{{url('/')}}">公司简介</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/team')}}">管理团队</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="#" class="active">公司文化</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/history')}}">发展经历</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/connectus')}}">联系我们</a></li>
                    </ul>
                </div>
            </div>
            <div class="t-c">
                <img src="{{asset('images/about/about-banner1.png')}}" style="width:100%;">
            </div>

            <div class="pd-t-20">
                <h4 class="b-l-main-5 pd-l-10"> 公司文化</h4>
                <hr/>
                <p>
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                   <img src="{{asset('images/about/about-banner2.png')}}" style="width:100%;">
                   公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                </p>
            </div>
        </div>
    </section>
@endsection
