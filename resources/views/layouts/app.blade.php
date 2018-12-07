<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        /* .carousel-inner > .item > img {
             width:100%; 
             height:500px; 
        }  */
        .carousel {
             width:640px;
             height:80%;
             margin: 0 auto;
        }
        .item > img{
             width:100%; 
             height:500px; 
             margin: 0 auto;
        }
        .cover {
            object-fit: cover;
            width: 100%;
            height: 300px; /* optional, but in my case it was good */
            margin: 0 auto;
        }
        .card-img-top{
            width:100%;
            height:180px; 
        }
        /* Style the buttons */
        .nav-item {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: #f1f1f1;
        cursor: pointer;
        }

        /* Style the active class (and buttons on mouse-over) */
        .active, .nav-item:hover {
        background-color: #b5e6e9;
        color: white;
        }
    </style>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> 
</head>
<body>
    <div id="app">
        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
        {{-- <main class="py-4 container">
            @yield('content')
        </main> --}}
    </div>
    {{-- <script src="{{ asset('js/app.js') }}" defer></script>  --}}
    {{-- remove the defer --}}
    <script src="{{ asset('js/app.js') }}"></script> 
    
    <script src="{{asset('js/laravel-ckeditor/ckeditor.js')}}"></script>
    <script>
            CKEDITOR.replace( 'article-ckeditor' );
    </script>

</body>
{{-- <script>
$( '#topHeader .navbar-nav a' ).on( 'click', function () {
	$( '#topHeader .navbar-nav' ).find( 'li.active' ).removeClass( 'active' );
	$( this ).parent( 'li' ).addClass( 'active' );
});
</script> --}}
</html>