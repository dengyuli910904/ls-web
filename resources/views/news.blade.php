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

    <!-- Header -->
    <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">数据分析与数据决策</div>
                <div class="intro-heading">基于传感器、只能算法和体验的未来商业</div>
                <!-- <a href="#services" class="page-scroll btn btn-xl">Tell Me More</a> -->
            </div>
        </div>
    </header>
    <section>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <span>新闻资讯</span>|<span>NEWS</span>
            </div>
        </div>
        <div class="new-item row">
            <!-- <div class="col-md-1">
                
            </div> -->
            <div class="col-md-6  col-md-offset-1">
                <div>网球</div>
                <div>这是我的内容</div>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('web/img/portfolio/escape.png')}}">
            </div>
            <div class="col-md-1">
                
            </div>
        </div>
    </section>
@endsection
