@extends('admin.layouts.master')

@section('title','角色权限管理')
@section('banner-title','角色权限管理')
@section('banner-tips','角色权限编辑')

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
	<form action="{{ route('permission-role.update', ['id' => $data['role']['id']]) }}" method="post" class="form form-horizontal" id="form-permission_role-update-{{ $data['role']['id'] }}">
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
				<label class="form-label col-2">权限：</label>
				<div class="formControls col-10">
					@foreach($data['permissions'] as $module)
						<dl class="cl permission-list">
							<dt>
								<label>
									<input type="checkbox" value="{{ $module['id'] }}"
										   name="permission_id[]"
										   @if(in_array($module['id'], $data['role']['permission_ids']))
											checked="checked"
										   @endif
										   id="role-permission-{{ $module['id'] }}"> {{ $module['name'] }}</label>
							</dt>
							<dd>
								@foreach($module['child'] as $method)
								<dl class="cl permission-list2">
									<dt>
										<label class="">
											<input type="checkbox" value="{{ $method['id'] }}"
												   name="permission_id[]"
												   @if(in_array($method['id'], $data['role']['permission_ids']))
												   checked="checked"
												   @endif
												   id="role-permission-{{ $module['id'] }}-{{ $method['id'] }}"> {{ $method['name'] }}</label>
									</dt>
									<dd>
										@foreach($method['child'] as $action)
											<label class=""><input type="checkbox" value="{{ $action['id'] }}"
																   name="permission_id[]"
																   @if(in_array($action['id'], $data['role']['permission_ids']))
																   checked="checked"
																   @endif
																   id="role-permission-{{ $module['id'] }}-{{ $method['id'] }}-{{ $action['id'] }}"> {{ $action['name'] }}</label>
										@endforeach
									</dd>
								</dl>
								@endforeach
							</dd>
						</dl>
					@endforeach
				</div>
			</div>
			<div class="row cl">
				<div class="col-10 col-offset-2">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<button id="permission_role_save_submit" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
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

	$(".permission-list dt input:checkbox").click(function(){
		$(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
	});
	$(".permission-list2 dd input:checkbox").click(function(){
		var l =$(this).parent().parent().find("input:checked").length;
		var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
		if($(this).prop("checked")){
			$(this).closest("dl").find("dt input:checkbox").prop("checked",true);
			$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
		}
		else{
			if(l==0){
				$(this).closest("dl").find("dt input:checkbox").prop("checked",false);
			}
			if(l2==0){
				$(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
			}
		}

	});
});

</script>
@endsection