
@extends('admin.layouts.master')

@section('title','管理员管理')
@section('banner-title','管理员管理')
@section('banner-tips','管理员编辑')

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
	<form action="{{ route('admin.update', ['id' => $data['admin']['id']]) }}" method="post" class="form form-horizontal" id="form-admin-edit-{{ $data['admin']['id'] }}">
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
				<label class="form-label col-2"><span class="c-red">*</span>昵称：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="{{ $data['admin']['name'] }}" required="required" placeholder="昵称" name="name" >
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>角色：</label>
				<div class="formControls col-10">
					@foreach($data['roles'] as $role)
						<div class="check-box">
							<input type="checkbox" id="role_id{{ $role['id'] }}" name="role_id[]" value="{{ $role['id'] }}"
									@foreach($data['admin']['roles'] as $role_id)
										@if($role['id'] == $role_id)
											checked="checked"
										@endif
									@endforeach
									>
							<input type="hidden" name="role_name[]" value="{{ $role['name'] }}">
							<label for="role_id{{ $role['id'] }}">{{ $role['name'] }}</label>
						</div>
					@endforeach
				</div>
			</div>
			<div class="row cl">
				<div class="col-10 col-offset-2">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<button id="admin_save_submit" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
					<!--<button onclick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>-->
				</div>
			</div>
	</form>
</div>
@endsection

@section('scripts')
	@parent
	<script type="text/javascript" src="{{ asset('admin/fileinput/js/fileinput.js')}}"></script>
@endsection