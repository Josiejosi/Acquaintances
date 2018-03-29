@extends('layouts.auth')

@section('content')


    <div id="log-in-head">
        <h1>Verify Email</h1>
        <div id="logo">
            <a href="{{ url( '/' ) }}"><img src="{{ asset( 'img/logo.png' ) }}" alt="Acquaintances"></a>
        </div>
    </div>
    
    <div class="form-output">

        <div class="panel panel-info">
            <div class="panel-heading">Registration</div>
            <div class="panel-body">
                You have successfully registered. An email is sent to you for verification.
            </div>
        </div>

    </div>

@endsection
