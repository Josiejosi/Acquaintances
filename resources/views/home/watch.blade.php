@extends('layouts.app')

@section('content')

	<div id="all-output" class="col-md-12">
	    <div class="row">
	    	<!-- Watch -->
	        <div class="col-md-10 col-md-offset-1">
	        	<div id="watch">

	                <!-- Video Player -->
	                <h1 class="video-title">{{ $bulder->name }}</h1>
	                <div class="video-code">
	                    <iframe width="100%" height="415" src="{{ $bulder->video_url }}" frameborder="0" allowfullscreen=""></iframe>
					</div><!-- // video-code -->

	                <div class="video-share">

	                    <ul class="social_link">
                            <li><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a class="linkedin" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	                    </ul><!-- // Social -->
	                </div><!-- // video-share -->
	                <!-- // Video Player -->


					<!-- Chanels Item -->
                	<div class="chanel-item">
                		<div class="chanel-thumb">
                			<a href="#"><img src="demo_img/ch-1.jpg" alt=""></a>
                		</div>
                		<div class="chanel-info">
                			<a class="title" href="#">
								{{ (\App\Models\User::find( $bulder->user_id ) )->name  }} {{ (\App\Models\User::find( $bulder->user_id ) )->name  }}
                			</a>
                			<span class="subscribers">436,414 subscribers</span>
                		</div>
                		<a href="#" class="subscribe">Subscribe</a>
                	</div>

	                <div id="comments" class="post-comments">
						<div id="disqus_thread"></div>
	                </div>

	        </div><!-- // col-md-8 -->

	    </div><!-- // row -->
	</div>

@endsection
