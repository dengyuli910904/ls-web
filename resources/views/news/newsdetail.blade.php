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
               <!--  
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
                </p> -->
            </div>
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
                        <textarea class="news-ipt" rows="3" width="80%" name="content" id="content"></textarea>
                        <p class="t-r">
                            <!-- <button>登录并发布</button> -->
                            <button type="button" class="btn btn-warning" onclick="docomments()">登录并发布</button>
                        </p>
                    </div>
                    <div class="col-md-1">
                        
                    </div>
                <!-- </form> -->
             </div>
            <div class="msg pd-t-50">
                <!-- <img src="{{asset('images/news/m_1.png')}}">     -->

                <!-- <div v-for="msglist in val" class="row border-t-dashed pd-t-10 pd-b-10">
                    <div class="row msg-item">
                        <div class="col-md-1 head-img"><img src="{{asset('images/news/m_1.png')}}" class="img-circle"></div>
                        <div class="col-md-11">
                            <div class="col-md-10">
                                <p><span class="user-name">用户名</span><span class="pd-l-20">[来自哪颗星系]</span></p>
                            </div>
                            <div class="col-md-2 t-r">
                                @{{val.created_at}}
                            </div>
                            <div class="col-md-12">
                                @{{val.content}}
                            </div>
                            <div class="t-r col-md-12">
                                <a href="#">顶&nbsp;<span class="ding">[22]</span></a>
                                <a href="#" class="pd-l-10">踩&nbsp;<span class="cai">[22]</span></a>
                                <a class="pd-l-10 replay" onclick="replay(this)" data-handle="1"><span>回复</span></a>
                            </div>
                        </div>
                    </div>
                    
                </div> -->
                <div class="row border-t-dashed pd-t-10 pd-b-10">
                    <div class="row msg-item">
                        <div class="col-md-1 head-img"><img src="{{asset('images/news/m_1.png')}}" class="img-circle"></div>
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
                                <a class="pd-l-10 replay" onclick="replay(this)" data-handle="1"><span>回复</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row border-t-dashed pd-t-10 pd-b-10">
                    <div class="row msg-item">
                        <div class="col-md-1 head-img"><img src="{{asset('images/news/m_1.png')}}" class="img-circle"></div>
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
                                <a class="pd-l-10 replay" onclick="replay(this)" data-handle="1"><span>回复</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="tpl_replay" class="row t-r none">
                    <div class="col-md-3 head-img"><img src="{{asset('images/news/m_1.png')}}" class="img-circle"></div>
                    <div class="col-md-8 t-r">
                        <textarea class="news-ipt" rows="3" width="80%"></textarea>
                        <p class="t-r">
                            <button>确认回复</button>
                        </p>
                    </div>
                </div>
                <!-- <div class="row border-t-dashed pd-t-10 pd-b-10">
                    <div class="col-md-1 head-img"><img src="{{asset('images/news/m_1.png')}}" class="img-circle"></div>
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
                    <div class="col-md-1 head-img"><img src="{{asset('images/news/m_1.png')}}" class="img-circle"></div>
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
            </div> -->
         </div>
         
    </section>
    <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
    <script type="text/javascript">
    // new Vue({
    //     el: '.msg',
    //     data: {
    //         todos: [
    //             { text: 'Learn Laravel' },
    //             { text: 'Learn Vue.js' },
    //             { text: 'At LaravelAcademy.org' }
    //         ]
    //     }
    // })


     function replay(e){
        if($(e).attr('data-handle') === "0"){
            $(e).find('span').html('回复');
            $(e).attr('data-handle',1);
            $(e).parent().parent().parent('.msg-item').find('#newplay').remove();
        }else{
            var rootdiv = $(e).parent().parent().parent('.msg-item');
            $(e).find('span').html('取消');
            $(e).attr('data-handle',0);
            var tpl = $('#tpl_replay').clone(true).attr('id','newplay').removeClass('none');
            rootdiv.append(tpl);
        }
     }
     // window.onload = function(){
     //    getcomments();
     // }
     // getcomments();
     function docomments(){
        var content = $('#content').val(),uuid = $('#news_uuid').val();
        $.ajax({
             headers: {
                'Content-Type':'application/json',
            },
            xhrFields: {
              withCredentials: true
            },
            type: "POST",
            url: "{{url('api/comments/add')}}",
            data: JSON.stringify({uuid: uuid,content:content}),
            dataType: "json",
            success: function(data){
                if(data.code === 200){
                    getcomments();
                }else{

                }
            } 
        });
     }
     function getcomments(){
        var content = $('#content').val(),uuid = $('#news_uuid').val();
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
                    // getcomments();
                }else{

                }
            } 
        });
     }
    </script>
@endsection
