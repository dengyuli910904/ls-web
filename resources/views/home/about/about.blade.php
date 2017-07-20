@extends('home.layouts.web_without_banner')
@section('style')
    @parent
    <link href="{{ asset('web/css/about.css')}}" rel="stylesheet">
@show
@section('content')
    <section class="pd-t-10">
        <div class="container">
            <div class="row t-c center-block">
                <ul class="nav-about-title">
                    <li><a href="#" class="active">公司简介</a></li>
                    <li><a href="javascript:void(0);" class="line-h">|</a></li>
                    <li><a href="{{url('about/team')}}">管理团队</a></li>
                    <li><a href="javascript:void(0);" class="line-h">|</a></li>
                    <li><a href="{{url('about/culture')}}">公司文化</a></li>
                    <li><a href="javascript:void(0);" class="line-h">|</a></li>
                    <li><a href="{{url('about/history')}}">发展经历</a></li>
                    <li><a href="javascript:void(0);" class="line-h">|</a></li>
                    <li><a href="{{url('about/connectus')}}">联系我们</a></li>
                </ul>
            </div>
            <div class="t-c">
                <img src="{{asset('images/about/about-banner.png')}}" style="width:100%;">
            </div>

            <div class="pd-t-20">
                <h4 class="b-l-main-5 pd-l-10"> 公司简介</h4>
                <hr/>
                <p>
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                    公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年公司成立于XX年
                </p>
            </div>
        </div>
    </section>
@endsection
