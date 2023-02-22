@extends('layouts.user')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card shadow wallet-dashboard-area">
                    <div class="card-body">
                        <div class="main-body-area">
                            <h3 class="text-center mt-2">{{ $user->name }}'s Profile</h1>
                                <div class="mt-3">
                                    <img src="{{ asset('img/profile.jpg') }}" alt="User Profile Picture" height="150px"
                                        width="150px" class="d-block m-auto rounded-circle">
                                </div>
                                <div class="p-5">
                                    <form action="{{ route('user.profile.update') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ $user->name }}" placeholder="Enter your name"
                                                        required>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email"
                                                        value="{{ $user->email }}" placeholder="Enter your email address"
                                                        readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="phone" class="form-label">Phone Number</label>
                                                    <input id="phone" type="text"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        name="phone" value="{{ $user->phone }}" placeholder="Enter your phone number"
                                                        required>

                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Current Password</label>
                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label for="n_password" class="form-label">New Password</label>
                                                    <input id="n_password" type="password"
                                                        class="form-control @error('n_password') is-invalid @enderror"
                                                        name="n_password">

                                                    @error('n_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-1">
                                                    <label for="c_password" class="form-label">Confirm Password</label>
                                                    <input id="c_password" type="password"
                                                        class="form-control @error('c_password') is-invalid @enderror"
                                                        name="c_password">

                                                    @error('c_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-3">*If you are not interested change password, leave blank password field.</div>
                                            <div class="col-md-6">
                                                <div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
