	  <div class="site-output">
      	<div class="col-md-2 no-padding-left hidden-sm hidden-xs">
        	<div class="left-sidebar">
            	<div id="sidebar-stick" >
                	<ul class="menu-sidebar">
                        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>Site</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/home') }}"><i class="fa fa-home"></i>Home</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            @endauth
                        @endif

                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div>