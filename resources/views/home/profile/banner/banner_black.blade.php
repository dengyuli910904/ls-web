@section('banner')
    <!--banner-->
    <div class="banner">
        <div class="bd">
            <ul>
                @foreach($data['banner'] as $i => $banner)
                <li>
                    @if($banner->url =='' || $banner->url == '#')
                        <a href="javascript:void(0);">
                            @else
                                <a href="{{ $banner->url }}" target="_blank">
                                    @endif
                        <div class="info">
                            <h1>{{ $banner->description }}</h1>
{{--                            <h2>{{ $banner->description }}</h2>--}}
                        </div>
                        <img src="{{ $banner->cover }}" width="1920" height="400" alt="">
                    </a>
                </li>
                @endforeach
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<img src="{{ asset('web/images/index/banner1.jpg')}}" width="1920" height="400" alt="">--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#">--}}
                        {{--<img src="{{ asset('web/images/index/banner2.jpg')}}" width="1920" height="400" alt="">--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
        </div>
        <div class="hd">
            <ul></ul>
        </div>
    </div>
    @show