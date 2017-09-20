@extends('home.layouts.web_without_banner')
@section('title','海南体育赛事')
@section('styles')
     @parent
    <!-- <link href="{{ asset('web/css/agency.css')}}" rel="stylesheet"> -->
    <link href="{{ asset('web/css/web.css')}}" rel="stylesheet">
    <!-- <link href="{{ asset('web/css/myemojiPl.css')}}" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('web/css/golf.css') }}"> -->
    <style type="text/css">
    /*---- 公共部分 -----*/
        *{margin:0; padding:0}
        ul,ol,li{ list-style:none; }

        .w1000 { width:1000px; }

        .hlh80{ height:80px; line-height:80px}
        .hlh100{ height:100px; line-height:100px}

        .ptb10 { padding: 10px  0; }/*padding-top & padding botton is 10px */
        .ptb20 { padding: 20px  0; }

        .pt10{ padding-top: 10px; }
        .pt80{ padding-top: 80px; }

        .pb50{ padding-bottom: 50px; }
        /*----- end 公共 -----*/

    h4{ line-height: 60px; color: rgb(75,75,75);}

    .news-content img{ text-align: center; max-width: 100%;}
    /* 导航 */
     .form-control:focus {
            border-color: #f29000;
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(236, 85, 8, 0.6);
            box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(236, 85, 8, 0.6);
        }

        a{
            color: #9a9a9a;
            text-decoration: none;
        }

        a:hover, a:focus{
            color: #f29000;
            text-decoration: none;
        }

        .menubg{
            background-color: #f29000;
            height:60px;
        }
        /*----- 导航 ----- */
        .nav > li {
            margin-top:15px;
            margin-bottom:15px;

        }

        .nav > li > a {
            position: relative;
            display: inline-block;
            padding:2px 30px;
            border-right:0.5px solid #ffffaa;
        }

        .nav > li > a:hover, .nav > li > a:focus{
            text-decoration:none;
            background-color: transparent;
        }

        .navbar-hns .navbar-nav > li > a {
            color: #fff;
            font-family: "Microsoft YaHei UI";
            font-size: 20px;
        }
        /*---- end 导航 -----*/
         /*二级菜单样式*/
        .nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
            background-color: #f29000;
            border-color: #ffffaa;
        }
        .dropdown-menu>li>a {
            display: block;
            padding: 3px 20px;
            clear: both;
            font-weight: 500;
            font-size: 16px;
            line-height: 1.72857143;
            color: #333;
            white-space: nowrap;
        }
        .dropdown-menu {
            border: 1px solid #f29000;
            /*top: 150%;*/
        }
        /*End 二级菜单样式*/
        
    /*--- footer ---*/
    .footer-area{
        background-color: #535353;
    }
    .footer-area .partner-list:after{
        content: '';
        height: 1px;
        width: 100%;
        background: #eee;
        top: 100%;
        left: 0;
    }
    .footer-area ul{
        width: 50%;
        margin-left: 25%;
    }
    .footer-area ul:before{

    }
    .footer-area ul li{
        color: #fff;
        font-size: 16px;
        font-weight: 600;
        padding: 10px 30px;
    }

    .cr{
        color:#fff;
    }

    .cr .col-md-4{
        height:60px;
        border-right: 0.5px solid rgba(255,255,255,0.3);
    }
    .footer-area h3{ font-size: 24px;}



    /* 视频样式*/
    #cans{
        position: relative;
        margin: 50px auto;
        margin-top: 5vh;
        height: 500px;
        width: 1000px;
    }
    #video{
        /*height: 80vh;*/
        float: left;
        background: black;
        position: relative;   /*去掉这句将会使得video优先级失效*/
        z-index: 99;
        width: 800px;
    }

    aside#playList{
        float: left;
        height: 500px;
        width: 10vw;
        background: black;
        opacity: 0.9;
        position: relative;
    }
    aside#playList header h4{
        color: white;
        margin-bottom: 20px;
        margin-top: 5px;
        text-align: center;
    }
    aside#playList header h4:after{
        content: '';
        left: 0;
        display: block;
        width: 100%;
        height: 1px;
        background: #fff;
    }
    aside ul{
        background: black;
        width: 190px;
        list-style: none;
        text-align: center;
    }
    /*aside ul li:after{
        content: '';
        left: 5%;
        margin-left: 5%;
        display: block;
        width: 90%;
        height: 1px;
        background: #fff;
    }*/
    aside ul li{
        color: white;
        font-size: 14px;
        line-height:30px ;
    }

    aside ul li:hover{
        cursor: pointer;
        background-color: #f29000;
        color: #fff;
        font-weight: bold;
        font-size: 15px;
        line-height: 40px;
    }

    aside #playList-hidden {
        position: absolute;
        bottom: 250px;
        right: 0;
        width:20px ;
        height: 32px;
        background: lightgoldenrodyellow;
        font-size: 16px;
        font-weight: bold;
        border-top-left-radius:10px ;
        border-bottom-left-radius:10px ;
        opacity: 0.5;
        z-index: 10000;
    }

    #cans #playList-show1{
        margin-top: 230px;
        width:20px ;
        height: 32px;
        background:lightgoldenrodyellow;
        font-size: 16px;
        font-weight: bold;
        border-top-right-radius:10px ;
        border-bottom-right-radius:10px ;
        opacity: 1;
        visibility: hidden;
    }

    #cans #playList-show1:hover,aside #playList-hidden:hover{
        opacity: 0.7;
    }
    .select{
        color: lightcoral;
    }
    /*End 视频样式*/
    </style>
@endsection

@section('content')
    <div class="container border-b">
        首页&nbsp;>&nbsp;视频
    </div>
    <section class="pd-t-20 pd-b-20" id="news-detail">
         <div class="container  w1000">
            <!-- <div style="100%"> -->
                <div id="cans">
                    <video controls="controls" id="video"　src="" poster="" height="500px" >
                        
                    </video>
                    <aside id="playList">
                        <header>
                            <h4>播放列表</h4>
                        </header>
                        <ul>
                            <li value="http://lsweb.oss-cn-shenzhen.aliyuncs.com/videos/2015%E6%B5%B7%E5%8D%97%E5%85%AC%E5%BC%80%E8%B5%9B%E5%AE%A3%E4%BC%A0%E7%89%87%E5%AD%97%E5%B9%95%E7%89%88.mov" title="2015海南公开赛宣传片">2015海南公开赛宣传片</li>
                            <li value="http://lsweb.oss-cn-shenzhen.aliyuncs.com/videos/%E4%B8%9A%E4%BD%99%E8%B5%9B%E5%86%B3%E8%B5%9B%E8%BD%AE%E8%A7%86%E9%A2%91%E7%B4%A0%E6%9D%90.mov" title="业余赛决赛轮视频">业余赛决赛轮视频</li>
                            <li value="http://lsweb.oss-cn-shenzhen.aliyuncs.com/videos/%E5%B9%BF%E5%B7%9E%E7%AB%99%E8%A7%86%E9%A2%91.mp4" title="广州站视频">广州站视频</li>
                        </ul>
                        <!--<button title="展开播放列表" id="playList-show"> > </button>-->
                        <button title="收起播放列表" id="playList-hidden"> < </button>
                    </aside>
                    <button title="展开播放列表" id="playList-show1"> > </button>
                    
                </div>
            <!-- </div> -->
         </div>
    </section>
   
@endsection

@section('script')
    <script type="text/javascript"> 
        window.onload = function(){
    
            var video = document.getElementById("video");
            var lis = document.getElementById('playList').getElementsByTagName("li");
            var vLen = lis.length; // 播放列表的长度
            var url = [];
            var ctrl = document.getElementById("playList-hidden");
            var ctrl_show = document.getElementById('playList-show1');
            var aside = document.getElementById("playList");
            var curr = 1; // 当前播放的视频
            
            for(var i=0;i<lis.length;i++){
                
                    url[i] = lis[i].getAttribute("value");
                    
            }
            
            //绑定单击事件
            for(var i=0;i<lis.length;i++){
                
                    lis[i].onclick = function(){
                        for(var j=0;j<lis.length;j++){
                            if(lis[j] == this){
                                video.setAttribute("src",this.getAttribute("value"));
                                video.setAttribute('autoplay','autoplay');
                                this.innerHTML = '<label>正在播放</label> '+this.innerHTML;
                                this.className = "select-video";
                                curr = j+1;
                            }else{
                                lis[j].innerHTML = lis[j].getAttribute("title");
                                lis[j].className = "";
                            }
                        }
                        
                    
        //          console.log(this.getAttribute("value"));  //调试代码
                }
                    
            }   
            
            //收起播放列表
            ctrl.onclick = function(){
                
                aside.style.transition = "1s";
                aside.style.transform = "translateX(-10vw)";
                setTimeout(function(){
                    aside.style.display = "none";
                    ctrl_show.style.visibility= 'visible';
                },"1000");
            
            }
            
            //展开播放列表
            ctrl_show.onclick = function(){
                aside.style.display = "block";
                ctrl_show.style.visibility= 'hidden';
                setTimeout(function(){
                    aside.style.transform = "translateX(0vw)";
                },"0");
            
            }

            video.setAttribute('src',url[0]);
            lis[0].innerHTML = '<label>正在播放</label> '+lis[0].innerHTML;
            lis[0].className = "select-video";
            
            
            
            video.addEventListener('ended', play);
            //play();
            function play() {
               video.src = url[curr];
               video.load(); // 如果短的话，可以加载完成之后再播放，监听 canplaythrough 事件即可
               video.play();
               
               for(var j=0;j<lis.length;j++){
                    if(j == curr){
                        video.setAttribute("src",lis[j].getAttribute("value"));
                        video.setAttribute('autoplay','autoplay');
                        lis[j].innerHTML = '<label>正在播放</label> '+lis[j].innerHTML;
                        lis[j].className = "select-video";
                    }else{
                        lis[j].innerHTML = lis[j].getAttribute("title");
                        lis[j].className = "";
                    }
                }
               curr++;
               if (curr >= vLen) curr = 0; // 播放完了，重新播放
            }
            
        }

    </script>
<!-- <script type="text/javascript" src="{{asset('web/js/myemojiPl.js')}}"></script>
<script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js" charset="utf-8"></script>
<script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
<script type="text/javascript" src="{{asset('web/js/comments.js')}}"></script> -->
@endsection