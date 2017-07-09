<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('home.profile.styles')

    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body id="page-top" class="index">
      
    <!-- Navigation -->
    @include('home.profile.header')
    @yield('content')


    @include('home.profile.footer')


    @include('home.profile.scripts')
    
</body>
</html>
