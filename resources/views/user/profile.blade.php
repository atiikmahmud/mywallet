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
                                <img src="{{ asset('img/profile.jpg') }}" alt="User Profile Picture" height="150px" width="150px" class="d-block m-auto rounded-circle">
                            </div>
                            <div class="p-5">
                                <form action="{{ route('user.profile.update') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" name="id" value="{{ $user->id }}">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Enter your name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" value="{{ $user->email }}" placeholder="Enter your email address" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="phone" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" placeholder="Enter your phone number" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Current Password</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label for="n_password" class="form-label">New Password</label>
                                                <input type="password" class="form-control" id="n_password" name="n_password">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-1">
                                                <label for="c_password" class="form-label">Confirm Password</label>
                                                <input type="password" class="form-control" id="c_password" name="c_password">
                                            </div>
                                        </div>
                                        <div class="mb-3">*If you are not interested change password, don't fill password field.</div>
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
