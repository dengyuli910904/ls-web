@extends('home.layouts.web_without_banner')
@section('styles')
    @parent
    <link href="{{ asset('web/css/myemojiPl.css')}}" rel="stylesheet">
@endsection

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
    <section class="pd-t-20 pd-b-20" id="news-detail">
         <div class="container">
            <div class="row">
                <div class="col-md-12  pd-b-10 t-c">
                    <h4>{{$data->title}}</h4>
                    <p>发布时间 {{$data->newtime}}   来源：{{$data->resource}}</p>
                </div>
                <div class="t-r">
                    <span class="pd-l-10 glyphicon glyphicon-eye-open"> 阅读{{$data->read_count}}人</span>
                    <span class="pd-l-20 glyphicon glyphicon-star"> 收藏{{$data->collect_count}}人</span>
                    <span class="pd-l-20 glyphicon glyphicon-pencil"> 参与{{$data->click_count}}人</span>
                </div>
            </div>
            <div class="row news-content">
                <?php
                    echo "{$data->content}";
                ?>
              
            </div>
            <div id="my-app">
                <div class="t-r msg-handle">
                    <span><img src="{{asset('images/news/collect.png')}}" v-on:click="collect()"></span>
                    <span class="pd-l-20"><img src="{{asset('images/news/share.png')}}"></span>
                
                    <!-- JiaThis Button BEGIN -->
                    <div class="jiathis_style">
                        <span class="jiathis_txt">分享到：</span>
                        <a class="jiathis_button_tools_1"></a>
                        <a class="jiathis_button_tools_2"></a>
                        <a class="jiathis_button_tools_3"></a>
                        <a class="jiathis_button_tools_4"></a>
                    </div>
                </div>
                <div class="border-t-dashed" style="clear:both;"></div>
                <div class="row pd-t-50">
                    <p>共<span>1230</span>条评论</p>
                    <input type="hidden" name="uuid" id="news_uuid" value="{{$data->id}}">
                    <div class="Main3 comment_input">     
                        <div class="Input_Box">     
                            <div contenteditable="true" class="Input_text"></div>                      
                          <div class="Input_Foot">
                            <a class="imgBtn" href="javascript:void(0);">'◡'</a> 
                            <a class="postBtn btn btn-news-default" v-on:click="docomments()">登录并发表</a>
                            <!-- <a href=""><button type="button" class="btn btn-news-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">登录并发表</button></a> -->
                          </div>     
                        </div>
                        <div class="faceDiv">
                            <div class="emoji_container">
                            </div>
                        </div>    
                    </div>
                </div>
                <div class="msg pd-t-50">

                    <div v-for="(item,index) in newslist" class="row border-t-dashed pd-t-20 pd-b-20">
                        <!-- <div class="media">
                          <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{asset('web/img/news/user_1.png')}}" alt="...">
                            </a>
                          </div>
                          <div class="media-body">
                            <h5 class="media-heading"><span class="user-name">@{{item.user_name}}</span><span class="pd-l-20">[来自哪颗星系]</span></h5>
                            <p v-html="item.content"></p>
                            <p class="t-r">
                                <a href="javascript:void(0);" v-on:click="handle(1,item.id,index)"><span class="glyphicon glyphicon-thumbs-up ding">[@{{item.likes_count}}]</span>&nbsp;</a>
                                <a href="javascript:void(0);"  v-on:click="handle(0,item.id,index)" class="pd-l-10"><span class="glyphicon glyphicon-thumbs-down cai">[@{{item.dislike_count}}]</span></a>
                                <a href="javascript:void(0);"  v-on:click="showreplay()" class="pd-l-10"><span class="glyphicon glyphicon-comment">[@{{item.commnets_count}}]</span></a>
                                <a class="pd-l-10 replay" v-on:click="replay($event,index)" data-handle="1">回复</a>
                            </p>
                          </div>
                        </div> -->
                        <div class="row msg-item">
                            <div class="col-md-1 head-img "><img src="{{asset('web/img/news/user_1.png')}}"></div>
                            <div class="col-md-11">
                                <div class="col-md-10">
                                    <p><span class="user-name">@{{item.user_name}}</span><span class="pd-l-20">[来自PC端]</span></p>
                                </div>
                                <div class="col-md-2 t-r">
                                    @{{item.created_at}}
                                </div>
                                <div class="col-md-12  comment-content" v-html="item.content">
                                </div>
                                <div class="t-r col-md-12">
                                    <span v-on:click="handle(1,item.id,index)" class="glyphicon glyphicon-thumbs-up ding">[@{{item.likes_count}}]</span>
                                    <span  v-on:click="handle(0,item.id,index)" class="pd-l-10 glyphicon glyphicon-thumbs-down cai">[@{{item.dislike_count}}]</span>
                                    <span v-on:click="showreplay($event,index)" data-handle="1" class="pd-l-10 glyphicon glyphicon-comment">[@{{item.commnets_count}}]</span>
                                    <span class="pd-l-10 replay glyphicon" v-on:click="replay($event,index)" data-handle="1">回复</span>
                                </div>
                            </div>
                        </div>
                        <div class="row doreplay pd-b-20 none">
                            <!-- <div class="col-md-1 head-img"><img src="{{asset('images/news/m_1.png')}}" class="img-circle"></div> -->
                            <div class="col-md-offset-1  col-md-10">
                                <div v-bind:class="item.class">     
                                    <div class="Input_Box">     
                                        <div contenteditable="true" class="Input_text" v-on:focus="showfoot(item.class,1)" v-on:blur="showfoot(item.class,0)"></div>                      
                                        <div class="Input_Foot none">
                                            <a class="imgBtn" href="javascript:void(0);">'◡'</a> 
                                            <a class="postBtn btn btn-news-default" v-on:click="doreplay(index)">登录并发表</a>
                                        </div>     
                                    </div> 
                                    <div class="faceDiv">
                                        <div class="emoji_container">
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="comment none">
                            <div class="commentitem pd-t-20 border-t-dashed" v-for="(val,i) in item.replaylist">
                                <div class="col-md-offset-1 col-md-1 head-img"><img src="{{asset('web/img/news/user_1.png')}}"></div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <p><span class="user-name">@{{val.user_name}}</span><span class="pd-l-20">[来自PC端]</span></p>
                                        </div>
                                        <div class="col-md-3 t-r date-str">
                                            @{{val.created_at}}
                                        </div>
                                    </div>
                                    <div class="row comment-content" v-html="val.content"> </div>
                                    
                                </div>
                                <div class="t-r">
                                    <a href="javascript:void(0);" v-on:click="handle(1,item.id,index)"><span class="glyphicon glyphicon-thumbs-up ding">[@{{item.likes_count}}]</span>&nbsp;</a>
                                    <a href="javascript:void(0);"  v-on:click="handle(0,item.id,index)" class="pd-l-10"><span class="glyphicon glyphicon-thumbs-down cai">[@{{item.dislike_count}}]</span></a>
                                    <a href="javascript:void(0);"  v-on:click="showreplay($event,index)" class="pd-l-10"  data-handle="1"><span class="glyphicon glyphicon-comment">[@{{item.commnets_count}}]</span></a>
                                    <a class="pd-l-10 replay" v-on:click="replay($event,index)" data-handle="1">回复</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
         </div>
    </section>

@endsection
@section('javascript')
    @parent
    <script type="text/javascript" src="{{asset('web/js/myemojiPl.js')}}"></script>
    <script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/js/comments.js')}}"></script>
@endsection