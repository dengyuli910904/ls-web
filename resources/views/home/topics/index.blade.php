@extends('home.layouts.web_without_banner')

@section('styles')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/topic.css')}}">
@endsection

@section('content')
    <div class="breadcrumb-wrapper">
        <div class="breadcrumb layout-width">
            专题列表 | LIST OF TOPICS
        </div>
    </div>
    <div class="line-1 layout-width"></div>
    <!--content-->
    <div class="content-wrapper">
        <ul class="item-list layout-width" id="newslist">
            @foreach($list as $k => $l)
                <li class="item">
                    <a href="/topics/{{ $l['id'] }}">
                        <img src="{{ $l['cover'] }}" />
                        <h3 class="title">{{ $l['title'] }}</h3>
                        <span class="pub-date">{{ $l['created_date'] }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="clear"></div>
@endsection

@section('javascript')
    @parent
    <script src="{{ asset('web/js/topics.js') }}"></script>
@endsection