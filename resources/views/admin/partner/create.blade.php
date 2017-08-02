
@extends('admin.layouts.master');
@section('title','首页管理')
@section('banner-title','首页管理')
@section('banner-tips','首页添加')

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
            <h2><i class="fa fa-indent red"></i><strong>添加首页</strong></h2>
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
        <form action="{{ route('homepage.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal ">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="textarea-input">名称</label>
                    <div class="col-md-9">
                        <input type="text" value="" name="name" id="name">
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-md-3 control-label" for="textarea-input">封面图片</label>
                    <div class="col-md-9">
                        <input type="file" name="upfile" id="upfile" multiple class="file-loading" />
                    </div>
                </div>
                <input type="hidden" id="cover" value="" name="cover">
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