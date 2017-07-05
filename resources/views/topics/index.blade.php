@extends('layouts.web')

@section('content')
    <section class="pd-t-20 pd-b-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pd-b-20">
                    <h4><span>专题列表</span> | <span>LIST OF TOPICS</span></h4>
                </div>
            </div>
            <div class="col-md-12">
                <div class="newslist">
                    @foreach($list as $l)
                        <div class="new-item col-md-6 row">
                            <a href="/topics/{{ $l->id }}">
                                <div class="pd-b-10"><img src="{{ $l->cover }}"></div>
                                <h4 class=" text-center">{{ $l->title }}</h4>
                                <h5 class=" text-center">{{ $l->created_at }}</h5>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="topics-bottom text-center col-md-12">
                <div class="col-md-4 topics-bottom-left">　</div>
                <div class="col-md-4 topics-bottom-center">下拉加载更多</div>
                <div class="col-md-4 topics-bottom-right">　</div>
            </div>
        </div>
    </section>
@endsection

@section('javascript')
    @parent
    <script src="{{ asset('web/js/topics.js') }}"></script>
@endsection