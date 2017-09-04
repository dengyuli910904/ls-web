
@extends('admin.layouts.master')

@section('title','角色管理')
@section('banner-title','角色管理')
@section('banner-tips','角色编辑')

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
	<form action="{{ route('role.update', ['id' => $data['role']['id']]) }}" method="post" class="form form-horizontal" id="form-role-edit-{{ $data['role']['id'] }}">
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
				<label class="form-label col-2"><span class="c-red">*</span>英文名称：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="{{ $data['role']['enname'] }}" required="required" placeholder="英文名称" name="enname" >
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>名称：</label>
				<div class="formControls col-10">
					<input type="text" class="input-text" value="{{ $data['role']['name'] }}" required="required" placeholder="名称" name="name" >
				</div>
			</div>
			<div class="row cl">
				<label class="form-label col-2"><span class="c-red">*</span>超级管理员：</label>
				<div class="formControls col-10">
					<div class="radio-box">
						<input type="radio" id="isadmin0" name="isadmin" value="0"
							   @if($data['role']['isadmin'] == 0)
							   checked="checked"
								@endif
								>
						<label for="isadmin0">否</label>
					</div>
					<div class="radio-box">
						<input type="radio" id="isadmin1" name="isadmin" value="1"
							   @if($data['role']['isadmin'] == 1)
							   checked="checked"
								@endif
								>
						<label for="isadmin1">是</label>
					</div>
				</div>
			</div>
			<div class="row cl">
				<div class="col-10 col-offset-2">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="_method" value="PUT">
					<button id="role_save_submit" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
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