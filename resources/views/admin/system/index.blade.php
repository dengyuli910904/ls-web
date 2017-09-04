
@extends('admin.layouts.master')

@section('title','后台设置管理')
@section('banner-title','后台设置管理')
@section('banner-tips','后台设置编辑')

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
    <div class="pd-20">
        <form action="{{ route('system.store') }}" method="post" class="form form-horizontal" id="form-system-create">
            @if (count($errors) > 0)
                <div class="row cl">
                    <label class="form-label col-3"></label>
                    <div class="formControls col-8">发生错误</div>
                    @foreach ($errors->all() as $error)
                        <label class="form-label col-3"></label>
                        <div class="formControls col-8">
                            {{ $error }}
                        </div>
                    @endforeach
                </div>
            @endif
                <div class="row cl">
                    <label class="form-label col-2">缓存：</label>
                    <div class="formControls col-10">
                        <button id="system_cache_submit" class="btn btn-primary radius" type="button"> 清空</button>
                    </div>
                </div>
        </form>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">

        $('#system_cache_submit').click(function(){
//            layer.confirm('确认要清空缓存吗？', function(index){
                initCache('cache');
//            });
        });

        function initCache(type)
        {
            $.ajax({
                type: "POST",
                url: '{{ route('cache.store') }}',
                data: {
                    'init': type
                },
                dataType: 'json',
                success: function(data){
                    if (data.flag == 1) {
                    } else {
                    }
                    alert(data.msg);
                },
                error: function(xhr){
                    var res = jQuery.parseJSON(xhr.responseText);
                    for (i in res) {
                        if ($('input[name="' + i + '"]').length > 0) {
                            $('input[name="' + i + '"]').focus()
                        } else if ($('textarea[name="' + i + '"]').length > 0) {
                            $('textarea[name="' + i + '"]').focus();
                        } else if ($('select[name="' + i + '"]').length > 0) {
                            $('textarea[name="' + i + '"]').focus();
                        }
                    }
                }
            });
        }

    </script>
@endsection