
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
    <form action="{{ url('topics.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal ">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-md-3 control-label" for="text-input">标题</label>
                <div class="col-md-9">
                    <input type="text" id="title" name="title" class="form-control" value="{{$data->title}}">
                    <!-- <span class="help-block">This is a help text</span> -->
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="textarea-input">新闻简介</label>
                <div class="col-md-9">
                    <textarea id="intro" name="intro" rows="9" class="form-control">{{$data->intro}}</textarea>
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-3 control-label" for="textarea-input">封面图片</label>
                <div class="col-md-9">
                    
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="textarea-input">禁用</label>
                <div class="col-md-9">
                    <input type="checkbox" value="1" name="is_hidden" @if($data->is_hidden) checked="checked" @endif>
                </div>
            </div>
            <input type="hidden" id="cover" value="{{$data->cover}}" name="cover">
            {{--<input type="hidden" id="uuid" value="{{$data->uuid}}" name="uuid">--}}
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> 提交</button>
            <button type="button" class="btn btn-sm btn-close" onclick="window.location.href='{{ route('topics.index') }}'"><i class="fa fa-dot-circle-o"></i> 返回</button>
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
