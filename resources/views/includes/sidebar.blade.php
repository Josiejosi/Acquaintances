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
                    </ul>

                    @if ( auth()->user()->is_admin )

                    <ul class="menu-sidebar">
                        <li><a href="{{ url('/user') }}"><i class="fa fa-users"></i>Users</a></li>
                        <li><a href="{{ url('/block') }}"><i class="fa fa-users"></i>Block</a></li>
                        <li><a href="{{ url('/category') }}"><i class="fa fa-send-o"></i>Categories</a></li>
                    </ul>

                    <ul class="menu-sidebar">
                        <li>
                            <a href="{{ url('/users_in_system') }}">
                                <i class="fa fa-users"></i>Users in System
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/videos_per_user') }}">
                                <i class="fa fa-file-video-o" aria-hidden="true"></i>Videos per User
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/videos_in_system') }}">
                                <i class="fa fa-file-video-o" aria-hidden="true"></i>Videos in System
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/registration_period') }}">
                                <i class="fa fa-users"></i>Registration Period
                            </a>
                        </li>
                    </ul>

                    @endif

                    <ul class="menu-sidebar">
                        <li><a href="{{ url('/help') }}"><i class="fa fa-question-circle"></i>Help</a></li>
                    </ul>

                </div>

                <div class="clear"></div>
            </div>
        </div>