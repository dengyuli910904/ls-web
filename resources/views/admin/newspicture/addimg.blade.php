@extends('admin.layouts.master')

@section('title','图片新闻管理')
@section('banner-title','图片新闻管理')
@section('banner-tips','图片新闻编辑')

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
        <h2><i class="fa fa-indent red"></i><strong>图片新闻编辑</strong></h2>
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
    <form action="{{ route('pictures.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal ">
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
            <input type="hidden" id="path"  name="path">
            <input type="hidden" id="is_hidden" value="1" name="is_hidden">
            <input type="hidden" name = "news_id" value="{{$id}}">
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> 提交</button>
            <button type="button" class="btn btn-sm btn-danger" onclick="window.location.href='{{ route('pictures.index', ['id' => $id]) }}'">返回</button>
            <!-- <form action="{{ route('pictures.index') }}" method="get" style="display: inline;">
              <input type="hidden" name="id" value="{{$id}}"> 
              <button type="submit" class="btn btn-sm btn-danger">返回</button>
            </form> --> 
        </div> 
    </form> 
</div>
@endsection
@section('scripts')
    @parent
     <script type="text/javascript" src="{{ asset('admin/fileinput/js/fileinput.js')}}"></script>
    <script type="text/javascript">
        var arr = [];
        $("#pics input[name='_url']").each(function(i){
            arr.push($(this).val());
        });
        console.log(arr);
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
            initialPreview: arr,
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
    //异步上传返回结果处理
    $('#upfile').on('fileerror', function(event, data, msg) {
        // alert(msg);
    });
    //异步上传返回结果处理
    $("#upfile").on("fileuploaded", function (event, data, previewId, index) {
        var obj = data.response;
        // $('#showcover').attr('src',obj.url);
        // $('#path').val(obj.url);
        // if($('#path').val() !==''){
        //     $('#path').val($('#path').val()+","+obj.url);
        // }else{
            $('#path').val(obj.url);
        // }
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
