
@extends('admin.layouts.master');
@section('title','专题管理')
@section('banner-title','专题管理')
@section('banner-tips','专题编辑')

@section('header')
    @parent
@endsection

@section('left-menu')
     @parent
@endsection


@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2><i class="fa fa-indent red"></i><strong>修改专题</strong></h2>
    </div>
    <div class="col-lg-12">
       @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>提示!</strong> 您的操作失败<br><br>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
    </div>
    <form action="{{ route('topics-news.update', ['id' => $data['id']]) }}" method="post" enctype="multipart/form-data" class="form-horizontal ">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-md-3 control-label" for="textarea-input">新闻编号</label>
                <div class="col-md-9">
                    <input type="text" id="news_id" name="news_id" class="form-control" placeholder="请输入新闻编号......" value="{{ $data['news_id'] }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="text-input">是否推荐</label>
                <div class="col-md-9">
                    <input type="hidden" id="topics_id" name="topics_id" class="form-control" value="{{ $data['topics_id'] }}" >
                    <input type="checkbox" id="is_recommend" name="is_recommend" value="1" @if($data['is_recommend']) checked="checked" @endif>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="text-input">排序</label>
                <div class="col-md-9">
                    <input type="number" id="sort" name="sort" class="form-control" value="{{ $data['sort'] }}" >
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> 提交</button>
            <button type="button" class="btn btn-sm btn-close" onclick="window.location.href='{{ route('topics-news.index', ['topics_id' => $data['topics_id']]) }}'"><i class="fa fa-dot-circle-o"></i> 返回</button>
            <!-- <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> 重置</button> -->
        </div>
    </form>
    <script>
        var ue=UE.getEditor("ueditor");
        ue.ready(function(){
            //因为Laravel有防csrf防伪造攻击的处理所以加上此行
            ue.execCommand('serverparam','_token','{{ csrf_token() }}');
            ue.setContent("{{$data->content}}");   
        });
    </script>
</div>
@endsection
