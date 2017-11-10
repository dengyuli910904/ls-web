
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
        <form action="{{ route('partner.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal ">
            <div class="panel-body">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="textarea-input">名称</label>
                    <div class="col-md-9">
                        <input type="text" value="{{ old('name','')}}" name="name" id="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="textarea-input">跳转链接</label>
                    <div class="col-md-9">
                        <input type="text" value="{{ old('url','')}}" name="url" id="url">
                    </div>
                </div>
                <div class="form-group">

                    <label class="col-md-3 control-label" for="textarea-input">封面图片</label>
                    <div class="col-md-9">
                        <input type="file" name="file" id="upfile" multiple class="file-loading" />
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
    <script type="text/javascript" src="{{ asset('admin/fileinput/js/fileinput.js')}}"></script>
    <script>

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
            //maxFileSize: 0,//单位为kb，如果为0表示不限制文件大小
            //minFileCount: 0,
            maxFileCount: 10, //表示允许同时上传的最大文件个数
            enctype: 'multipart/form-data',
            validateInitialCount:true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
        });
    //异步上传返回结果处理
    $('#upfile').on('fileerror', function(event, data, msg) {
                console.log(data.id);
                console.log(data.index);
                console.log(data.file);
                console.log(data.reader);
                console.log(data.files);
                // get message
                alert(msg);
    });
    //异步上传返回结果处理
    $("#upfile").on("fileuploaded", function (event, data, previewId, index) {
                    var obj = data.response;
                   // console.log(data);
                    // alert(obj.state);
                    $('#cover').val(obj.url);
                });

    //同步上传错误处理
    $('#upfile').on('filebatchuploaderror', function(event, data, msg) {
                console.log(data.id);
                console.log(data.index);
                console.log(data.file);
                console.log(data.reader);
                console.log(data.files);
                // get message
                // alert(msg);
             });
       //同步上传返回结果处理
   $("#upfile").on("filebatchuploadsuccess", function (event, data, previewId, index) {
           // console.log(data.id);
           //     console.log(data.index);
           //     console.log(data.file);
           //     console.log(data.reader);
           //     console.log(data.files);
           //      var obj = data.response;
                // alert(JSON.stringify(data.state));
      });

    //上传前
    $('#upfile').on('filepreupload', function(event, data, previewId, index) {
            var form = data.form, files = data.files, extra = data.extra,
                response = data.response, reader = data.reader;
            // console.log('File pre upload triggered');
        });
    
</script>
@endsection