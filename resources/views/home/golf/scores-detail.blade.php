@extends('home.layouts.topics')
@section('title','海南体育赛事')
@section('styles')

    <style>

        /*---- 公共部分 -----*/
        *{margin:0; padding:0}
        ul,ol,li{ list-style:none; }

        .w1320 { width:1320px; }
        .w1000{ width: 1000px;}
        .t-r{
            text-align: right;}
        .hlh80{ height:80px; line-height:80px}
        .hlh100{ height:100px; line-height:100px}

        .ptb10 { padding: 10px  0; }/*padding-top & padding botton is 10px */
        .ptb20 { padding: 20px  0; }
        .ptb50 { padding: 50px  0; }

        .pt10{ padding-top: 10px; }
        .pt80{ padding-top: 80px; }

        .pb50{ padding-bottom: 50px; }
        .pb20{ padding-bottom: 20px;}
        /*----- end 公共 -----*/
        .container{ padding-left: 0px; padding-right: 0px;}

        /* 头部背景图*/
        .site-branding-area .row.header-bg{
            background: url('{{ asset("web/images/europe/banner.png")}}');
            height: 240px;
            margin: 40px 0px 0px 0px;
        }
        .site-branding-area .row h2{
            color: #fff;
            line-height: 345px;
            text-align: center;
            font-size: 30px;
        }

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
            background-color: #fff;
            height:60px;
        }

        /*----- 导航 ----- */
        .navbar-hns{
            margin-bottom: 0px;
        }
        .nav > li {
            margin-top:15px;
            margin-bottom:15px;

        }

        .nav > li > a {
            position: relative;
            display: inline-block;
            padding:2px 22px;
            /*border-right:0.5px solid #ffffaa;*/
        }

        .nav > li > a:hover, .nav > li > a:focus{
            text-decoration:none;
            background-color: transparent;
        }

        .navbar-hns .navbar-nav > li > a {
            color: #000;
            font-family: "Microsoft YaHei UI";
            font-weight: 700;
            font-size: 20px;
        }
        /*---- end 导航 -----*/
        /* 轮播图*/
        /*a.carousel-control{ top: 20px;}*/
        #banner .container{ width: 1000px;}
        #banner .carousel-inner{ height: 100%;}
        /*titlebar*/
        #cooperative h3{
            font-size: 18px;
        }
        h4.titlebar,#cooperative h3.titlebar{
            /*color: #000;*/
            font-weight: 700;
            line-height: 45px;
        }
        h4.titlebar a,#cooperative h3.titlebar a{
            color: #000;
        }
        h4.titlebar:before,#cooperative h3.titlebar:before{
            display: block;
            left: 0;
            content: '';
            height: 0;
            width: 100%;
            background-color: #000;
        }
        h4.titlebar:after,#cooperative h3.titlebar:after{
            display: block;
            left: 0;
            content: '';
            height: 9px;
            width: 100%;
            background: url("{{ asset('web/images/golf/line-bg-2.png') }}") no-repeat;
            border-top: 1px solid  #e8e8e8;
        }

       /* h3.titlebar{
            margin-bottom: 15px;
            height: 30px;
            font-size: 18px;
            line-height: 30px;
            font-weight: 700;
            text-indent: 20px;
            position: relative;
        }
        h2.titlebar:before, h2.titlebar:after,h3.titlebar:before, h3.titlebar:after{
            display: block;
            left:5px;
            content:'';
            position:absolute;
        }
        h3.titlebar:before{
            top:5px;
            width:5px;
            height:25px;
            background:#ec5508;
        }*/
        /*
        h3.titlebar:after{
            top:36px;
            width:100%;
            border-top:1px solid #ececec;
        }*/

        /*---- 新闻 -----*/
        .news-area p{
            word-wrap:break-word; 
            word-break:normal; 
            position: relative;
            line-height: 2rem;
            height: 7rem;
            overflow: hidden;
            clear: both;
        }
        .news-area li{
            position: relative;
            float:left;
            width:100%;
            /*width:33.3%;*/
            line-height:30px;
            font-size:14px;
            overflow: hidden;
            -ms-text-overflow: ellipsis;
            text-overflow: ellipsis;
            white-space:nowrap;
            box-sizing:border-box;
            text-indent: 3px;
            color: #000;
            font-size: 16px;
            padding:0px;
            word-wrap:break-word;
            word-break:break-all
        }
        .news-area li h4{
            font-size: 16px;
            font-weight: 700;
        }
        .news-area li:first-child:before{
            content: '';
            border: none;
            height: 0px;
            margin-bottom: 0px;
        }
        /*.news-area li:before{*/
            /*display: block;*/
            /*content: "";*/
            /*width: 99%;*/
            /*height: 10px;*/
            /*left: 0;*/
            /*top: 0px;*/
            /*margin-bottom: 20px;*/
            /*!*background: #ddd;*!*/
            /*border-top:1px solid #ddd;*/
        /*}*/
        /*.news-area li:after{
            display: block;
            content: "";
            width: 99%;
            height: 1px;
            left: 0;
            top: -100px;
            margin-bottom: 10px;
            background: #ddd;
        }*/
        .news-area li > a{
            margin-left:10px;
        }
        .news-area li .tags{
            color: rgb(250,0,0);
            border:1px solid #ddd;
            padding: 5px 15px;
            margin-right: 5px;
        }
        .news-area li .glyphicon-menu-right:before{
            font-size:13px;
        }
        .news-area li.item div{
            padding: 0;
        }

        /*精彩图说*/
        .news-pic .caption{
            /*height: 100px;*/
            padding: 20px 0;
        }
        .news-pic .caption h4{
            font-weight: 700;
        }



        /* 视频新闻 */
        .news-video video{
            /*border: 1px solid #eee;*/
            width: 100%;
            max-height: 240px;
            background: rgb(30,30,30);
            height: 300px;
            /*border-radius: 10px 10px 0px 0px;*/
        }
        .news-video p{
            background: rgb(198,225,148);
            text-align: center;
            font-size:15px;
            font-weight:600;
            line-height: 40px;
            /*color: #999;*/
        }
        .news-video p a{
            color: #333;
        }
        .news-video p a:hover{
            color: #999;
        }
        .news-video p:visited{
            background: rgb(198,225,100);
        }
        .more a{
            font-size: 16px;
            font-weight:700;
            color: #000;
        }
        .more a:hover{
            cursor: pointer;
        }
        .more .glyphicon:before{
            color: rgb(235,61,50);
            font-size: 13px;
            padding-right:10px;
        }
        /*--- footer ---*/
        .footer-area{
            background-color: #052a1d;
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
            width: 80%;
            margin-left: 15%;
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

        /*  3D图片轮播 */
        .htmleaf-container{
            margin: 0 auto;
        }

        .poster-main{
            position: relative;
            margin: 50px auto;
        }
        .poster-main .poster-list .poster-item{
            position: absolute;
            left: 0;
            top: 0;
        }
        .poster-main .poster-btn{
            position: absolute;
            top: 0;
            cursor: pointer;
        }
        .poster-main .poster-prev-btn{
            left: 0;
            background: url("web/images/btn_l.png") no-repeat center center;
        }
        .poster-main .poster-next-btn{
            right: 0;
            background: url("web/images/btn_r.png") no-repeat center center;
        }

        .carousel-caption {
            left:0;
            right:0;
            bottom:0;
            background: #333;
            background: rgba(0,0,0,0.75);
        }
        /* End 3D图片轮播*/

        /* banner 新样式*/
        .carousel-control.left {
                background-image: none;
                background: rgb(0,0,0,.5);
            }

            .carousel-control.right {
                right: 0;
                left: auto;
                background-image: none; 
                background: rgb(0,0,0,.5);
            }

            .carousel-control {
                position: absolute;
                top: 40%;
                bottom: 0;
                left: 0;
                width: 2%;
                font-size: 50px;
                color: #fff;
                text-align: center;
                text-shadow: none;
                background-color: rgba(0, 0, 0, 0);
                filter: alpha(opacity=50);
                opacity: .5;
            }

                .carousel-caption {
                    left:0;
                    right:0;
                    bottom:0;
                    padding-top:0;
                    padding-right: 30px;
                    padding-bottom: 0;
                    padding-left: 30px;
                    background: #333;
                    background: rgba(0,0,0,0.75);
                    text-align: left;
                }
                .carousel-caption h4,.carousel-caption p{
                    width: 70%;
                }

                .carousel-indicators {
                    position: absolute;
                    bottom: 10px;
                    right: 15px;
                    z-index: 15;
                    width: 100%;
                    padding-left: 0;
                    margin-left: -30%;
                    text-align: right;
                    list-style: none;

                    left: 0;
                    margin-left: 0;
                    padding-right: 15px;
                }

        /*合作伙伴*/
        #cooperative li{
            width: 16.666666667%;
            float: left;
            margin-bottom: 20px;
            text-align: center;
            /*padding: 5px;*/
        }
        #cooperative li img{
            height: 50px;
            text-align: center;
            /*width: 100%;*/
        }
        /*end 合作伙伴*/
                
                /*.set_center {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    -webkit-transform: translate(-50%, -50%);
                    -moz-transform: translate(-50%, -50%);
                    -ms-transform: translate(-50%, -50%);
                    -o-transform: translate(-50%, -50%);
                    transform: translate(-50%, -50%);
                  overflow: hidden;
                }*/
        /* End banner 新样式*/
        /*比分直播*/
        table.score-list{ width: 100%;}
        table.score-list thead th,table.score-list tbody td{ border:1px solid #999; padding:5px 10px;}
    </style>
@endsection



@section('content')

    <!-- 比赛动态 -->
    <section id="dynamic">
        <div class="news-area container w1000 ptb50">
            <div class="row">

                <div class="col-md-12">
                    <h4 class="titlebar"><a href="/news">比分直播</a></h4>
                    <table class="score-list">
                        <thead>
                            <th width="10%">序号</th>
                            <th width="20%">运动员</th>
                            <th width="20%">排位</th>
                            <th width="10%">round1</th>
                            <th width="10%">round2</th>
                            <th width="10%">round3</th>
                            <th width="10%">round4</th>
                            <th width="10%">总分</th>
                        </thead>
                        <tbody id="scores">
                            {{--<tr>--}}
                                {{--<td></td>--}}
                            {{--</tr>--}}
                        </tbody>

                    </table>
                    {{--<ul id="scores">--}}
                            {{--<li class="item">--}}
                                {{--<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>--}}
                                {{--2017海南公开赛赛程安排--}}
                            {{--</li>--}}
                    {{--</ul>--}}
                </div>
            </div>
        </div>
    </section>
    <!-- end 新闻动态 -->

   
@endsection


@section('script')
    <script type="text/javascript">
//        $(function(){
//            Carousel.init($("#carousel"));
//            $("#carousel").init();
//        });
//        setInterval("test()",300);
//        function test(){
//            console.log('======');
//        }
        getscore();
        setInterval("getscore()",31000);

        function getscore(){
            $.ajax({ url: '{{ url("golf/scores_detail") }}',
                type: "get",
                dataType: "json",
//            contentType: "application/x-www-form-urlencoded; charset=utf-8",
                success: function($data){
                    var html = '';
                    $('#scores').html(html);
                    for(var i=0;i<$data.length;i++){
//                        console.log("=data==",$data[i]['id']['0']);
                        var round = '';
                        for(var j=0;j<$data[i]['round'].length;j++){
                            round += '<td>'+$data[i]['round'][j]['total'][0]+'</td>';
                        }
                        round =
                        html = '<tr><td>'+(i+1)+'</td><td>'+$data[i]['cn-name']['0']+'</td><td>'+$data[i]['position']['0']+
                                '</td>'+round+'<td>'+$data[i]['total']+'</td></tr>';
//                    html = '<li class="item"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>2017海南公开赛赛程安排 </li>';
                        $('#scores').append(html);
                    }
                }});
        }


    </script>
@endsection