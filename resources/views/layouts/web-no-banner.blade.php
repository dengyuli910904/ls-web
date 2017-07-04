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

    @include('home.profile.styles')

    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body id="page-top" class="index">
      
    <!-- Navigation -->
    @include('home.profile.header')
    <!-- <nav id="mainNav" class="">
        <div class="nav-logo row">
            <div class="container">
                    <img src=" {{ asset('images/logo_1.png')}}"  height="40px">
            </div>
        </div>
        <div class="navbar navbar-default navbar-custom nav-theme">
            <div class="container">
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span> 菜单 <i class="fa fa-bars"></i>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav"> 
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
            </div>
        </div>
    </nav> -->
    @yield('content')


    @include('home.profile.footer')


    @include('home.profile.scripts')
    
</body>
</html>
