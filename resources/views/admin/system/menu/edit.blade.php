
@extends('admin.layouts.master')

@section('title','菜单管理')
@section('banner-title','菜单管理')
@section('banner-tips','菜单编辑')

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
	<form action="{{ route('menu.update', ['id' => $data['menu']['id']]) }}" method="post" class="form form-horizontal" id="form-menu-edit-{{ $data['menu']['id'] }}">
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
						<input type="text" class="input-text" value="" placeholder="分类关键字" id="menu_text" >
					</div>
					<div class="col-5">
						<span class="select-box">
							<select name="pid" class="select" required="required" id="menu_list">
								<option value="0">请选择</option>
								@foreach($data['pid'] as $pid)
									<option value="{{ $pid['id'] }}"
											@if($data['menu']['pid'] == $pid['id'])
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
					<input type="text" class="input-text" value="{{ $data['menu']['enname'] }}" required="required" placeholder="英文名称" name="enname" >
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>名称：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="{{ $data['menu']['name'] }}" required="required" placeholder="名称" name="name" >
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">链接：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="{{ $data['menu']['url'] }}" placeholder="链接" name="url" >
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>权限：</label>
				<div class="formControls col-10">
					<div class="col-5">
						<input type="text" class="input-text" value="" placeholder="关系关键字" id="permission_text" >
					</div>
					<div class="col-5">
						<span class="select-box">
							<select name="permission_id" class="select" required="required" id="permission_list">
								<option value="0">请选择</option>
								@foreach($data['permissions'] as $permission)
									<option value="{{ $permission['id'] }}"
											@if($data['menu']['permission_id'] == $permission['id'])
											selected="selected"
											@endif
											>{{ str_repeat('-', $permission['level']) . $permission['name'] }}</option>
								@endforeach
							</select>
						</span>
					</div>
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2">描述：</label>
				<div class="formControls col-10">
					<textarea name="descript" class="textarea" placeholder="最少输入10个字符">{{ $data['menu']['descript'] }}</textarea>
				</div>
			</div>
			<div class="row cl">
				<div class="col-10 col-offset-2">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<button id="menu_save_submit" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
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

	$('#menu_text').change(function(){
		var searchStr = $(this).val();
		if (searchStr) {
			var flag = 0;
			var options = $('#menu_list').children();
			for (var i = 0, len = options.length; i < len; i++) {
				if (!flag && $(options[i]).text().indexOf(searchStr) >= 0) {
					flag = 1;
					$(options[i]).attr('selected', 'selected');
					break;
				}
			}
			if (!flag) {
				$('#menu_list option:first').attr('selected', 'selected');
			}
		}
	});

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