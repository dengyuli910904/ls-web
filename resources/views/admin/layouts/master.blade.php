@include('UEditor::head');

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>后台管理-@yield('title')</title>      
        
        <!-- Import google fonts - Heading first/ text second -->
        <!-- <link rel='stylesheet' type='text/css' href='http://fonts.useso.com/css?family=Open+Sans:400,700|Droid+Sans:400,700' /> -->
        <!--[if lt IE 9]>
<link href="http://fonts.useso.com/css?family=Open+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Open+Sans:700" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Droid+Sans:400" rel="stylesheet" type="text/css" />
<link href="http://fonts.useso.com/css?family=Droid+Sans:700" rel="stylesheet" type="text/css" />
<![endif]-->

        <!-- Fav and touch icons -->
        <link rel="shortcut icon" href="{{ URL::asset('ico/favicon.ico') }}" type="image/x-icon" />    

        <!-- Css files -->
        <link href="{{ URL::asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">     
        <link href="{{ URL::asset('admin/css/jquery.mmenu.css') }}" rel="stylesheet">      
        <link href="{{ URL::asset('admin/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('admin/css/climacons-font.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('admin/plugins/xcharts/css/xcharts.min.css') }}" rel=" stylesheet">      
        <link href="{{ URL::asset('admin/plugins/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('admin/plugins/morris/css/morris.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('admin/plugins/jquery-ui/css/jquery-ui-1.10.4.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('admin/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet">        
        <link href="{{ URL::asset('admin/css/style.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('admin/css/add-ons.min.css') }}" rel="stylesheet">       

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!--[if !IE]>-->

            <script src="{{ URL::asset('admin/js/jquery-2.1.1.min.js') }}"></script>

    <!--<![endif]-->

    <!--[if IE]>
    
        <script src="assets/js/jquery-1.11.1.min.js"></script>
    
    <![endif]-->

    <!--[if !IE]>-->

        <script type="text/javascript">
            window.jQuery || document.write("<script src='admin/assets/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
        </script>

    <!--<![endif]-->
    </head>
</head>

<body>
    <!-- start: Header -->
     @section('header')
    <div class="navbar" role="navigation">
    
        <div class="container-fluid">       
            
            <ul class="nav navbar-nav navbar-actions navbar-left">
                <li class="visible-md visible-lg"><a href="index.html#" id="main-menu-toggle"><i class="fa fa-th-large"></i></a></li>
                <li class="visible-xs visible-sm"><a href="index.html#" id="sidebar-menu"><i class="fa fa-navicon"></i></a></li>            
            </ul>
            
            <!-- <form class="navbar-form navbar-left">
                <button type="submit" class="fa fa-search"></button>
                <input type="text" class="form-control" placeholder=""></a>
            </form> -->
            <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >免费模板</a></div>
            <ul class="nav navbar-nav navbar-right">
                
                <li class="dropdown visible-md visible-lg">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="user-avatar" src="{{ URL::asset('admin/img/avatar.jpg') }}" alt="user-mail">Lily</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-menu-header">
                            <strong>账户设置</strong>
                        </li>                       
                        <li><a href="page-profile.html"><i class="fa fa-user"></i> 修改密码</a></li>
                        <li><a href="page-login.html"><i class="fa fa-wrench"></i> 个人信息</a></li>
                        <li><a href="index.html"><i class="fa fa-sign-out"></i> 退出登录</a></li> 
                    </ul>
                </li>
                <li><a href="index.html"><i class="fa fa-power-off"></i></a></li>
            </ul>
            
        </div>
        
    </div>
    @show
    <!-- end: Header -->
    
    <div class="container-fluid content">
    
        <div class="row">
                
            <!-- start: Main Menu -->
             @section('left-menu')
            <div class="sidebar ">
                                
                <div class="sidebar-collapse">
                    <div class="sidebar-header t-center">
                        <span><img class="text-logo" src="{{ URL::asset('admin/img/logo1.png') }}"><i class="fa fa-space-shuttle fa-3x blue"></i></span>
                    </div>                                      
                    <div class="sidebar-menu">                      
                        <ul class="nav nav-sidebar">
                            <li><a href="{{url('news/list')}}"><i class="fa fa-laptop"></i><span class="text"> 新闻管理</span></a></li>
                            <li><a href="{{url('newstype/list')}}"><i class="fa fa-picture-o"></i><span class="text">新闻类型管理</span></a></li>
                            <li><a href="{{url('comments/list')}}"><i class="fa fa-laptop"></i><span class="text"> 评论管理</span></a></li>
                            <!--<li><a href="{{url('admin/role/rolelist')}}"><i class="fa fa-laptop"></i><span class="text"> 角色管理</span></a></li>
                            <li><a href="{{url('admin/permission/permissionlist')}}"><i class="fa fa-laptop"></i><span class="text"> 权限管理</span></a></li>
                            <li><a href="{{url('admin/pictureserver/pictureserverlist')}}"><i class="fa fa-laptop"></i><span class="text"> 图片服务器管理</span></a></li> -->
                           
                        </ul>
                    </div>                  
                </div>
            </div>
            @show
        </div>
            <!-- end: Main Menu -->
            <!-- start: Content -->
            <div class="main">
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><i class="fa fa-laptop"></i> @yield('banner-title')</h3>
                        <ol class="breadcrumb">
                            <li><i class="fa fa-home"></i><a href="index.html">首页</a></li>
                            <li><i class="fa fa-laptop"></i>@yield('banner-tips')</li>                          
                        </ol>
                    </div>
                </div>
                @yield('content')
            </div>
            <!-- end: Content -->
        <br><br><br>
    <!--/container-->
        
    
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Warning Title</h4>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <div class="clearfix"></div>
    
        
    <!-- start: JavaScript-->
    

    <!--[if IE]>
    
        <script type="text/javascript">
        window.jQuery || document.write("<script src='assets/js/jquery-1.11.1.min.js'>"+"<"+"/script>");
        </script>
        
    <![endif]-->
    <script src="{{ URL::asset('admin/js/jquery-migrate-1.2.1.min.js')}}"></script>
    <script src="{{ URL::asset('admin/js/bootstrap.min.js')}}"></script>  
    
    
    <!-- page scripts -->
    <script src="{{ URL::asset('admin/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/touchpunch/jquery.ui.touch-punch.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/fullcalendar/js/fullcalendar.min.js')}}"></script>
    <!--[if lte IE 8]>
        <script language="javascript" type="text/javascript" src="assets/plugins/excanvas/excanvas.min.js"></script>
    <![endif]-->
    <script src="{{ URL::asset('admin/plugins/flot/jquery.flot.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/flot/jquery.flot.pie.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/flot/jquery.flot.stack.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/flot/jquery.flot.resize.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/flot/jquery.flot.time.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/flot/jquery.flot.spline.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/xcharts/js/xcharts.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/autosize/jquery.autosize.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/placeholder/jquery.placeholder.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/datatables/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/morris/js/morris.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/jvectormap/js/gdp-data.js')}}"></script>    
    <script src="{{ URL::asset('admin/plugins/gauge/gauge.min.js')}}"></script>
    
    
    <!-- theme scripts -->
    <!--<script src="{{ URL::asset('admin/js/SmoothScroll.js')}}"></script>
    <script src="{{ URL::asset('admin/js/jquery.mmenu.min.js')}}"></script>
    <script src="{{ URL::asset('admin/js/core.min.js')}}"></script>
    <script src="{{ URL::asset('admin/plugins/d3/d3.min.js')}}"></script> -->
    
    <!-- inline scripts related to this page -->
    <script src="{{ URL::asset('admin/js/pages/index.js')}}"></script>    
    
    <!-- end: JavaScript-->
    
</body>
</html>