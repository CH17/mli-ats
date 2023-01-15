<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MLI ATS</title>

    <!-- Styles -->
    <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
</head>
<body class="gray-bg">
    
    @yield('content')
    
   
</body>
</html>
