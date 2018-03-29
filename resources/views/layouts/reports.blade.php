<!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home') }} - {{ $title }}</title>

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

</head>

    <body>

        <header>
            <div class="container-full">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <div id="logo">
                            <a href="{{ url( '/home' ) }}"><img src="{{ asset( 'img/logo.png' ) }}" alt="Acquaintances"></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    
        <div id="main-category">

            <div id="all-output" class="col-md-12">
                
                @yield('content')

    		</div>

        </div>

        <script src="{{ asset( 'js/jquery-3.2.1.min.js') }}"></script>
        <script src="{{ asset( 'js/jquery.sticky-kit.min.js') }}"></script>
        <script src="{{ asset( 'js/custom.js') }}"></script>
        <script src="{{ asset( 'js/bootstrap.min.js') }}"></script>
        <script src="{{ asset( 'js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset( 'js/grid-blog.min.js') }}"></script>

        @yield('js')

	</body>
</html>
