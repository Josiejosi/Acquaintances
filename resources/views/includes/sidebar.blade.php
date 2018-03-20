	  <div class="site-output">
      	<div class="col-md-2 no-padding-left hidden-sm hidden-xs">
        	<div class="left-sidebar">
            	<div id="sidebar-stick" >
                	<ul class="menu-sidebar">
                    	<li><a href="{{ url('/home') }}"><i class="fa fa-home"></i>Home</a></li>
                    	<li><a href="{{ url('/trending') }}"><i class="fa fa-bolt"></i>Trending</a></li>
                    	<li><a href="{{ url('/history') }}"><i class="fa fa-clock-o"></i>History</a></li>
                    	<li><a href="{{ url('/upload') }}"><i class="fa fa-upload"></i>upload</a></li>
                    </ul>
                	<ul class="menu-sidebar">
                        <li><a href="{{ url('/profile') }}"><i class="fa fa-edit"></i>edit profile</a></li>
                    	<li>
                         
                            <form action="{{ url( '/logout' ) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-xs btn-info btn-block"><i class="fa fa-sign-out color-4"></i>sign out</button>
                            </form>
                            
                        </li>
                    </ul>

                    @if ( auth()->user()->is_admin )

                    <ul class="menu-sidebar">
                        <li><a href="#"><i class="fa fa-user"></i>Admin</a></li>
                        <li><a href="{{ url('/user') }}"><i class="fa fa-users"></i>Users</a></li>
                        <li><a href="{{ url('/block') }}"><i class="fa fa-users"></i>Block</a></li>
                        <li><a href="{{ url('/category') }}"><i class="fa fa-send-o"></i>Categories</a></li>
                    </ul>

                    @endif

                    <ul class="menu-sidebar">
                        <li><a href="{{ url('/help') }}"><i class="fa fa-question-circle"></i>Help</a></li>
                    </ul>

                </div>

                <div class="clear"></div>
            </div>
        </div>