@extends('layouts.web-no-banner')

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
                    <span>阅读数：{{$data->read_count}}人</span>
                    <span class="pd-l-10">  收藏：{{$data->collect_count}}人</span>
                    <span class="pd-l-10">   参与人数：{{$data->click_count}}人</span>
                </div>
            </div>
            <div class="row news-content">
                <?php
                    echo "{$data->content}";
                ?>
              
            </div>
            <div id="my-app">
                <div class="t-r msg-handle">
                    <span><img src="{{asset('images/news/collect.png')}}"></span><span class="pd-l-20"><img src="{{asset('images/news/share.png')}}"></span>
                
                    <!-- JiaThis Button BEGIN -->
                    <div class="jiathis_style">
                        <span class="jiathis_txt">分享到：</span>
                        <a class="jiathis_button_tools_1"></a>
                        <a class="jiathis_button_tools_2"></a>
                        <a class="jiathis_button_tools_3"></a>
                        <a class="jiathis_button_tools_4"></a>
                        <!-- <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">更多</a> -->
                    </div>
                    <script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
                    <!-- JiaThis Button END -->
                </div>
             
                 <div class="row pd-t-50">
                    <!-- <form action="{{url('comments/add')}}" method="Post"> -->
                        <input type="hidden" name="uuid" id="news_uuid" value="{{$data->news_uuid}}">
                        <div class="col-md-2 t-r">
                            <img src="{{asset('images/news/m_1.png')}}" class="img-circle">
                        </div>
                        
                        <div class="col-md-9">
                            <textarea class="news-ipt" rows="3" width="80%" name="content" id="content" v-model="newsdata.content"></textarea>
                            <p class="t-r">
                                <!-- <button>登录并发布</button> -->
                                <button type="button" class="btn btn-warning" v-on:click="docomments()">登录并发布</button>
                            </p>
                        </div>
                        <div class="col-md-1">
                            
                        </div>
                    <!-- </form> -->
                 </div>
                <div class="msg pd-t-50">

                    <div v-for="(item,index) in newslist" class="row border-t-dashed pd-t-10 pd-b-10">
                        <div class="row msg-item">
                            <div class="col-md-1 head-img"><img src="{{asset('images/news/m_1.png')}}" class="img-circle"></div>
                            <div class="col-md-11">
                                <div class="col-md-10">
                                    <p><span class="user-name">用户名</span><!-- <span class="pd-l-20">[来自哪颗星系]</span> --></p>
                                </div>
                                <div class="col-md-2 t-r">
                                    @{{item.created_at}}
                                </div>
                                <div class="col-md-12">
                                    @{{item.content}}
                                </div>
                                <div class="t-r col-md-12">
                                    <a href="javascript:void(0);" v-on:click="handle(1,item.comments_id,index)">顶&nbsp;<span class="ding">[@{{item.likes_count}}]</span></a>
                                    <a href="javascript:void(0);"  v-on:click="handle(0,item.comments_id,index)" class="pd-l-10">踩&nbsp;<span class="cai">[@{{item.dislike_count}}]</span></a>
                                    <a href="javascript:void(0);"  v-on:click="showreplay()" class="pd-l-10">评论数&nbsp;<span class="cai">[0]</span></a>
                                    <a class="pd-l-10 replay" v-on:click="replay($event,item.user_id,item.comments_id,item.top_id,item.level)" data-handle="1" data-uid="item.user_id" data-pid="item.comments_id" data-level = "item.level" data-tid="item.top_id"><span>回复</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row t-r replay none">
                            <div class="col-md-3 head-img"><img src="{{asset('images/news/m_1.png')}}" class="img-circle"></div>
                            <div class="col-md-8 t-r">
                                <textarea class="news-ipt" rows="3" width="80%"  v-model="replaydata.content"></textarea>
                                <p class="t-r">
                                    <button v-on:click="doreplay()">确认回复</button>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div id="tpl_replay" class="row t-r none">
                        <div class="col-md-3 head-img"><img src="{{asset('images/news/m_1.png')}}" class="img-circle"></div>
                        <div class="col-md-8 t-r">
                            <textarea class="news-ipt" rows="3" width="80%">@{{replaydata.content}}</textarea>
                            <p class="t-r">
                                <button v-on:click="doreplay()">确认回复</button>
                            </p>
                        </div>
                    </div>
                </div>
         </div>
         
    </section>
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <script type="text/javascript">

    var vue = new Vue({
        el:'#my-app',
        data:{
            newslist:'',
            ishandle: false,
            newsdata:{
                content:'',
                uuid:$('#news_uuid').val(),
                user_id:1,
                // parent_uuid:'',
                // level:'',
                // top_id:''
            },
            replaydata:{
                content:'',
                uuid:$('#news_uuid').val(),
                user_id:'',
                parent_uuid:'',
                level:'',
                top_id:''
            }
        },
        methods:{
            shownews:function(){
                var self = this;
                var uuid = $('#news_uuid').val();
                $.ajax({
                     headers: {
                        'Content-Type':'application/json',
                    },
                    xhrFields: {
                      withCredentials: true
                    },
                    type: "GET",
                    url: "{{url('api/comments/getmsg?uuid=')}}"+uuid,
                    // data: JSON.stringify({uuid: uuid}),
                    dataType: "json",
                    success: function(data){
                        if(data.code === 200){
                            self.newslist = data.data;
                        }else{

                        }
                    } 
                });
            },
            handle:function(is_like,id,i){
                var self = this;
                if(!self.ishandle){
                    self.ishandle = true;
                    var url = "{{url('api/comments/likes?uuid=')}}"+id;
                    if(!is_like){
                        url = "{{url('api/comments/dislikes?uuid=')}}"+id;
                    }
                    $.ajax({
                         headers: {
                            'Content-Type':'application/json',
                        },
                        xhrFields: {
                          withCredentials: true
                        },
                        type: "POST",
                        url: url,
                        // data: JSON.stringify({uuid: uuid}),
                        dataType: "json",
                        success: function(data){
                            if(data.code === 200){
                                if(is_like){
                                    self.newslist[i]['likes_count'] ++;
                                }else{
                                    self.newslist[i]['dislike_count'] ++;
                                }
                            }else{

                            }
                        } 
                    });
                }
            },
            doreplay:function(){
                var self = this;
                // alert(self.replaydata.content);
                // return false;
                $.ajax({
                         headers: {
                            'Content-Type':'application/json',
                        },
                        xhrFields: {
                          withCredentials: true
                        },
                        type: "POST",
                        url: "{{url('api/comments/replay')}}",
                        data: JSON.stringify(self.replaydata),
                        dataType: "json",
                        success: function(data){
                            if(data.code === 200){
                                
                            }else{

                            }
                        } 
                    });
            },
            replay:function(e,user_id,comments_id,top_id,level){
                var self = this;
                self.replaydata.user_id = user_id;
                self.replaydata.parent_uuid = comments_id;
                self.replaydata.level = parseInt(level)+1;
                self.replaydata.top_id = top_id;

                var a = $(e.currentTarget);
                if(a.attr('data-handle') === "0"){
                    a.find('span').html('回复');
                    a.attr('data-handle',1);
                    a.parent().parent().parent('.msg-item').parent().find('.replay').addClass('none');
                }else{
                    // var rootdiv = a.parent().parent().parent('.msg-item');
                    a.find('span').html('取消');
                    a.attr('data-handle',0);
                    a.parent().parent().parent('.msg-item').parent().find('.replay').removeClass('none');
                    // rootdiv.append(tpl);
                }
            },
            docomments:function(){
                var self = this;
                $.ajax({
                     headers: {
                        'Content-Type':'application/json',
                    },
                    xhrFields: {
                      withCredentials: true
                    },
                    type: "POST",
                    url: "{{url('api/comments/add')}}",
                    data: JSON.stringify(self.newsdata),
                    dataType: "json",
                    success: function(data){
                        if(data.code === 200){
                            self.newsdata.content = "";
                            self.newslist.push(data.data);
                        }else{

                        }
                    } 
                });
            }
            // replay:function(e,user_id,comments_id,top_id,level){
            //     var self = this;
            //     self.replaydata.user_id = user_id;
            //     self.replaydata.parent_uuid = comments_id;
            //     self.replaydata.level = parseInt(level)+1;
            //     self.replaydata.top_id = top_id;

            //     var a = $(e.currentTarget);
            //     if(a.attr('data-handle') === "0"){
            //         a.find('span').html('回复');
            //         a.attr('data-handle',1);
            //         a.parent().parent().parent('.msg-item').find('#newplay').remove();
            //     }else{
            //         var rootdiv = a.parent().parent().parent('.msg-item');
            //         a.find('span').html('取消');
            //         a.attr('data-handle',0);
            //         var tpl = $('#tpl_replay').clone(true)
            //         .attr('id','newplay')
            //         // .attr('data-uid',a.attr('data-uid'))
            //         // .attr('data-pid',a.attr('data-pid'))
            //         // .attr('data-level',parseInt(a.attr('data-level'))+1)
            //         // .attr('data-tid',a.attr('data-tid'))
            //         .removeClass('none');
            //         rootdiv.append(tpl);
            //     }
            // }
        }
    });
    vue.shownews();
     // function replay(e){
     //    //data-uid='item.user_id' data-pid="item.comments_id" data-level = "item.level" data-tid="item.top_id"
     //    if($(e).attr('data-handle') === "0"){
     //        $(e).find('span').html('回复');
     //        $(e).attr('data-handle',1);
     //        $(e).parent().parent().parent('.msg-item').find('#newplay').remove();
     //    }else{
     //        var rootdiv = $(e).parent().parent().parent('.msg-item');
     //        $(e).find('span').html('取消');
     //        $(e).attr('data-handle',0);
     //        var tpl = $('#tpl_replay').clone(true)
     //        .attr('id','newplay')
     //        .attr('data-uid',$(e).attr('data-uid'))
     //        .attr('data-pid',$(e).attr('data-pid'))
     //        .attr('data-level',parseInt($(e).attr('data-level'))+1)
     //        .attr('data-tid',$(e).attr('data-tid'))
     //        .removeClass('none');
     //        rootdiv.append(tpl);
     //    }
     // }
     // window.onload = function(){
     //    getcomments();
     // }
     // getcomments();
     // function docomments(){
     //    var content = $('#content').val(),uuid = $('#news_uuid').val();
     //    $.ajax({ 
     //         headers: {
     //            'Content-Type':'application/json',
     //        },
     //        xhrFields: {
     //          withCredentials: true
     //        },
     //        type: "POST",
     //        url: "{{url('api/comments/add')}}",
     //        data: JSON.stringify({uuid: uuid,content:content}),
     //        dataType: "json",
     //        success: function(data){
     //            if(data.code === 200){
     //                getcomments();
     //            }else{

     //            }
     //        } 
     //    });
     // }
     // function getcomments(){
     //    var content = $('#content').val(),uuid = $('#news_uuid').val();
     //    $.ajax({
     //         headers: {
     //            'Content-Type':'application/json',
     //        },
     //        xhrFields: {
     //          withCredentials: true
     //        },
     //        type: "GET",
     //        url: "{{url('api/comments/getmsg?uuid=')}}"+uuid,
     //        // data: JSON.stringify({uuid: uuid}),
     //        dataType: "json",
     //        success: function(data){
     //            if(data.code === 200){
     //                // getcomments();
     //            }else{

     //            }
     //        } 
     //    });
     // }
    </script>
@endsection
