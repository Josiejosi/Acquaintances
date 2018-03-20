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
                <div class="col-lg-2 col-md-2 col-sm-12">
					<a id="main-category-toggler" class="hidden-md hidden-lg hidden-md"  href="#">
                    	<i class="fa fa-navicon"></i>
                    </a>
					<a id="main-category-toggler-close" class="hidden-md hidden-lg hidden-md" href="#">
                    	<i class="fa fa-close"></i>
                    </a>
                    <div id="logo">
                        <a href="{{ url( '/home' ) }}"><img src="{{ asset( 'img/logo.png' ) }}" alt="Acquaintances"></a>
                    </div>
                </div><!-- // col-md-2 -->
                <div class="col-lg-4 col-md-4 col-sm-6 hidden-xs hidden-sm">
                    <div class="search-form">
                        <form id="search" action="#" method="post">
                            <input type="text" placeholder="Search here video posts..."/>
                            <input type="submit" value="Keywords" />
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs hidden-sm">
                    <ul class="notifications">
                        <li class="dropdown">
                        <a href="#" data-toggle="dropdown"><i class="fa fa-bell-o"></i>
                        	<span class="badge badge-color3 header-badge">{{ 0 }}</span>
                        </a>
						<ul class="dropdown-menu dropdown-notifications-items ">
                        	<li>
                            	<div class="notification-info">
                                    <a href="#"><i class="fa fa-video-camera color-1"></i>
                                    <strong>{{ $name }}</strong> Add a new <span>Video</span>
                                    <h5 class="time">{{ 'Now'}}</h5>
                                    </a>
                                </div>
                            </li>
                        </ul>

                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-3 hidden-xs hidden-sm">
					  <div class="dropdown">
                        <a data-toggle="dropdown" href="#" class="user-area">
                            <div class="thumb">
                                <img src="{{ asset( 'img/user.png' ) }}" alt="Acquaintances">
                            </div>
                            
                            <h2>{{ $name }}</h2>
                            <h3>{{ $subscribers }} subscribers</h3>

                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu account-menu">
                           <li><a href="{{ url('/profile') }}"><i class="fa fa-edit color-1"></i>Edit profile</a></li>
                           <li><a href="{{ url('/upload') }}"><i class="fa fa-video-camera color-2"></i>add video</a></li>
                        </ul>
                       <form action="{{ url( '/logout' ) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-xs btn-info btn-block"><i class="fa fa-sign-out color-4"></i>sign out</button>
                        </form>
    				</div>
                </div>
            </div><!-- // row -->
        </div><!-- // container-full -->
      </header><!-- // header -->

      <div id="main-category">
        <div class="container-full">
        	<div class="row">
                <div class="col-md-12">

                    @if( count( $categories ) > 0 )

                        <ul class="main-category-menu">

                            @foreach( $categories as $category )
                                <li class="color-{{ rand( 1, 5 ) }}"><a href="{{ url( '/videos/' ) }}/{{ $category->name }}">
                                    <i class="fa fa-play"></i>{{ $category->name }}</a>
                                </li>
                            @endforeach

                        </ul>

                    @else
                        <p>No categories found</p>
                    @endif

                </div>
              </div>
          </div>
      </div>

        @include( "includes.sidebar" )

        <div id="all-output" class="col-md-10">
            
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
