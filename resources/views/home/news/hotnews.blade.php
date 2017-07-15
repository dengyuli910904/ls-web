@extends('home.layouts.web')

@section('content')

    
    <!-- Header -->
    <!-- <header>
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">&nbsp;</div>
                <div class="intro-heading">&nbsp;</div>
            </div>
        </div>
    </header> -->
    <section class="pd-t-50 pd-b-20">
        <div class="container">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12 border-b pd-b-20">
                        <h4><span>热门新闻</span> | <span>HOT NEWS</span></h4>
                    </div>
                </div>
                <div class="newslist">
                @foreach($data as $val) 
                    <!-- 一条新闻开始 -->
                    <div class="new-item row">
                        <div class="col-md-12 border-b pd-b-50 pd-t-50">
                            <div class="col-md-3">
                                <img src="{{ $val->cover}}"  class="img-responsive">
                            </div>
                            <div class="col-md-9">
                                <div class="title row pd-b-20 pd-l-30">
                                   {{$val->title}}
                                </div>
                               
                                <p class="t-r new-more">
                                    <a href="#"><img src="{{asset('images/news/ico_3.png')}}"><span> 666</span></a>
                                    <a href="#" class="pd-l-20"><img src="{{asset('images/news/ico_1.png')}}"><span> 888</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- 一条新闻结束 -->
                @endforeach
                    <!-- 一条新闻开始 -->
                    <div class="new-item row">
                        <div class="col-md-12 border-b pd-b-50 pd-t-50">
                            <div class="col-md-3">
                                <img src="{{ asset('images/news/r-t.png')}}"  class="img-responsive">
                            </div>
                            <div class="col-md-9">
                                <div class="title row pd-b-20 pd-l-30">
                                    直播之后，下一个现象及封口是视频社交啊？
                                </div>
                               
                                <p class="t-r new-more">
                                    <a href="#"><img src="{{asset('images/news/ico_3.png')}}"><span> 666</span></a>
                                    <a href="#" class="pd-l-20"><img src="{{asset('images/news/ico_1.png')}}"><span> 888</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- 一条新闻结束 -->

                    <!-- 一条新闻开始 -->
                    <div class="new-item row">
                        <div class="col-md-12 border-b pd-b-50 pd-t-50">
                            <div class="col-md-3">
                                <img src="{{ asset('images/news/r-t.png')}}"  class="img-responsive">
                            </div>
                            <div class="col-md-9">
                                <div class="title row pd-b-20 pd-l-30">
                                    直播之后，下一个现象及封口是视频社交啊？
                                </div>
                               
                                <p class="t-r new-more">
                                    <a href="#"><img src="{{asset('images/news/ico_3.png')}}" align="absmiddle"><span> 666</span></a>
                                    <a href="#" class="pd-l-20"><img src="{{asset('images/news/ico_1.png')}}" align="absmiddle"><span> 888</span></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- 一条新闻结束 -->
                   <!--  <div class="col-md-12 t-c">
                        <ul class="pagination">
                            <li class="disabled"><a href="#"><span class="glyphicon icon-step-backward"></span></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><img src="{{asset('images/news/next.png')}}" width="30px"></a></li>
                        </ul>
                    </div> -->
                    @include('home.profile.pagenation')
                    <!-- {{ $data->links() }}  -->
                </div>
            </div>
            <div class="col-md-3">
                @include('home.profile.right-slider')
            </div>
        </div>
    </section>

    
@endsection
