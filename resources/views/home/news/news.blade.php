@extends('home.layouts.web')
@section('styles')
    @parent
    <link href="{{ asset('web/css/agency.css')}}" rel="stylesheet">
    <link href="{{ asset('css/web.css')}}" rel="stylesheet">
@show

@section('content')
    <section class="pd-t-50 pd-b-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12 border-b pd-b-20">
                    <h4><span>新闻资讯</span> | <span>NEWS</span></h4>
                </div>
            </div>
            <div class="newslist">
            @foreach($data as $val) 
                <!-- 一条新闻开始 -->
                <div class="new-item row">
                    <div class="col-md-12 border-b pd-b-50 pd-t-50">
                        <div class="col-md-9">
                            <div class="title row pd-b-20">
                                <div class="col-md-10"><a href="{{url('newsdetail?id='.$val->id)}}">{{$val->title}}</a></div>
                                <div class="col-md-2 new-time t-r"><span class="glyphicon icon-time"></span>&nbsp;&nbsp;{{$val->newtime}}</div>
                            </div>
                            <div class="new-content">
                                {{$val->intro}}
                            </div>
                            <!-- <p class="t-r new-more"><a href="{{url('/newsdetail')}}">more></a></p> -->
                        </div>
                        <div class="col-md-3">
                            <img src="{{$val->cover}}"  class="img-responsive">
                        </div>
                    </div>
                </div>
                <!-- 一条新闻结束 -->
            @endforeach
               
                @include('home.profile.pagenation')
                <!-- <nav aria-label="Page navigation" class="t-c">
                 
                  {{ $data->links() }}
                </nav> -->
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
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                    <div class="pd-t-20 col-md-2 col-xs-4">
                        <img src="{{ asset('images/news/partner_logo.png')}}" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
