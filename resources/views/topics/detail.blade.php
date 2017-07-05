@extends('layouts.web')

@section('content')
    <style>
        .recommend-title {
            color: #505050;
        }
        .recommend-title span {
            color: red;
        }
        .recommend-carousel {
            bottom: 120px;
        }
        .recommend-intro {
            padding-top: 50px;
            font-size: 15px;
        }
        .news-list .item h2 {
            color: red;
        }
        .news-list .item .news-content {
            height: 230px;
        }
        .news-list .item .news-intro {
            margin-top: 10px;
            color: #090103;
        }
        .news-list .item .news-content .news-bottom {
            position: absolute;
            bottom: 0;
            padding-left: 0;
        }
        .news-list .item .news-content .news-bottom .news-bottom-left {
            padding-left: 0;
        }
        .news-list .item .news-content .news-bottom .news-bottom-right {
            text-align: right;
        }
    </style>
    <section class="pd-t-10 pd-b-20">
        <div class="container">
            <div id="myCarousel" class="carousel slide">
                <!-- 轮播（Carousel）指标 -->
                <ol class="carousel-indicators recommend-carousel">
                    @foreach($recommends as $k => $v)
                    <li data-target="#myCarousel" data-slide-to="{{ $k }}" @if($k == 0) class="active" @endif></li>
                    @endforeach
                </ol>
                <!-- 轮播（Carousel）项目 -->
                <div class="carousel-inner">
                    @foreach($recommends as $k => $v)
                    <div class="item @if($k == 0) active @endif">
                        <h2 class="recommend-title pd-b-20"><span>专题：</span>{{ $v['title'] }}</h2>
                        <img src="{{ $v['cover'] }}" alt="First slide" width="1200" height="417">
                        <div class="recommend-intro">{{ $v['intro'] }}</div>
                    </div>
                    @endforeach
                </div>
                <!-- 轮播（Carousel）导航 -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev" style="display: none">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next" style="display: none">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
                <!-- <a class="carousel-control left" href="#myCarousel"
                    data-slide="prev">&lsaquo;
                </a>
                <a class="carousel-control right" href="#myCarousel"
                    data-slide="next">&rsaquo;
                </a> -->
            </div>
        </div>
    </section>

    <section class="pd-t-20 pd-b-20">
        <div class="container">
            <div class="row news-list">
                @foreach($list as $k => $v)
                <div class="col-md-12 pd-b-20 item">
                    <h2 class="pd-l-20">{{ $v['title'] }}</h2>
                    <div class="col-md-5">
                        <img src="{{ $v['cover'] }}" width="400" height="235"/>
                    </div>
                    <div class="col-md-7 news-content">
                        <div class="news-intro">{{ $v['intro'] }}</div>
                        <div class="col-md-12 news-bottom">
                            <span class="col-md-6 news-bottom-left">{{ $v['editor'] }} | {{ $v['publishtime'] }}</span>
                            <span class="col-md-6 news-bottom-right"><img src="{{asset('images/ico_2.png')}}">　{{ $v['click_count'] }} 　　<img src="{{asset('images/ico_1.png')}}">　{{ $v['read_count'] }} 　　<img src="{{asset('images/ico_3.png')}}"></span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-md-12 t-c">
            {{--{{ $list->links() }}--}}
            </div>
            <div class="col-md-12 t-c">
                <ul class="pagination">
                    <li class="disabled"><a href="#"><span class="glyphicon icon-step-backward"></span></a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#"><img src="{{asset('images/news/next.png')}}" width="30px"></a></li>
                </ul>
            </div>
        </div>
    </section>
@endsection