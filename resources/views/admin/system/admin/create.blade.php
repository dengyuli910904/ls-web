
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
	<form action="{{ route('admin.store') }}" method="post" class="form form-horizontal" id="form-admin-create">
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
					<input type="text" class="input-text" value="{{ old('name', '') }}" required="required" placeholder="昵称" name="name" >
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>邮箱：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="{{ old('email', '') }}" required="required" placeholder="邮箱" name="email" >
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>密码：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="{{ old('password', '') }}" required="required" placeholder="密码" name="password" >
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>角色：</label>
				<div class="formControls col-10">
					@foreach($data['roles'] as $role)
						<div class="check-box">
							<input type="checkbox" id="role_id{{ $role['id'] }}" name="role_id[]" value="{{ $role['id'] }}" >
							<input type="hidden" name="role_name[]" value="{{ $role['name'] }}">
							<label for="role_id{{ $role['id'] }}">{{ $role['name'] }}</label>
						</div>
					@endforeach
				</div>
			</div>
			<div class="row cl">
				<div class="col-10 col-offset-2">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button id="admin_save_submit" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				</div>
			</div>
	</form>
</div>
@endsection

@section('scripts')
	@parent
	<script type="text/javascript" src="{{ asset('admin/fileinput/js/fileinput.js')}}"></script>
@endsection