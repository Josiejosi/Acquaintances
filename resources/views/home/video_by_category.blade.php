@extends('layouts.app')

@section('content')

    @if( count( $bulder ) > 0 )

        @foreach( $bulder as $video )


            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="video-item">
                    <div class="thumb">
                        <div class="hover-efect"></div>
                        <small class="time">{{ $video->video_length }}</small>
                        <a href="{{ url( '/watch' ) }}/{{ $video->id }}"><img src="{{ asset('img/play.jpg ') }}" alt=""></a>
                    </div>
                    <div class="video-info">
                        <a href="#" class="title">{{ $video->name }}</a>
                        <a class="channel-name" href="#">
                            {{ (\App\Models\User::find( $video->user_id ) )->name  }} {{ (\App\Models\User::find( $video->user_id ) )->name  }}
                            <span>
                                <i class="fa fa-check-circle"></i></span></a>
                        <span class="views"><i class="fa fa-eye"></i>0 views </span>
                        <span class="date"><i class="fa fa-clock-o"></i>{{ $video->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            </div>


        @endforeach    

    @else

        <h1 class="new-video-title"><i class="fa fa-soccer-ball-o"></i> No channels in this category.</h1>

    @endif


@endsection