<h4 class="titlebar"><a href="/news">比赛动态</a></h4>
<ul>
    @foreach ($data['dynamic'] as $news)
        <li class="item">
            <!-- <div class="row"> -->
                <div class="col-md-8">
                    <h4><a href="/news/detail?id={{$news->news_id}}">标题：{{$news->news_title}}</a></h4>
                    <p class="intro">
                        {{$news->news_intro}}
                    </p>
                    <div class="row">
                        <div class="col-md-9">
                            <span class="tags">海南赛事</span>
                            <span class="tags">高尔夫</span>
                        </div>
                        <div class="col-md-3" style="text-align:right;">
                            {{$news->news_time}}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 t-r" style="text-align:right;" >
                    <img src="{{$news->cover}}" style="width:360px; height:200px;">
                </div>
            <!-- </div> -->
        </li>
    @endforeach
</ul>