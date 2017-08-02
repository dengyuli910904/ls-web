@extends('home.layouts.web_without_banner')
@section('title','关于我们')
@section('styles')
    @parent
    <link href="{{ asset('web/css/about.css')}}" rel="stylesheet">
    <link href="{{ asset('web/css/agency.css')}}" rel="stylesheet">
    <link href="{{ asset('css/web.css')}}" rel="stylesheet">
    <style type="text/css">

        /*---- 公共部分 -----*/
        *{margin:0; padding:0}
        ul,ol,li{ list-style:none; }

        .w1000 { width:1000px; }

        /*----- end 公共 -----*/


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


        /*--- footer ---*/
        .footer-area{
            background-color: #535353;
        }

        .cr{
            color:#fff;
        }

        .cr .col-md-4{
            height:60px;
            border-right: 0.5px solid rgba(255,255,255,0.3);
        }

    </style>
@endsection
@section('content')
    <section class="pd-t-10">
        <div class="container w1000">
            <div class="row">
                <div class="col-md-offset-2 col-md-10">
                    <ul class="nav-about-title">
                        <li><a href="#" class="active">公司简介</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/team')}}">管理团队</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/culture')}}">公司文化</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/history')}}">发展经历</a></li>
                        <li><a href="javascript:void(0);" class="line-h">|</a></li>
                        <li><a href="{{url('about/connectus')}}">联系我们</a></li>
                    </ul>
                </div>
            </div>
            <div class="t-c">
                <img src="{{asset('images/about/about-banner.png')}}" style="width:100%;">
            </div>

            <div class="pd-t-20">
                <h4 class="b-l-main-5 pd-l-10"> 公司简介</h4>
                <hr/>
                <!-- <blockquote> -->
                    <p class="tx-indent">海南体育赛事有限公司（简称“赛事公司”）成立于2008年，注册资本壹亿元，系海南省文体厅旗下事业单位海南省体育赛事中心的全资子公司。
                    要负责运营海南岛国际公路自行车赛、环海南岛国际大帆船赛、海南省高尔夫公开赛、海南（三亚）国际马拉松四大品牌赛事。
                    </p>
                    <p class="tx-indent">为贯彻落实省委、省政府加快文体产业发展的部署，2016年12月，海南省人民政府和阿里巴巴集团签订战略合作框架协议，
                        赛事公司引进阿里体育战略投资。在“互联网+体育”的战略指导下，阿里体育和赛事公司将依托阿里巴巴集团的品牌和资源优势，以海南为重要基地，
                        背靠阿里生态中强大的电商、媒体、营销、视频、家庭娱乐、智能设备、云计算大数据和金融等平台，融合形成一个贯穿赛事运营，版权，媒体，商业开发，
                        票务等环节的全新产业生态。
                    </p>
                    <p class="tx-indent">赛事公司打造专业体育产业运营团队，重点布局体育赛事运营、青少年体育培训、体育基地建设运营和体育彩票等体育产业板块。整合政策、
                        人才、资金等优势资源，全面宣传国际旅游岛，促进体育、旅游等相关产业的全面发展。
                    </p>
                    <p class="tx-indent">公司具有完备的管理架构和完善的管理制度，严格按现代企业制度运行和管理，具有全新的体制、机制优势和资源优势。公司将员人才视为第一资源，
                        把公司与员工的共同发展视为第一目标，拥有一支年轻、富有活力、专业精干、基于共同梦想的专业团队。
                        公司将为每一名致力于文体产业发展的梦想者提供高端的发展平台，同时提供稳定的工作环境、优厚的薪酬与福利待遇。
                    </p>
                    <p class="tx-indent">这里是一群完美主义者，一个充满智慧、协力合作的团队。我们在热情、有序中热烈生长。我们正在向更高的目标努力，志趣相投、
                        志同道合的工作伙伴是我们向上生长的动力。 
                    </p>
                    <p class="tx-indent">是雄鹰，当展翅翱翔；是玫瑰，就应尽情绽放。我们期待有理想、有激情、有责任心，具有体育、文化行业从业经验及热爱体育文化事业的优秀人才加盟，
                        与海南体育赛事有限公司共同成长，与中国体育产业、文化产业共同成长。
                    </p>
                <!-- </blockquote> -->
            </div>
        </div>
    </section>
@endsection
