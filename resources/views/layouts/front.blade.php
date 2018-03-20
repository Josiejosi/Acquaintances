<!DOCTYPE html> 
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Home') }}</title>

    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

</head>

    <body>
      
      <header>
        <div class="container-full">
        	<div class="row">
                <div class="col-lg-2 col-md-2 col-sm-12">
					<a id="main-category-toggler" class="hidden-md hidden-lg hidden-md"  href="#">
                    	<i class="fa fa-navicon"></i>
                    </a>
					<a id="main-category-toggler-close" class="hidden-md hidden-lg hidden-md" href="#">
                    	<i class="fa fa-close"></i>
                    </a>
                    <div id="logo">
                        <a href="{{ url( '/' ) }}"><img src="{{ asset( 'img/logo.png' ) }}" alt="Acquaintances"></a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 hidden-xs hidden-sm">
                    <div class="search-form">
                        <form id="search" action="#" method="post">
                            <input type="text" placeholder="Search here video posts..."/>
                            <input type="submit" value="Keywords" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </header>

      <div id="main-category">

        @include( "includes.lockedbar" )

        <div id="all-output" class="col-md-10">
            
            @yield('content')

		</div>
        
        <div id="login_dialog" class="modal fade" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please Login</h4>
            </div>
            <div class="modal-body">
                <p>Sorry, to view this video contents you need to be a registered user</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('login') }}" class="btn btn-success">Login</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>

            </div>
        </div>

    </div>


    <script src="{{ asset( 'js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset( 'js/jquery.sticky-kit.min.js') }}"></script>
    <script src="{{ asset( 'js/custom.js') }}"></script>
    <script src="{{ asset( 'js/bootstrap.min.js') }}"></script>
    <script src="{{ asset( 'js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset( 'js/grid-blog.min.js') }}"></script>

	</body>
</html>
