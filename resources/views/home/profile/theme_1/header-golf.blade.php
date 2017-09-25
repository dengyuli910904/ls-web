<header>
    <div class="site-branding-area">
         <div class="container w1320">
           <div class="row header-bg">
                <h2>{{$data['title']}}</h2>
             <!--    <div class="col-sm-4" style="height:100px; line-height: 100px;">
                    <a class="logo" href="/">
                            <img src=" {{ asset('images/logo.png')}}">
                    </a>
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
                </div>-->
            </div>
        </div> 
    </div>
    <div class="mainmenu-area menubg">
        <div class="container w1320">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-hns">
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="nav navbar-nav">
                            @foreach($data["navbar"] as $nav)
                                <li class="nav-item "><a class="nav-link " href="/">{{$nav['title']}} <span class="sr-only">(current)</span></a></li>
                                <!-- <li class="nav-item"><a class="nav-link" href="#schedule">赛程安排</a></li>
                                <li class="nav-item"><a class="nav-link" href="#news-pic">精彩图说</a></li>
                                <li class="nav-item"><a class="nav-link" href="#news-video">独家视频</a></li>
                                <li class="nav-item"><a class="nav-link" href="#contest-area">高端旅游</a></li>
                                <li class="nav-item"><a class="nav-link" href="#">往届回顾</a></li> -->
                            @endforeach
                            </ul>
                        </div>
                    </nav>
                </div>

            </div>
        </div>
    </div>

</header>