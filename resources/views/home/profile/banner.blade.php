<!-- Banner -->
    <section style="padding:10px 0;">
        <div id="myCarousel" class="carousel slide">
            <!-- 轮播（Carousel）指标 -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>   
            <!-- 轮播（Carousel）项目 -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="{{asset('images/banner/i_1.png')}}" alt="First slide">
                </div>
                <div class="item">
                    <img src="{{asset('images/banner/i_2.png')}}" alt="Second slide">
                </div>
                <div class="item">
                    <img src="{{asset('images/banner/i_3.png')}}" alt="Third slide">
                </div>
                 <div class="item">
                    <img src="{{asset('images/banner/i_4.png')}}" alt="Third slide">
                </div>
            </div>
            <!-- 轮播（Carousel）导航 -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!-- <a class="carousel-control left" href="#myCarousel" 
                data-slide="prev">&lsaquo;
            </a>
            <a class="carousel-control right" href="#myCarousel" 
                data-slide="next">&rsaquo;
            </a> -->
        </div>
    </section>