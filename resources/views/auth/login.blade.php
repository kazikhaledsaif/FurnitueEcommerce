@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                <!-- Login Form s-->
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-form">
                        <h4 class="login-title">Login</h4>
                        <div class="row">

                            <div class="col-md-12 col-12 mb-20">
                                <label>Email Address*</label>
                                <input id="email" class="mb-0 form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback login-error" style="display: inline-block" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            <div class="col-12 mb-20">
                                <label>Password</label>
                                <input class="mb-0 form-control{{ $errors->has('password') ? 'is-invalid' : '' }}" name="password"  type="password" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback"  style="display: inline-block" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                    <input type="checkbox" id="remember_me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember_me">Remember me</label>
                                </div>

                            </div>

                            <div class="col-md-6 text-left text-md-right">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>

                            <div class="col-md-12">
                                {{--submit button placed here--}}
                                <button class="register-button mt-0">Login</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
