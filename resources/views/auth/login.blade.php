@extends('layouts.header')
@section('content')
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <img class="img-fluid logo-dark mb-2 logo-color" src="{{ asset('assets') }}/img/logo.svg" alt="Logo">
                <img class="img-fluid logo-light mb-2" src="{{ asset('assets') }}/img/logo.svg" alt="Logo">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to the dashboard</p>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <!-- Email Address -->
                                <div class="input-block mb-3">
                                    <label class="form-control-label" for="email">Email Address</label>
                                    <input type="email" id="email" class="form-control" name="email"
                                        :value="old('email')" required autofocus autocomplete="username">
                                    @error('email')
                                        <div class="text-red-600 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="input-block mb-3">
                                    <label class="form-control-label" for="password">Password</label>
                                    <div class="pass-group">
                                        <input type="password" id="password" class="form-control pass-input"
                                            name="password" required autocomplete="current-password">
                                        <span class="fas fa-eye toggle-password"></span>
                                    </div>
                                    @error('password')
                                        <div class="text-red-600 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Database Year Selection -->
                                <div class="input-block mb-3">
                                    <label for="database_year">Select Database Year</label>
                                    <select name="database_year" id="database_year" class="form-control" required>
                                        <option value="">Choose Database Year</option>
                                        <option value="default">Default Database</option>
                                        @foreach($availableYears as $year)
                                            <option value="{{ $year }}">Database {{ $year }}</option>
                                        @endforeach
                                    </select>
                                    @error('database_year')
                                        <div class="text-red-600 mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button class="btn btn-lg btn-primary w-100" type="submit">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
