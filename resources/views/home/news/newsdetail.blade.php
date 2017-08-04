@extends('home.layouts.web_without_banner')
@section('title','新闻详情')
@section('styles')
    @parent
    <link href="{{ asset('web/css/agency.css')}}" rel="stylesheet">
    <link href="{{ asset('css/web.css')}}" rel="stylesheet">
    <link href="{{ asset('web/css/myemojiPl.css')}}" rel="stylesheet">
    <style type="text/css">
    .w1000{ width: 1000px;}
    h4{ line-height: 60px; color: rgb(75,75,75);}
    .news-content img{ text-align: center; max-width: 100%;}


    /*Start Share*/
    #ak_share         { padding:10px 0; font-size:12px; }
    .ak_share         { height:1%; overflow:hidden; }
    .ak_share dt { float:left; font-weight:bold; color:#A5A5A5; height:16px; line-height:16px; }
    .ak_share dd { margin-right:10px; margin-left:0; height:16px; float:left;  }
    .ak_share a:hover { color:#ed7811; text-decoration:underline;}
    .ak_share a         { float:left; height:16px; line-height:16px; padding-left:18px; background:url(http://www.yem120.com/images/share.gif) left top no-repeat; color:#666; text-decoration:none; }

    .ak_share .t_163_s         { background-position: 0 -16px; }
    .ak_share .t_qq_s         { background-position: 0 -32px; }
    .ak_share .qzone_s         { background-position: 0 -48px; }
    .ak_share .douban_s         { background-position: 0 -64px; }
    /*End Share*/  
    </style>
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
         <div class="container w1000">
            <div style="width:660px;">
                <div class="row">
                    <div class="col-md-12  pd-b-10 t-c">
                        <h4>{{$data->title}}</h4>
                        <p>发布时间 {{$data->newtime}}   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;来源：{{$data->resource}}</p>
                    </div>
                    <div class="t-r">
                        <span class="pd-l-10 glyphicon glyphicon-eye-open"> 阅读 {{$data->read_count}}人</span>
                        <span class="pd-l-20 glyphicon glyphicon-star"> 收藏 {{$data->collect_count}}人</span>
                        <span class="pd-l-20 glyphicon glyphicon-pencil"> 参与 {{$data->click_count}}人</span>
                    </div>
                </div>
                <div class="row news-content pd-t-30">
                    <?php
                        echo "{$data->content}";
                    ?>
                  
                </div>
            </div>
            <div id="my-app">
                <div class="t-r row msg-handle pd-b-20">
                    

                    <div>
                        <span class="glyphicon glyphicon-star-empty"></span>
                        <span class="glyphicon glyphicon-star"></span>
                    </div>
                    <!-- <div id="ak_share">
                        <dl class="ak_share">
                            <dt>分享：</dt>
                            <dd>
                                <a class="t_sina_s" href="javascript:(function(){window.open('http://v.t.sina.com.cn/share/share.php?title='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href)+'&source=bookmark','_blank','width=450,height=400');})()" title="分享到新浪微博" rel="nofollow">
                                新浪微博</a>
                            </dd>
                            <dd>
                                <a class="t_163_s" href="javascript:(function(){window.open('http://t.163.com/article/user /checkLogin.do?link=http://news.163.com/&source=' + '&info='+encodeURIComponent(document.title)+' '+encodeURIComponent(location.href),'_blank','width=510,height=300');})()" title="分享到网易微博" rel="nofollow">
                                网易微博</a> 
                            </dd>
                            <dd>
                                <a class="t_qq_s" href="javascript:(function(){window.open('http://v.t.qq.com/share/share.php?title='+encodeURIComponent(document.title)+'&url='+encodeURIComponent(location.href)+'&source=bookmark','_blank','width=610,height=350');})()" title="分享到腾讯微博" rel="nofollow">
                                腾讯微博</a>
                            </dd>
                            <dd>
                                <a class="qzone_s" href="javascript:void(window.open('http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+encodeURIComponent(document.location.href)));" title="分享到QQ空间" rel="nofollow">
                                QQ空间</a>
                            </dd>
                            <dd>
                                <a class="douban_s" href="javascript:void(function(){var%20d=document,e=encodeURIComponent,s1=window.getSelection,s2=d.getSelection,s3=d.selection,s=s1?s1():s2?s2():s3?s3.createRange().text:' ',r='http://www.douban.com/recommend/?url='+e(d.location.href)+'&title='+e(d.title)+'&sel='+e(s)+'&v=1',x=function(){if(!window.open(r,'douban','toolbar=0,resizable=1,scrollbars=yes,status=1,width=450,height=330'))location.href=r+'&r=1'};if(/firefox/.test(navigator.userAgent)){setTimeout(x,0)}else{x()}})()" title="推荐到豆瓣" rel="nofollow">豆瓣</a>
                            </dd>
                        </dl>
                    </div> -->
                    <!-- <div class="jiathis_style">
                        <a class="jiathis_button_qzone"></a>
                        <a class="jiathis_button_tsina"></a>
                        <a class="jiathis_button_tqq"></a>
                        <a class="jiathis_button_weixin"></a>
                        <a class="jiathis_button_renren"></a>
                        <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
                    </div> -->
                    
                    <!-- JiaThis Button END -->
                </div>
                <div class="border-t-dashed m-t-20 row" style="clear:both;"></div>
                <div class="row pd-t-50">
                    <p>共<span>@{{msgcount}}</span>条评论</p>
                    <input type="hidden" name="uuid" id="news_uuid" value="{{$data->id}}">
                    <input type="hidden" name="msgcount" id="msgcount" value="{{$data->msgcount}}">
                    <div class="Main3 comment_input">     
                        <div class="Input_Box">     
                            <div contenteditable="true" class="Input_text"></div>                      
                          <div class="Input_Foot">
                            <a class="imgBtn" href="javascript:void(0);">'◡'</a> 
                            <a class="btn btn-news-default" v-on:click="docomments()">登录并发表</a>
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
                                    <span v-on:click="showreplay($event,index)" data-handle="1" class="pd-l-10 glyphicon glyphicon-comment">[@{{item.comments_count}}]</span>
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
                                            <a class="btn btn-news-default" v-on:click="doreplay(index)">登录并发表</a>
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
                                    <a href="javascript:void(0);" v-on:click="handle(1,item.id,index)"><span class="glyphicon glyphicon-thumbs-up ding">[@{{val.likes_count}}]</span>&nbsp;</a>
                                    <a href="javascript:void(0);"  v-on:click="handle(0,item.id,index)" class="pd-l-10"><span class="glyphicon glyphicon-thumbs-down cai">[@{{val.dislike_count}}]</span></a>
                                    <!-- <a href="javascript:void(0);"  v-on:click="showreplay($event,index)" class="pd-l-10"  data-handle="1"><span class="glyphicon glyphicon-comment">[@{{val.comments_count}}]</span></a>
                                    <a class="pd-l-10 replay" v-on:click="replay($event,index)" data-handle="1">回复</a> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
         </div>
    </section>

@endsection
@section('script')
   
    <script type="text/javascript" src="{{asset('web/js/myemojiPl.js')}}"></script>
    <script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <script type="text/javascript" src="{{asset('web/js/comments.js')}}"></script>
@endsection