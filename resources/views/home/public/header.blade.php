
@section('header')
<header>
    <div class="site-branding-area">
        <div class="container w1000">
            <div class="row" >
                <div class="col-sm-4" style="height:100px; line-height: 100px;">
                    <!-- <div class="logo"> -->
                        <a class="logo" href="/">
                                <img src=" {{ asset('web/images/logo.png')}}">
                                <!-- <img src=" http://119.23.40.64/images/logo.png"   class="img-responsive"> -->
                        </a>
                    <!-- </div> -->
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <div class="input-group" style="padding-top: 60px">
                        <input type="text" class="form-control" placeholder="请输入搜索内容...">
                        <span class="btn btn-default  input-group-addon">
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                        </span>
                    </div>
                </div>
                <div class="col-sm-2" style="margin-bottom: -30px; text-align:right;">
                    <div class="login-header" style="padding-top: 30px">
                        <a href="/" class="hlh100">登录</a>
                        <a href="/" class="hlh100">|</a>
                        <a href="/" class="hlh100">注册</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mainmenu-area menubg">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-11">
                    <nav class="navbar navbar-hns">
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav">
                                <li class="nav-item active"><a class="nav-link " href="{{url('/')}}">首页 <span class="sr-only">(current)</span></a></li>
                                <li class="nav-item"><a class="nav-link" href="{{url('news/')}}">最新发布</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{url('news/hot')}}">热门新闻</a></li>
                                <li class="nav-item dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">专题赛事<span class="caret"></span></a>
                                     
                                     <ul class="dropdown-menu">
                                        <li><a href="{{url('/golf')}}" >青少赛</a></li>
                                        <li><a href="{{url('/europe')}}">欧巡赛</a></li>
                                        <!-- <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">One more separated link</a></li> -->
                                      </ul>
                                </li>

                                <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li> -->
                                <li class="nav-item"><a class="nav-link" href="{{url('topics')}}">专题报道</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{url('knowledge/')}}">体育百科</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{url('about/')}}" style="border-right: none;">关于我们</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>

</header>

@show






