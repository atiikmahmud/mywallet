@extends('layouts.common')
@section('title', $title)

@section('content')

    <div class="welcome-page-area">
        <div class="container welcome-container">
            <div class="row d-flex justify-content-center align-items-center welcome-row">
                <div class="col-md-5">
                    <div class="card shadow wallet-card-area">
                        <div class="card-body mt-5">
                            <div class="login-image">
                                <a href="{{ route('home') }}"><img src="{{ asset('img/login.png') }}" alt="My Wallet Login"></a>
                            </div>
                            <div class="login-title text-center mt-3">
                                Login to My Wallet
                            </div>
                            <div class="login-form mt-3">
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        If you are not registered, <a href="{{ route('register') }}">click here</a>.
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
