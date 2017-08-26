
@extends('admin.layouts.master')

@section('title','视频新闻管理')
@section('banner-title','视频新闻管理')
@section('banner-tips','视频新闻编辑')

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
        <h2><i class="fa fa-indent red"></i><strong>视频新闻编辑</strong></h2>
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
    <form action="{{ route('videonews.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal ">
        <div class="panel-body">
        
            <div class="form-group">
                <label class="col-md-3 control-label" for="text-input">名称</label>
                <div class="col-md-9">
                    <input type="text" id="name" name="name" class="form-control" placeholder="请输入视频新闻标题">

                    <!-- <span class="help-block">This is a help text</span> -->
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="textarea-input">描述</label>
                <div class="col-md-9">
                    <textarea id="description" name="description" rows="9" class="form-control" placeholder="Content.."></textarea>
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-3 control-label" for="textarea-input">封面</label>
                <div class="col-md-9">
                    <input type="file" class="form-control"  name="upfile1" id="upfile1" multiple class="file-loading" />
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-3 control-label" for="textarea-input">视频</label>
                <div class="col-md-9">
                    <input type="file" class="form-control"  name="upfile" id="upfile" multiple class="file-loading" />
                </div>
            </div>

            <input type="hidden" id="cover" name="cover">
            <input type="hidden" id="vpath" name="vpath">
            <!-- <input type="hidden" id="news_id" name="news_id"> -->
            <!-- <input type="hidden" id="is_hidden" value="0" name="isfalse"> -->
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> 提交</button>
            <!-- <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> 重置</button> -->
        </div> 
    </form> 
</div>
@endsection
@section('scripts')
    @parent
     <script type="text/javascript" src="{{ asset('admin/fileinput/js/fileinput.js')}}"></script>
    <script type="text/javascript">
        $("#upfile1").fileinput({
            language: 'zh', //设置语言
            uploadUrl: "{{url('fileupload')}}", //上传的地址
            allowedFileExtensions: ['jpg', 'gif', 'png'],//接收的文件后缀
            //uploadExtraData:{"id": 1, "fileName":'123.mp3'},
            uploadAsync: true, //默认异步上传
            showUpload: true, //是否显示上传按钮
            showRemove : true, //显示移除按钮
            showPreview : true, //是否显示预览
            showCaption: false,//是否显示标题
            browseClass: "btn btn-primary", //按钮样式     
            dropZoneEnabled: false,//是否显示拖拽区域
            //minImageWidth: 50, //图片的最小宽度
            //minImageHeight: 50,//图片的最小高度
            //maxImageWidth: 1000,//图片的最大宽度
            //maxImageHeight: 1000,//图片的最大高度
            maxFileSize: 20480,//单位为kb，如果为0表示不限制文件大小
            //minFileCount: 0,
            maxFileCount: 1, //表示允许同时上传的最大文件个数
            enctype: 'multipart/form-data',
            validateInitialCount:true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
        });
        $("#upfile").fileinput({
            language: 'zh', //设置语言
            uploadUrl: "{{url('fileupload')}}", //上传的地址
            allowedFileExtensions: ['mp4','avi','wmv'],//接收的文件后缀
            //uploadExtraData:{"id": 1, "fileName":'123.mp3'},
            uploadAsync: true, //默认异步上传
            showUpload: true, //是否显示上传按钮
            showRemove : true, //显示移除按钮
            showPreview : true, //是否显示预览
            showCaption: false,//是否显示标题
            browseClass: "btn btn-primary", //按钮样式     
            dropZoneEnabled: false,//是否显示拖拽区域
            //minImageWidth: 50, //图片的最小宽度
            //minImageHeight: 50,//图片的最小高度
            //maxImageWidth: 1000,//图片的最大宽度
            //maxImageHeight: 1000,//图片的最大高度
            maxFileSize: 2048000,//单位为kb，如果为0表示不限制文件大小
            //minFileCount: 0,
            maxFileCount: 1, //表示允许同时上传的最大文件个数
            enctype: 'multipart/form-data',
            validateInitialCount:true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
        });
        
    
    //异步上传返回结果处理
    $("#upfile1").on("fileuploaded", function (event, data, previewId, index) {
        var obj = data.response;
        $('#cover').val(obj.url);
    });
    $("#upfile").on("fileuploaded", function (event, data, previewId, index) {
        var obj = data.response;
        $('#vpath').val(obj.url);
    });


    //上传前
    $('#upfile1,#upfile').on('filepreupload', function(event, data, previewId, index) {
        var form = data.form, files = data.files, extra = data.extra,
            response = data.response, reader = data.reader;
    });
    </script>
@endsection
