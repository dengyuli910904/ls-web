<video width="640" height="480" controls>
    <source src="{{ $news['vpath'] }}" type="video/mp4">
    <source src="{{ $news['vpath'] }}" type="video/ogg">
    <source src="{{ $news['vpath'] }}" type="video/webm">
    <object data="{{ $news['vpath'] }}" width="640" height="480">
        <embed src="{{ $news['vpath'] }}" width="640" height="480">
    </object>
</video>
<div>
    @foreach($list as $v)
        <div>
            <a href="/videonews/{{ $v['id'] }}" title="{{ $v['title'] }}">
                <img src="{{ $v['cover'] }}" alt="{{ $v['title'] }}" />
            </a>
        </div>
    @endforeach
</div>