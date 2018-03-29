@extends('layouts.auth')

@section('content')


    <div id="log-in-head">
        <h1>Verification Complete</h1>
        <div id="logo">
            <a href="{{ url( '/' ) }}"><img src="{{ asset( 'img/logo.png' ) }}" alt="Acquaintances"></a>
        </div>
    </div>
    
    <div class="form-output">

        <div class="panel panel-info">
            <div class="panel-heading">Registration Confirmed</div>
            <div class="panel-body">
                Your Email is successfully verified. Click here to <a href="{{url('/login')}}">login</a>
            </div>
        </div>

    </div>

@endsection
