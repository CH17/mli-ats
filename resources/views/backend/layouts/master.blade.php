<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MLI ATS | @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <script src="{{ asset('backend/ckeditor/ckeditor.js') }}"></script>
    <link href="{{ asset('backend/css/app.css') }}" rel="stylesheet">
    <script>
        var CSRF_TOKEN ='{{ csrf_token() }}';
        $event_data = [];
        var base_url = {!! json_encode(url('/')) !!};
    </script>
</head>

<body>
    <div id="wrapper">
        @include('backend.layouts.sidebar')
        <div id="page-wrapper" class="gray-bg">
            @include('backend.layouts.header')

            @yield('content')

            @include('backend.layouts.footer')
        </div>
    </div>
    <div class="ajax_loading">
        <img src="{{asset('images/ajax-loader.svg')}}" alt="">
    </div>


    <script src="{{asset('backend/js/app.js')}}"></script>
</body>

</html>