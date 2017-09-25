<h4 class="titlebar"><a href="/news">比赛动态</a></h4>
<ul>
    @foreach ($data['dynamic'] as $news)
        <li class="item">
            <div class="col-md-9">
                <a href="/news/detail?id={{$news->news_uuid}}">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    {{$news->news_title}}
                </a>
            </div>
            <div class="col-md-3 t-r">
                {{$news->news_time}}
            </div>
        </li>
    @endforeach
</ul>