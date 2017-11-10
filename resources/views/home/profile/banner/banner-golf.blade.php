<section id="banner">
    <div class="container">
        <div class="banner-area">
            <div class="carousel slide" id="carousel-hns" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($data['banner'] as $i => $banner)
                    <li data-target="#carousel-hns" data-slide-to="{{$i}}" class="{{ $i ==0 ? 'active':''}}"></li>

                    @endforeach
                    <!-- <li data-target="#carousel-hns" data-slide-to="1"></li>
                    <li data-target="#carousel-hns" data-slide-to="2"></li>
                    <li data-target="#carousel-hns" data-slide-to="3"></li>
                    <li data-target="#carousel-hns" data-slide-to="4"></li>
                    <li data-target="#carousel-hns" data-slide-to="5"></li> -->
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    @foreach($data['banner'] as $i => $banner)
                    <div class="item {{ $i ==0 ? 'active':''}}">
                        @if($banner->url =='' || $banner->url == '#')
                        <a href="javascript:void(0);">
                        @else
                        <a href="{{ $banner->url }}" target="_blank">
                        @endif
                            <img src="{{ $banner->cover }}" alt="banner_1">
                            <div class="carousel-caption">
                                <!-- <h3>海南体育赛事</h3> -->
                                <h3>{{$banner->description}}</h3>
                                <!-- <p></p> -->
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-hns" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-hns" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </div>
</section>