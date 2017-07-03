@extends('layouts.web')

@section('content')
<!-- Search -->
   <!-- <div class="t-c header-title pd-b-10">
       <h2>
           海南体育赛事官网
       </h2>
    </div> -->
    <!-- End Search -->
    <div class="container border-b">
        首页&nbsp;>&nbsp;新闻
    </div>
    <section class="pd-t-20 pd-b-20">
         <div class="container">
            <div class="row">
                <div class="col-md-12  pd-b-10 t-c">
                    <h4>{{$data->title}}</h4>
                    <p>发布时间 {{$data->newtime}}   来源：{{$data->resource}}</p>
                </div>
                <div class="t-r">
                    <span>阅读数：{{$data->read_count}}人</span>
                    <span>收藏：{{$data->collect_count}}人</span>
                    <span>参与人数：{{$data->click_count}}人</span>
                </div>
            </div>
            <div class="row">
                {{$data->content}}
                <p>
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                </p>
                <img src="{{ asset('images/news/im_1.png')}}" width="100%">
                <p>
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                </p>
                <img src="{{ asset('images/news/im_2.png')}}" width="49%" style="float:left; margin-right:1%;">
                <img src="{{ asset('images/news/im_3.png')}}" width="49%" style="float:left; margin-left:1%;">
                <p>
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                    新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容新闻内容
                </p>
            </div>
            <div class="t-r msg-handle">
                <span><img src="{{asset('images/news/collect.png')}}"></span><span class="pd-l-20"><img src="{{asset('images/news/share.png')}}"></span>
            </div>
         
             <div class="row pd-t-50">
                <img src="{{asset('images/news/m_0.png')}}" style="margin-right:-50px; width:120px; margin-top:-90px; z-index:10;">
                <textarea class="news-ipt" rows="3"></textarea>
                <p style=" width:75%" class="t-r">
                    <input class="btn btn-leavemsg" type="submit" value="登录回复">
                </p>
             </div>
            <div class="msg pd-t-50">
                <!-- <img src="{{asset('images/news/m_1.png')}}">     -->

                <div class="row border-t-dashed pd-t-10 pd-b-10">
                    <div class="col-md-1 head-img"><img src="{{asset('images/news/m_1.png')}}"></div>
                    <div class="col-md-11">
                        <div class="col-md-10">
                            <p><span class="user-name">用户名</span><span class="pd-l-20">[来自哪颗星系]</span></p>
                        </div>
                        <div class="col-md-2 t-r">
                            2017-06-22 14:16:15
                        </div>
                        <div class="col-md-12">
                            回复内容
                        </div>
                        <div class="t-r col-md-12">
                            <a href="#">顶&nbsp;<span class="ding">[22]</span></a>
                            <a href="#" class="pd-l-10">踩&nbsp;<span class="cai">[22]</span></a>
                            <a class="pd-l-10 replay"><span>回复</span></a>
                        </div>
                    </div>
                </div>

                <div class="row border-t-dashed pd-t-10 pd-b-10">
                    <div class="col-md-1 head-img"><img src="{{asset('images/news/m_1.png')}}"></div>
                    <div class="col-md-11">
                        <div class="col-md-10">
                            <p><span class="user-name">用户名</span><span class="pd-l-20">[来自哪颗星系]</span></p>
                        </div>
                        <div class="col-md-2 t-r">
                            2017-06-22 14:16:15
                        </div>
                        <div class="col-md-12">
                            回复内容
                        </div>
                        <div class="t-r col-md-12">
                            <a href="#">顶&nbsp;<span class="ding">[22]</span></a>
                            <a href="#" class="pd-l-10">踩&nbsp;<span class="cai">[22]</span></a>
                            <a class="pd-l-10 replay"><span>回复</span></a>
                        </div>
                    </div>
                </div>


                <div class="row border-t-dashed pd-t-10 pd-b-10">
                    <div class="col-md-1 head-img"><img src="{{asset('images/news/m_1.png')}}"></div>
                    <div class="col-md-11">
                        <div class="col-md-10">
                            <p><span class="user-name">用户名</span><span class="pd-l-20">[来自哪颗星系]</span></p>
                        </div>
                        <div class="col-md-2 t-r">
                            2017-06-22 14:16:15
                        </div>
                        <div class="col-md-12">
                            回复内容
                        </div>
                        <div class="t-r col-md-12">
                            <a href="#">顶&nbsp;<span class="ding">[22]</span></a>
                            <a href="#" class="pd-l-10">踩&nbsp;<span class="cai">[22]</span></a>
                            <a class="pd-l-10 replay"><span>回复</span></a>
                        </div>
                    </div>
                </div>
            </div>

         </div>
    </section>

    
@endsection
