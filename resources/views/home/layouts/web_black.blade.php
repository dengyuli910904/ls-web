<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>hns</title>
    @yield('styles')

</head>
<body>
<!--头部-->
@include('home.public.header_black')

<!--中间所有内容-->
<div class="index">
   @yield('content')
</div>
@include('home.public.footer_black')
@yield('scripts')
</body>
</html>