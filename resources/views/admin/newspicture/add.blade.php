
@extends('admin.layouts.master')

@section('title','banner管理')
@section('banner-title','banner管理')
@section('banner-tips','banner编辑')

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
        <h2><i class="fa fa-indent red"></i><strong>banner编辑</strong></h2>
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
    <form action="{{ route('newpicture.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal ">
    <div class="panel-body">
        
            <div class="form-group">
                <label class="col-md-3 control-label" for="text-input">名称</label>
                <div class="col-md-9">
                    <input type="text" id="name" name="name" class="form-control" placeholder="请输入banner标题">
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

                <label class="col-md-3 control-label" for="textarea-input">图片</label>
                <div class="col-md-9">
                    <input type="file" class="form-control"  name="upfile" id="upfile" multiple class="file-loading" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label" for="text-input">发布时间</label>
                <div class="col-md-9">
                    <input type="text" id="publishtime" name="publishtime" class="form-control" placeholder="发布时间">
                    <!-- <span class="help-block">This is a help text</span> -->
                </div>
            </div>
            <div class="form-group">

                <label class="col-md-3 control-label" for="textarea-input">新闻标签</label>
                <div class="col-md-9">
                    <input type="text" id="newstag" name="newstag" class="form-control" placeholder="请输入新闻标签......">
                </div>
            </div>
            <!-- <div class="form-group">

                <label class="col-md-3 control-label" for="textarea-input">发布时间</label>
                <div class="col-md-9">
                    <input type="text" id="publishtime" name="publishtime" class="form-control" placeholder="新闻发布时间......">
                </div>
            </div> -->
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
            
            <!-- <div class="form-group">
                <label class="col-md-3 control-label">是否启用</label>
                <div class="col-md-9">
                    <label class="switch switch-success">
                      <input type="checkbox" class="switch-input" checked="">
                      <span class="switch-label" data-on="On" data-off="Off"></span>
                      <span class="switch-handle"></span>
                    </label>
                </div>
            </div> -->

            <input type="hidden" id="path" name="path" value="">
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
        $("#upfile").fileinput({
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
            maxFileCount: 10, //表示允许同时上传的最大文件个数
            enctype: 'multipart/form-data',
            validateInitialCount:true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
        });
    //异步上传返回结果处理
    $('#upfile').on('fileerror', function(event, data, msg) {
        // alert(msg);
    });
    //异步上传返回结果处理
    $("#upfile").on("fileuploaded", function (event, data, previewId, index) {
        var obj = data.response;
        // $('#showcover').attr('src',obj.url);
        console.log(obj);
        if($('#path').val() !==''){
            $('#path').val($('#path').val()+","+obj.url);
        }else{
            $('#path').val(obj.url);
        }
    });

    //同步上传错误处理
    $('#upfile').on('filebatchuploaderror', function(event, data, msg) {
    });
       //同步上传返回结果处理
   $("#upfile").on("filebatchuploadsuccess", function (event, data, previewId, index) {
      });

    //上传前
    $('#upfile').on('filepreupload', function(event, data, previewId, index) {
        var form = data.form, files = data.files, extra = data.extra,
            response = data.response, reader = data.reader;
    });
    </script>
@endsection
