<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    @include('home.public.script')
    @include('home.public.style')
    @yield('styles')
</head>
<body>
@yield('header')
@yield('banner')

<div class="wrapper container-fluid">
    @yield('content')
</div>
@yield('footer')
</body>
@yield('script')
</html>
