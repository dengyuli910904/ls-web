
@extends('admin.layouts.master');
@section('title','友情链接管理')
@section('banner-title','友情链接管理')
@section('banner-tips','友情链接添加')

@section('header')
    @parent
@endsection

@section('left-menu')
    @parent
@endsection


@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2><i class="fa fa-indent red"></i><strong>添加友情链接</strong></h2>
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
        <form action="{{ route('topics.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal ">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="text-input">名称</label>
                    <div class="col-md-9">
                        <input type="text" id="name" name="name" class="form-control" value="">
                        <!-- <span class="help-block">This is a help text</span> -->
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="text-input">链接</label>
                    <div class="col-md-9">
                        <input type="text" id="url" name="url" class="form-control" value="">
                        <!-- <span class="help-block">This is a help text</span> -->
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-md-3 control-label" for="textarea-input">图片</label>
                    <div class="col-md-9">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="textarea-input">禁用</label>
                    <div class="col-md-9">
                        <input type="checkbox" value="1" name="is_hidden">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="text-input">排序</label>
                    <div class="col-md-9">
                        <input type="text" id="sort" name="sort" class="form-control" value="0">
                        <!-- <span class="help-block">This is a help text</span> -->
                    </div>
                </div>
                <input type="hidden" id="cover" value="" name="cover">
            </div>
            <div class="panel-footer">
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> 提交</button>
                <button type="button" class="btn btn-sm btn-close" onclick="window.location.href='{{ route('friendship.index') }}'"><i class="fa fa-dot-circle-o"></i> 返回</button>
                <!-- <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> 重置</button> -->
            </div>
        </form>
        <script>
            var ue=UE.getEditor("ueditor");
            ue.ready(function(){
                //因为Laravel有防csrf防伪造攻击的处理所以加上此行
                ue.execCommand('serverparam','_token','{{ csrf_token() }}');
            });
        </script>
    </div>
@endsection
