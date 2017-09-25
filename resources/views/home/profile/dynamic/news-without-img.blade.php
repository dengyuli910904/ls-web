<h4 class="titlebar"><a href="/news">比赛动态</a></h4>
<ul>
    @foreach ($data['dynamic'] as $news)
        <li class="item">
            <div class="col-md-9">
                <a href="/news/detail?id={{$news->id}}">
                    <span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span>
                    {{$news->title}}
                </a>
            </div>
            <div class="col-md-3 t-r">
                {{$news->time}}
            </div>
        </li>
    @endforeach
</ul>