@extends('layouts.user')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card shadow wallet-dashboard-area">
                    <div class="card-body">
                        <div class="main-body-area">
                            <!-- Navbar Section Begin -->
                            @include('user.navbar')
                            <!-- Navbar Section End -->

                            <!-- Body Section Begin -->
                            <div class="income-body-section mt-3">
                                <div class="card">
                                    <div class="card-header h4 text-center" style="background-color: #F7DC6F ">
                                        Contact
                                    </div>
                                    <div class="card-body income-body-area">
                                        <div class="contact-area">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="contact-image mt-4">
                                                        <img src="{{ asset('img/Contact-Us.jpg') }}" alt="contact-image"
                                                            height="400px">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="contact-form mt-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <form action="" method="POST">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <label for="name"
                                                                            class="form-label">Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="name" name="name"
                                                                            value="Atik Mahmud">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="email" class="form-label">Email
                                                                            address</label>
                                                                        <input type="email" class="form-control"
                                                                            id="email" name="email"
                                                                            value="atiikmahmud@gmail.com">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <label for="message"
                                                                            class="form-label">Message</label>
                                                                        <textarea class="form-control"id="message" name="message" rows="5">
                                                                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
                                                                        </textarea>
                                                                    </div>

                                                                    <button type="submit"
                                                                        class="btn btn-primary">Send</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Body Section End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
