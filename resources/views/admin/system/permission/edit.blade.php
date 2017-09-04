
@extends('admin.layouts.master')

@section('title','权限管理')
@section('banner-title','权限管理')
@section('banner-tips','权限编辑')

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
	<form action="{{ route('permission.update', ['id' => $data['permission']['id']]) }}" method="post" class="form form-horizontal" id="form-permission-edit-{{ $data['permission']['id'] }}">
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
				<label class="form-label col-2">父级：</label>
				<div class="formControls col-10">
					<div class="col-5">
						<input type="text" class="input-text" value="" placeholder="分类关键字" id="permission_text" >
					</div>
					<div class="col-5">
						<span class="select-box">
							<select name="pid" class="select" required="required" id="permission_list">
								<option value="0">请选择</option>
								@foreach($data['pid'] as $pid)
									<option value="{{ $pid['id'] }}"
											@if($data['permission']['pid'] == $pid['id'])
											selected="selected"
											@endif
											>{{ str_repeat('-', $pid['level']) . $pid['name'] }}</option>
								@endforeach
							</select>
						</span>
					</div>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>英文名称：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="{{ $data['permission']['enname'] }}" required="required" placeholder="英文名称" name="enname" >
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>名称：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="{{ $data['permission']['name'] }}" required="required" placeholder="名称" name="name" >
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">描述：</label>
				<div class="formControls col-10">
					<textarea name="descript" class="textarea" placeholder="最少输入10个字符" >{{ $data['permission']['descript'] }}</textarea>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>类型：</label>
				<div class="formControls col-10">
					<span class="select-box">
						<select name="ptype" class="select" required="required">
							<option value="0"
									@if($data['permission']['ptype'] == 0)
									selected="selected"
									@endif
									>权限</option>
							<option value="1"
									@if($data['permission']['ptype'] == 1)
									selected="selected"
									@endif
									>功能</option>
							<option value="2"
									@if($data['permission']['ptype'] == 2)
									selected="selected"
									@endif
									>目录</option>
							<option value="3"
									@if($data['permission']['ptype'] == 3)
									selected="selected"
									@endif
									>模块</option>
						</select>
					</span>
				</div>
			</div>
			<div class="row cl">
				<div class="col-10 col-offset-2">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<button id="permission_save_submit" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
					<!--<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>-->
				</div>
			</div>
	</form>
</div>
@endsection

@section('scripts')
	@parent
	<script type="text/javascript" src="{{ asset('admin/fileinput/js/fileinput.js')}}"></script>
	<script type="text/javascript">
$(function(){
	$('#permission_text').change(function(){
		var searchStr = $(this).val();
		if (searchStr) {
			var flag = 0;
			var options = $('#permission_list').children();
			for (var i = 0, len = options.length; i < len; i++) {
				if (!flag && $(options[i]).text().indexOf(searchStr) >= 0) {
					flag = 1;
					$(options[i]).attr('selected', 'selected');
					break;
				}
			}
			if (!flag) {
				$('#permission_list option:first').attr('selected', 'selected');
			}
		}
	});
});

</script>
@endsection