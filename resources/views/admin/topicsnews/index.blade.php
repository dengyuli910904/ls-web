
@extends('admin.layouts.master')

@section('title','专题管理')
@section('banner-title','专题新闻管理')
@section('banner-tips','专题新闻列表')

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
                    <h2><i class="fa fa-table red"></i><span class="break"></span><strong>专题新闻管理</strong></h2>
                    <div class="panel-actions">
                        <!-- <a href="table.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                               <a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> -->
                        <!-- <a href="{{ url('banner/add')}}"><i class="fa fa-times"></i></a> -->

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
                    <form action="{{ route('topics-news.index') }}" method="get">
                        <div class="row">
                            <div class="col-md-3">
                                <input type="hidden" id="topics_id" name="topics_id" class="form-control" value="{{ $data['topics_id'] }}">
                                <select name="is_recommend">
                                    <option value="-1">选择</option>
                                    <option value="1">是</option>
                                    <option value="0">否</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">搜索</button>
                                <button type="button" class="btn btn-default" onclick="window.location.href='{{ route('topics-news.create', ['topics_id' => $data['topics_id']]) }}'">添加</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered table-striped table-condensed table-hover">
                        <thead>
                        <tr>
                            <th width="20%">新闻标题</th>
                            <th width="8%">是否推荐</th>
                            <th width="8%">排序</th>
                            <th width="15%">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($list as $val)
                            <tr>
                                <td>{{ $val->title }}</td>
                                <td>{{ $val->is_recommend == 1 ? '是' : '否' }}</td>
                                <td>{{ $val->sort }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('topics-news.edit', ['id' => $val->id]) }}'">编辑</button>
                                    <button type="button" class="btn btn-danger" onclick="del('{{ $val->id }}')">删除</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $list->links() }}
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
                  url: "/admin/topics-news/" + id,
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
