@extends('layouts.auth')

@section('content')

        <div id="log-in-head">
            <h1>Sing Up</h1>
            <div>
                <a href="{{ url( '/' ) }}"><img src="{{ asset( 'img/logo.png' ) }}" alt="Acquaintances"></a>
            </div>
        </div>
        
        <div class="form-output">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group label-floating">
                    <label class="control-label">Your Unique Username</label>
                    <input 
                        class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" 
                        placeholder="" 
                         name="username" value="{{ old('username') }}" required autofocus
                        type="text">
                        @if ($errors->has('username'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Your Name</label>
                    <input 
                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                        placeholder="" 
                         name="name" value="{{ old('name') }}" required autofocus
                        type="text">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Your Surname</label>
                    <input 
                        class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" 
                        placeholder="" 
                         name="surname" value="{{ old('surname') }}" required autofocus
                        type="text">
                        @if ($errors->has('surname'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('surname') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Your Email</label>
                    <input 
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                        placeholder=""
                         name="email" 
                         value="{{ old('email') }}" required 
                        type="email">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                </div>
                <div class="form-group label-floating">
                    <label class="control-label">Your Password</label>
                    <input 
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                        placeholder="" 
                        name="password" required
                        type="password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                </div>
                
                <div class="form-group label-floating">
                    <label class="control-label">Confirm Your Password</label>
                    <input class="form-control" placeholder="" name="password_confirmation" type="password">
                </div>
                
                <div class="remember">
                    <div class="checkbox">
                        <label>
                            <input name="optionsCheckboxes" type="checkbox">
                            I accept the <a href="#">Terms and Conditions</a> of the website
                        </label>
                    </div>
                </div>
                
              <button class="btn btn-lg btn-primary full-width">Complete sign up</button>

              <div class="or"></div>

                <a href="{{ url( '/login/github' ) }}" class="btn btn-lg bg-twitter full-width btn-icon-left"><i class="fa fa-twitter" aria-hidden="true"></i>sign up with Github</a>


                <p>you have an account? <a href="{{ url( '/login' ) }}"> Sing in !</a> </p>
            </form>
        </div>

@endsection
