<nav id="mainNav" class=""><!-- navbar-fixed-top -->
        <div class="nav-logo row">
            <div class="container">
                <!-- <div class="col-md-2 col-xs-3"> -->
                    <img src=" {{ asset('images/logo_1.png')}}"  height="40px">
                <!-- </div> -->
                <!-- <div class="col-md-2  col-xs-3 col-md-offset-8 col-xs-offset-6">
                    <img src=" {{ asset('qr_code.png')}}"  height="70px">
                </div> -->
            </div>
            <!-- <div class="col-md-offset-2">
                <img src=" {{ asset('images/logo.png')}}" class="img-responsive" width="120px">
            </div> -->
        </div>
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
                            <a class="page-scroll" href="{{url('/hotnews')}}">热门新闻</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{url('/golf')}}">高尔夫赛事</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{url('/topics')}}">专题报道</a>
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