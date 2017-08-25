
@extends('admin.layouts.master')

@section('title','图片新闻管理')
@section('banner-title','图片新闻管理')
@section('banner-tips','图片新闻列表')

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
                            <h2><i class="fa fa-table red"></i><span class="break"></span><strong>图片新闻管理</strong></h2>

                              <div class="panel-actions">
                                <!-- <a href="table.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                                <a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a> -->
                                <!-- <a href="{{ url('banner/add')}}"><i class="fa fa-times"></i></a> -->
                                <form action=" {{ route('pictures.create')}}" action="get">
                                  <input type="hidden" value="{{$id}}" name="id">
                                  <button type="submit" class="btn btn-primary">添加</button>
                                </form>
                                <!-- <button type="button" class="btn btn-primary" onclick="window.location.href='{{ route('pictures.create',['id'=>$id])}}'">添加</button> -->

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
                            <div class="row">
                              @foreach($data as $item)
                                <!-- <div class="col-md-4">
                                  <img src="{{$item->url}}">
                                </div> -->
                                <div class="col-sm-4 col-md-3">
                                  <div class="thumbnail">
                                    <img  alt="100%x200" style="height: 200px; width: 100%; display: block;" src="{{$item->url}}" data-holder-rendered="true">
                                    <div class="caption">
                                      <h4>{{$item->name}}</h4>
                                      <p>{{$item->description}}</p>
                                      <p>
                                        <a href="#" class="btn btn-primary" role="button" onclick="del('{{$item->id}}')">删除</a>
                                        <!-- <form action="{{ route('pictures.edit',['id'=>$item->id]) }}" method="post" style="display: inline;"> -->
                                          <a href="#" class="btn btn-default" role="button" onclick="window.location.href='{{ route('pictures.edit', ['id' => $item->id]) }}'">编辑</a>
                                        <!-- </form>  -->
                                        
                                      </p>
                                    </div>
                                  </div>
                                </div>
                              @endforeach
                            </div>
                             
                        </div>
                    </div>
                </div><!--/col-->
            </div>    
                    
        </div>
      <script type="text/javascript">
          function del(id)
          {
              $.ajax({
                  url: "/admin/pictures/" + id,
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
