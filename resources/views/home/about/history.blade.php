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
