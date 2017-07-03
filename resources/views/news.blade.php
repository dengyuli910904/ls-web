@extends('layouts.web')

@section('content')
<!-- Search -->
    <div class="row search-bar">
        <div class="col-md-4 col-md-offset-8 col-xs-6 col-xs-offset-4">
            <input type="text" placeholder="请输入要搜索的内容">
            <button>Search</button>
        </div>
    </div>
    <!-- End Search -->
    <!-- Banner -->
    <section style="padding:10px 0;">
        <div id="myCarousel" class="carousel slide">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>   
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{asset('images/banner/i_1.png')}}" alt="First slide">
                </div>
                <div class="item">
                    <img src="{{asset('images/banner/i_2.png')}}" alt="Second slide">
                </div>
                <div class="item">
                    <img src="{{asset('images/banner/i_3.png')}}" alt="Third slide">
                </div>
                 <div class="item">
                    <img src="{{asset('images/banner/i_4.png')}}" alt="Third slide">
                </div>
            </div>
            <!-- 轮播（Carousel）导航 -->
            <!-- <a class="carousel-control left" href="#myCarousel" 
                data-slide="prev">&lsaquo;
            </a>
            <a class="carousel-control right" href="#myCarousel" 
                data-slide="next">&rsaquo;
            </a> -->
        </div>
    </section>
    <!-- End Banner -->
    
    <!-- Header -->
    <!-- <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">数据分析与数据决策</div>
                <div class="intro-heading">基于传感器、只能算法和体验的未来商业</div>
                <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>
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
                <!-- 一条新闻开始 -->
                <div class="new-item row">
                    <div class="col-md-12 border-b pd-b-50 pd-t-50">
                        <div class="col-md-9">
                            <div class="title row pd-b-20">
                                <div class="col-md-6">网球</div>
                                <div class="col-md-6 new-time t-r"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;2017-6-15</div>
                            </div>
                            <div class="new-content">
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                            </div>
                            <p class="t-r new-more"><a href="#">more></a></p>
                        </div>
                        <div class="col-md-3">
                            <img src="{{ asset('web/img/portfolio/escape.png')}}"  class="img-responsive">
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
                                <div class="col-md-6 new-time t-r"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;2017-6-15</div>
                            </div>
                            <div class="new-content">
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                            </div>
                            <p class="t-r new-more"><a href="#">more></a></p>
                        </div>
                        <div class="col-md-3">
                            <img src="{{ asset('web/img/portfolio/escape.png')}}"  class="img-responsive">
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
                                <div class="col-md-6 new-time t-r"><span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;2017-6-15</div>
                            </div>
                            <div class="new-content">
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                                这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容这是我的内容
                            </div>
                            <p class="t-r new-more"><a href="#">more></a></p>
                        </div>
                        <div class="col-md-3">
                            <img src="{{ asset('web/img/portfolio/escape.png')}}"  class="img-responsive">
                        </div>
                    </div>
                </div>
                <!-- 一条新闻结束 -->
                <div class="col-md-12 t-c">
                    <ul class="pagination">
                        <li class="disabled"><a href="#"><span class="glyphicon glyphicon-step-backward"></span></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-step-forward"></span></a></li>
                    </ul>
                </div>
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
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/logo.png')}}" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
