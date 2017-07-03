
@extends('admin.layouts.master');
@section('title','banner管理')
@section('banner-title','banner管理')
@section('banner-tips','banner编辑')

@section('header')
    @parent
@endsection

@section('left-menu')
     @parent
@endsection


@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2><i class="fa fa-indent red"></i><strong>添加新闻</strong></h2>
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
    <form action="{{ url('news/doadd')}}" method="post" enctype="multipart/form-data" class="form-horizontal ">
        <div class="panel-body">
            <div class="form-group">
                <label class="col-md-3 control-label" for="text-input">标题</label>
                <div class="col-md-9">
                    <input type="text" id="title" name="title" class="form-control" placeholder="请输入新闻标题......">
                    <!-- <span class="help-block">This is a help text</span> -->
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="textarea-input">新闻简介</label>
                <div class="col-md-9">
                    <textarea id="intro" name="intro" rows="9" class="form-control" placeholder="请输入新闻简介......"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="textarea-input">新闻类型</label>
                <div class="col-md-9">
                    @foreach($typedata as $val)
                        <button type="button" class="btn btn-default">{{$val->name}}</button>
                    @endforeach
                    <!-- <input type="text" id="type" name="type" class="form-control" value="1"> -->
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-3 control-label" for="textarea-input">封面图片</label>
                <div class="col-md-9">
                    
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-3 control-label" for="textarea-input">新闻标签</label>
                <div class="col-md-9">
                    <input type="text" id="newstag" name="newstag" class="form-control" placeholder="请输入新闻标签......">
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-3 control-label" for="textarea-input">发布时间</label>
                <div class="col-md-9">
                    <input type="text" id="publishtime" name="publishtime" class="form-control" placeholder="新闻发布时间......">
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-3 control-label" for="textarea-input">新闻来源</label>
                <div class="col-md-9">
                    <input type="text" id="resource" name="resource" class="form-control" placeholder="新闻来源......">
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-3 control-label" for="textarea-input">来源链接</label>
                <div class="col-md-9">
                    <input type="text" id="resourceurl" name="resourceurl" class="form-control" placeholder="新闻来源链接......">
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-3 control-label" for="textarea-input">关键词</label>
                <div class="col-md-9">
                    <input type="text" id="keyword" name="keyword" class="form-control" placeholder="新闻关键词......">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="textarea-input">新闻内容</label>
                <div class="col-md-9">
                     <script id="ueditor"></script>
                </div>
            </div>
            
            
            
            <div class="form-group">
                <label class="col-md-3 control-label">责任编辑</label>
                <div class="col-md-9">
                    <input type="text" id="editor" name="editor" class="form-control" placeholder="请输入责任编辑姓名......">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">点击量</label>
                <div class="col-md-9">
                    <input type="number" id="click_count" name="click_count" class="form-control" value="0">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label">阅读量</label>
                <div class="col-md-9">
                    <input type="number" id="read_count" name="read_count" class="form-control" value="0">
                </div>
            </div>
           <!--  <div class="form-group">
                <label class="col-md-3 control-label">排序</label>
                <div class="col-md-9">
                    <input type="number" id="ordernum" name="ordernum" class="form-control" value="1">
                </div>
            </div> -->

            <input type="hidden" id="cover" value="" name="cover">
            <input type="hidden" id="type" value="1" name="type">
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> 提交</button>
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
