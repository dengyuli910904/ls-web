@extends('home.layouts.web_without_banner')

@section('styles')
    @parent
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/common.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/topic1.css')}}">
@endsection

@section('content')
    <div class="banner layout-width">
        <img src="/images/topic/banner1.jpg" />
    </div>
    <div class="breadcrumb-wrapper">
        <div class="breadcrumb layout-width">
            专题列表 | LIST OF TOPICS
        </div>
    </div>
    <div class="line-1 layout-width"></div>
    <!--content-->
    <div class="content-wrapper">
        <ul class="item-list layout-width">
            @foreach($list as $k => $l)
            <li>
                <h3><a class="title">{{ $l['title'] }}</a></h3>
                <img class="thumb" src="{{ $l['cover'] }}" />
                <p class="post-area">
                    <p class="post-desc">{{ $l['intro'] }}</p>
                    <div class="post-options">
                        <div class="right-option">
                            <span class="hot">{{ $l['click_count'] }}</span>
                            <span class="commit">{{ $l['read_count'] }}</span>
                            <span class="share"></span>
                        </div>
                        <div class="left-option">
                            <span class="author">{{ $l['editor'] }}</span>
                            <span class="pub-date">{{ $l['publishtime'] }}</span>
                        </div>
                    </div>
                </p>
                <div class="clear"></div>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="clear"></div>
    {{ $list->links() }}
@endsection