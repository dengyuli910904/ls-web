<h4 class="titlebar"><a href="javascript:void(0);">精彩图说</a></h4>
<div class="row ptb20">

     @foreach ($data['picdata'] as $pic)
        <div class="col-sm-3 col-md-3">
            <div class="thumbnail">
              <img alt="{{$pic->name}}" class="img-responsive" src="{{ $pic->cover}}" data-holder-rendered="true">
              <div class="caption text-center">
                <h4><a href="/golf/newsinfo?id={{$pic->id}}">{{$pic->name}}</a></h4>
              </div>
            </div>
        </div>
    @endforeach
</div>