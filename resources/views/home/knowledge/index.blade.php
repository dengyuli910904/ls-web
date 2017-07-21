@extends('home.layouts.web_without_banner')
@section('style')
    @parent
    <link href="{{ asset('web/css/knowledge.css')}}" rel="stylesheet">
@show
@section('content')
    <section class="pd-t-10">
        <div class="container">
            <div class="pd-t-20">
                <h4 class="b-l-main-5 pd-l-10"> 体育常识 | SPORTS KONOWLEDGE</h4>
                <hr/>
                <div class="pd-t-50 pd-b-50 content">
                    <div class="col-md-4 item center-block">
                        <img src="{{asset('web/img/knowledge/1-1.png')}}">
                    </div>
                    <div class="col-md-4 item center-block">
                        <img src="{{asset('web/img/knowledge/1-2.png')}}">
                    </div>
                    <div class="col-md-4 item center-block">
                        <img src="{{asset('web/img/knowledge/1-3.png')}}">
                    </div>
                    <div class="col-md-4 item center-block">
                        <img src="{{asset('web/img/knowledge/2-1.png')}}">
                    </div>
                    <div class="col-md-4 item center-block">
                        <img src="{{asset('web/img/knowledge/2-2.png')}}">
                    </div>
                    <div class="col-md-4 item center-block">
                        <img src="{{asset('web/img/knowledge/2-3.png')}}">
                    </div>
                    <div class="col-md-4 item center-block">
                        <img src="{{asset('web/img/knowledge/3-1.png')}}">
                    </div>
                    <div class="col-md-4 item center-block">
                        <img src="{{asset('web/img/knowledge/3-2.png')}}">
                    </div>
                    <div class="col-md-4 item center-block">
                        <img src="{{asset('web/img/knowledge/3-3.png')}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
