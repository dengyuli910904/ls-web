<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    @include('home.public.script')
    @include('home.public.style')
    @yield('styles')
</head>
<body>
    <header>
        <div class="site-branding-area">
             <div class="container w1320">
               @include('home.profile.theme_1.header-golf')
            </div>
        </div>
        <div class="mainmenu-area menubg">
            <div class="container w1320">
                @include('home.profile.theme_1.navbar')
            </div>
        </div>

    </header>
    
    <section id="banner">
        <div class="container">
            @include('home.profile.theme_1.banner-golf')
        </div>
    </section>
    <div class="wrapper container-fluid">
       <!-- 比赛动态 -->
        <section id="dynamic">
            <div class="news-area">
                <div class="container w1320 ptb50">
                @include('home.profile.theme_1.dynamic')
                </div>
            </div>
        </section>
        <!-- end 新闻动态 -->

        <!-- start 赛程安排 -->
         
        <section id="schedule" name="schedule">
            <div class="container w1320">
               @include('home.profile.theme_1.schedule') 
            </div>
        </section>
        <!-- end 赛程安排 -->

        <!-- 精彩图说 -->
        <section>
            <div class="news-pic" id="news-pic">
                <div class="container w1320 ptb20">
                    @include('home.profile.theme_1.newspic')
                </div>
            </div>
        </section>
        <!-- end 精彩图说 -->

        <!-- 独家视频 -->
        <section>
            <div class="news-video" id="news-video">
                <div class="container w1320 ptb20">
                    @include('home.profile.theme_1.newsvideo')
                </div>
            </div>
        </section>
        <!-- end 独家视频 -->

        <!-- 高端旅游 -->
        <section>
            <div class="contest-area" id="contest-area">
                <div class="container w1320 pt20 pb50">
                    @include('home.profile.theme_1.toptravel')
                </div>
            </div>
        </section>
        <!-- end 高端旅游 -->
    </div>
    @include('home.profile.theme_1.footer-golf')

</body>
@yield('script')
</html>
