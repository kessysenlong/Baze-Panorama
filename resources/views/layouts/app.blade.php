<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Baze Publications') }}</title>

    
    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro|Bad+Script|Chau+Philomene+One|Galada|Nova+Square|Trirong|Ultra|UnifrakturMaguntia" rel="stylesheet">
    


</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <main class="py-3 bg-white" style="padding-bottom:20px">
            @include('inc.messages')
            @yield('content')
            {{-- @include('inc.navfooter') --}}
        </main> 
        
    </div>
    
   
    <!--scripts-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sidenav.js') }}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
