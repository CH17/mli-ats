<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>MLI ATS | Mlicme-ee</title>        
    <link href="{{ asset('frontend/css/app.css') }}" rel="stylesheet"> 
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script>
       var base_url = {!! json_encode(url('/')) !!};   
    </script>
</head>	    

    <body>
        
        <div id="wrapper content_pt content_pb">
            
            @yield('content') 

        </div>
        <div class="ajax_loading">
            <img src="{{asset('images/ajax-loader.svg')}}" alt="">
        </div>
        
        <script src="{{asset('frontend/js/app.js')}}"></script>     

    </body>
</html>