
@extends('admin.layouts.master');
@section('title','首页管理')
@section('banner-title','首页管理')
@section('banner-tips','首页编辑')

@section('header')
    @parent
@endsection

@section('left-menu')
     @parent
@endsection

@section('styles')
    @parent
    <link rel="stylesheet" type="text/css" href="{{asset('admin/fileinput/css/fileinput.css')}}">
@endsection


@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2><i class="fa fa-indent red"></i><strong>修改首页</strong></h2>
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
    <form action="{{ route('homepage.update', ['id' => $data->id]) }}" method="post" enctype="multipart/form-data" class="form-horizontal ">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-md-3 control-label" for="text-input">类型</label>
                <div class="col-md-9">
                    <input type="radio" name="htype" value="0" id="htype0" @if($data->htype == 0) checked="checked" @endif> <label for="htype0">banner</label>
                    <input type="radio" name="htype" value="1" id="htype1" @if($data->htype == 1) checked="checked" @endif> <label for="htype1">新闻动态</label>
                    <input type="radio" name="htype" value="2" id="htype2" @if($data->htype == 2) checked="checked" @endif> <label for="htype2">赛事新闻</label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="textarea-input">新闻编号</label>
                <div class="col-md-9">
                    <input type="text" value="{{ $data->news_uuid }}" name="news_uuid" id="news_uuid">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="textarea-input">排序</label>
                <div class="col-md-9">
                    <input type="text" value="{{ $data->sort }}" name="sort" id="sort">
                </div>
            </div>
            <input type="hidden" id="_method" value="put" name="_method">
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> 提交</button>
            <button type="button" class="btn btn-sm btn-close" onclick="window.location.href='{{ route('homepage.index') }}'"><i class="fa fa-dot-circle-o"></i> 返回</button>
            <!-- <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> 重置</button> -->
        </div> 
    </form>
</div>
@endsection

@section('scripts')
    @parent
@endsection