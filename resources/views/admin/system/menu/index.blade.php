
@extends('admin.layouts.master')

@section('title','菜单管理')
@section('banner-title','菜单管理')
@section('banner-tips','菜单列表')

@section('header')
	@parent
@endsection

@section('left-menu')
	@parent
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2><i class="fa fa-table red"></i><span class="break"></span><strong>菜单管理</strong></h2>
					<div class="panel-actions">
						<!-- <a href="table.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                        <a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> -->
						<!-- <a href="{{ url('banner/add')}}"><i class="fa fa-times"></i></a> -->
						<button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('menu.create')  }}'">添加</button>
					</div>


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
				<div class="panel-body">
					<table class="table table-bordered table-striped table-condensed table-hover">
						<thead>
						<tr>
							<th width="60">ID</th>
							<th width="160">名称</th>
							<th width="160">中文名称</th>
							<th >描述</th>
							<th width="160">链接</th>
							<th width="40">层级</th>
							<th >树</th>
							<th width="20%">操作</th>
						</tr>
						</thead>
						<tbody>
						@foreach( $data as $val)
							<tr>
								<td>{{$val->id}}</td>
								<td>{{$val->enname}}</td>
								<td>{{$val->name}}</td>
								<td>{{$val->descript}}</td>
								<td>{{$val->url}}</td>
								<td>{{$val->level}}</td>
								<td>{{$val->tree}}</td>
								<td>
									<button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('menu.edit', ['id' => $val->id]) }}'">编辑</button>
									<button type="button" class="btn btn-danger" onclick="del('{{ $val->id }}')">删除</button>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					{{ $data->links() }}
							<!-- <ul class="pagination">
                                <li><a href="table.html#">上一页</a></li>
                                <li class="active">
                                  <a href="table.html#">1</a>
                                </li>
                                <li><a href="table.html#">2</a></li>
                                <li><a href="table.html#">3</a></li>
                                <li><a href="table.html#">4</a></li>
                                <li><a href="table.html#">5</a></li>
                                <li><a href="table.html#">下一页</a></li>
                              </ul>      -->
				</div>
			</div>
		</div><!--/col-->
	</div>


	<script type="text/javascript">
		function del(id)
		{
			$.ajax({
				url: "/admin/menu/" + id,
				type:'post',
				data:{
					_method: 'delete'
				},
				dataType: 'json',
				success: function(data){
					alert(data.msg);
					window.location.reload();
				}
			});
		}
	</script>
@endsection