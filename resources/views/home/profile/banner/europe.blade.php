<section id="banner">
<div class="container-fluid">
        <div class="row-fluid">
    <div class="container">
        <div class="banner-area">
            <div class="carousel slide" id="carousel-460689">
                    <ol class="carousel-indicators">
                        @foreach($data['banner'] as $i => $banner)
                        <li class="{{ $i ==0 ? 'active':''}}" data-target="#carousel-460689" data-slide-to="{{$i}}"></li>
                        <!-- <li data-target="#carousel-hns" data-slide-to="{{$i}}" class="{{ $i ==0 ? 'active':''}}"></li> -->

                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                         @foreach($data['banner'] as $i => $banner)
                        <div class="item {{ $i ==0 ? 'active':''}}">
                             @if($banner->url =='' || $banner->url == '#')
                        <a href="javascript:void(0);">
                        @else
                        <a href="{{ $banner->url }}" target="_blank">
                        @endif
                            <img alt="" src="{{ $banner->cover }}"  />
                            <div class="carousel-caption">
                                <h4>
                                    <h3>海南体育赛事</h3>
                                </h4>
                                <p>{{$banner->description}}</p>
                            </div>
                        </div>
                         @endforeach

                    </div> 

                    <a class="left carousel-control" href="#carousel-460689" data-slide="prev">‹</a> 
                    <a class="right carousel-control" href="#carousel-460689" data-slide="next">›</a>
                </div>
        </div>
    </div>
</section>