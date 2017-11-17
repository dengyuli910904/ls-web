<div class="container friends">
    <div class="title">
        <h1>合作伙伴</h1>
    </div>
    <ul class="clearfix">
        @foreach($data['partner'] as $val)
        <li>
            <img src="{{$val->cover}}" width="169" height="53" alt="">
        </li>
        @endforeach
        {{--<li>--}}
            {{--<img src="./images/index/fri1.jpg" width="169" height="53" alt="">--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<img src="./images/index/fri2.jpg" width="169" height="53" alt="">--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<img src="./images/index/fri3.jpg" width="169" height="53" alt="">--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<img src="./images/index/fri4.jpg" width="169" height="53" alt="">--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<img src="./images/index/fri5.jpg" width="169" height="53" alt="">--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<img src="./images/index/fri6.jpg" width="169" height="53" alt="">--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<img src="./images/index/fri7.jpg" width="169" height="53" alt="">--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<img src="./images/index/fri8.jpg" width="169" height="53" alt="">--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<img src="./images/index/fri9.jpg" width="169" height="53" alt="">--}}
        {{--</li>--}}
        {{--<li>--}}
            {{--<img src="./images/index/fri10.jpg" width="169" height="53" alt="">--}}
        {{--</li>--}}
    </ul>
</div>