<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @section('style')
    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('web/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <!-- <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'> -->

    <!-- Theme CSS -->
    <link href="{{ asset('web/css/agency.css')}}" rel="stylesheet">

    <link href="{{ asset('css/web.css')}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->

    <script src="{{ asset('js/app.js') }}"></script>
    @show
</head>
<body id="page-top" class="index">
        <!-- <nav class="">
            logo
        </nav> -->
    <!-- Navigation -->
    <nav id="mainNav" class=""><!-- navbar-fixed-top -->
        <div class="nav-logo row">
            <div class="container">
                <!-- <div class="col-md-2 col-xs-3"> -->
                    <img src=" {{ asset('images/logo_1.png')}}"  height="40px">
                <!-- </div> -->
                <!-- <div class="col-md-2  col-xs-3 col-md-offset-8 col-xs-offset-6">
                    <img src=" {{ asset('images/erweima.png')}}"  height="70px">
                </div> -->
            </div>
            <!-- <div class="col-md-offset-2">
                <img src=" {{ asset('images/logo.png')}}" class="img-responsive" width="120px">
            </div> -->
        </div>
       <!--  <div class="row" style="text-align:center;">
            <ul style="list-style:none;">
              <li style="display:inline;">新闻</li>
              <li style="display:inline;">谈论</li>
              <li style="display:inline;">体育</li>
              <li style="display:inline;">音乐</li>
              <li style="display:inline;">娱乐</li>
            </ul>
        </div> -->
        <div class="navbar navbar-default navbar-custom nav-theme">
            <div class="container">
            
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> 菜单 <i class="fa fa-bars"></i>
                    </button>
                    <!-- <a class="navbar-brand page-scroll" href="#page-top">
                        <img src="img/logo@2x.png">
                    </a> -->
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav"> <!-- navbar-right -->
                       <!--  <li class="hidden">
                            <a href="#page-top"></a>
                        </li> -->
                        <li>
                            <a class="page-scroll" href="{{url('/')}}">首页</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{url('/news')}}">最新发布</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{url('/news')}}">热门新闻</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{url('/news')}}">推荐新闻</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#team">专题报道</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#team">招贤纳士</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#team">关于我们</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </div>
    </nav>
    @yield('content')


    <footer class="footer-theme">
        <div class="container">
            <div class="row">
                <img src="{{asset('images/logo.jpg')}}"  height="60px">
                <!-- <img src="{{asset('images/erweima.png')}}" height="100px">  -->
            </div>
            <div class="row">
                <h3>海南体育赛事频道</h3>
            </div>
            <div class="row pd-t-10">
                <!-- <div class="col-md-2"></div> -->
                <div class="col-md-3  col-xs-6 col-lg-3 t-l">
                    <p class=" b-r">地址：深圳市南山区深南大道</p>
                </div>
                <div class="col-md-3  col-xs-6 col-lg-3 t-l">
                    <p class=" b-r">邮箱：lily@livesong.cn</p>
                </div>
                <div class="col-md-3  col-xs-6 col-lg-3 t-l">
                    <p class=" b-r">热线：86-0755-1234656</p>
                </div>
                <div class="col-md-3  col-xs-6 col-lg-3 t-l">
                    <p>传真：86-0755-1234656</p>
                </div>
                <!-- <div class="col-md-2"></div> -->
            </div>
             <div class="row pd-t-10">
                @2017-2018 海南体育 版权所有 关于海南体育 | 联系我们 | 合作模式 | 海ICP备00000000号-1
            </div>
            <!-- <div class="row">
                <div class="col-md-3 col-xs-6 col-lg-3 footer-logo">
                    <div class="logo b-r"></div>
                </div>
                <div class="col-md-3  col-xs-6 col-lg-3 b-r footer-name" >
                    海南体育赛事频道
                </div>
                <div class="col-md-3  col-xs-6 col-lg-3 t-l">
                    <p>地址：深圳市南山区深南大道</p>
                    <p>邮箱：lily@livesong.cn</p>
                    <p>热线：86-0755-1234656</p>
                    <p>传真：86-0755-1234656</p>
                </div>
                <div class="col-md-3 col-xs-6 col-lg-3 footer-erweima">
                </div>
            </div>
            <div class="row pd-t-20">
                @2017-2018 海南体育 版权所有 关于海南体育 | 联系我们 | 合作模式 | 海ICP备00000000号-1
            </div> -->
        </div>
    </footer>

    @section('javascript')

    <!-- Scripts -->
    <!--<script src="{{ asset('js/app.js') }}"></script>-->
    <!-- jQuery -->
    

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js" integrity="sha384-mE6eXfrb8jxl0rzJDBRanYqgBxtJ6Unn4/1F7q4xRRyIw7Vdg9jP4ycT7x1iVsgb" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{ asset('web/js/jqBootstrapValidation.js') }}"></script>
    <script src="{{ asset('web/js/contact_me.js') }}"></script>

    <!-- Theme JavaScript -->
    <script src="{{ asset('web/js/agency.js') }}"></script>

    @show

</body>
</html>
