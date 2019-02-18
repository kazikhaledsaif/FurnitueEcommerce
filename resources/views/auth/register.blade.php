@extends('layouts.master')

@section('title', 'Registration')

@section('content')
<div class="container m-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Register</h4>

                            <div class="row">
                                <div class="col-md-6 col-12 mb-20">
                                    <label>First Name</label>
                                    <input id="name" type="text" class="mb-0 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6 col-12 mb-20">
                                    <label>Last Name</label>
                                    <input id="lname" type="text" class="mb-0 form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" value="{{ old('lname') }}" required autofocus>

                                    @if ($errors->has('lname'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="col-md-12 mb-20">
                                <label>Email Address*</label>
                                <input id="email" type="email" class=" mb-0 form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Password</label>
                                <input id="password" type="password" class="mb-0 form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6 mb-20">
                                <label>Confirm Password</label>
                                <input id="password-confirm" type="password" class="mb-0 form-control" name="password_confirmation" required>

                            </div>


                            <div class="col-12">
                                <button class="register-button mt-0">Register</button>
                            </div>
                            </div>
                        </div>

                    </form>
        </div>
    </div>
</div>

@endsection
