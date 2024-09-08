@extends('layouts.header')
@section('content')	
<!-- Main Wrapper -->
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">

            <img class="img-fluid logo-dark mb-2 logo-color" src="{{asset('assets')}}/img/logo.svg" alt="Logo">
            <img class="img-fluid logo-light mb-2" src="{{asset('assets')}}/img/logo.svg" alt="Logo">
            <div class="loginbox">

                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to the dashboard</p>

                        {{-- <form action="index.html">
                            <div class="input-block mb-3">
                                <label class="form-control-label">Email Address</label>
                                <input type="email" class="form-control">
                            </div>
                            <div class="input-block mb-3">
                                <label class="form-control-label">Password</label>
                                <div class="pass-group">
                                    <input type="password" class="form-control pass-input">
                                    <span class="fas fa-eye toggle-password"></span>
                                </div>
                            </div>
                            <div class="input-block mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check custom-checkbox">
                                            <input type="checkbox" class="form-check-input" id="cb1">
                                            <label class="custom-control-label" for="cb1">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-lg  btn-primary w-100" type="submit">Login</button>
                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>
                            <!-- Social Login -->
                            <div class="social-login mb-3">
                                <span>Login with</span>
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a><a href="#"
                                    class="google"><i class="fab fa-google"></i></a>
                            </div>
                            <!-- /Social Login -->
                            <div class="text-center dont-have">Don't have an account yet? <a
                                    href="register.html">Register</a></div>
                        </form> --}}

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="input-block mb-3">
                                <label class="form-control-label" for="email">Email Address</label>
                                <input type="email" id="email" class="form-control" name="email" :value="old('email')"
                                    required autofocus autocomplete="username">
                                @error('email')
                                    <div class="text-red-600 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="input-block mb-3">
                                <label class="form-control-label" for="password">Password</label>
                                <div class="pass-group">
                                    <input type="password" id="password" class="form-control pass-input" name="password"
                                        required autocomplete="current-password">
                                    <span class="fas fa-eye toggle-password"></span>
                                </div>
                                @error('password')
                                    <div class="text-red-600 mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="input-block mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-check custom-checkbox">
                                            <input type="checkbox" id="remember_me" name="remember"
                                                class="form-check-input">
                                            <label for="remember_me" class="custom-control-label">Remember me</label>
                                        </div>
                                    </div>
                                    <div class="col-6 text-end">
                                        @if (Route::has('password.request'))
                                            <a class="forgot-link" href="{{ route('password.request') }}">Forgot
                                                Password?</a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-lg btn-primary w-100" type="submit">Login</button>

                            <div class="login-or mt-4">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>

                            <!-- Social Login -->
                            <!-- <div class="social-login mb-3">
                                <span>Login with</span>
                                <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="google"><i class="fab fa-google"></i></a>
                            </div> -->
                            <!-- /Social Login -->

                            <!-- <div class="text-center dont-have mt-3">Don't have an account yet? <a
                                    href="{{ route('register') }}">Register</a></div> -->
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->
<!-- jQuery -->
@endsection