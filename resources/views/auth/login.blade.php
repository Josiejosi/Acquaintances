@extends('layouts.auth')

@section('content')


        <div id="log-in-head">
            <h1>Log in</h1>
            <div id="logo">
                <a href="{{ url( '/' ) }}"><img src="{{ asset( 'img/logo.png' ) }}" alt="Acquaintances"></a>
            </div>
        </div>
        
        <div class="form-output">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group label-floating">
                    <label class="control-label">Your Email / Username</label>
                    <input id="email" 
                        type="input" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group label-floating">
                    <label class="control-label">Your Password</label>
                    <input class="form-control" placeholder="" name="password" type="password">
                </div>
                
                <div class="remember">
                    <div class="checkbox">
                        <label>
                            <input name="optionsCheckboxes" type="checkbox">
                                Remember Me
                        </label>
                    </div>
                    <a href="{{ url( '/password/reset' ) }}" class="forgot">Forgot My Password</a>
                </div>
                
                <button class="btn btn-lg btn-primary full-width">Login</button>

              <div class="or"></div>

                <a href="{{ url( '/login/github' ) }}" class="btn btn-lg bg-facebook full-width btn-icon-left"><i class="fa fa-gitbub" aria-hidden="true"></i>Login with GitHub</a>


                <p>Don't you have an account? <a href="{{ url( '/register' ) }}">Register Now!</a> </p>
            </form>
        </div>

@endsection
