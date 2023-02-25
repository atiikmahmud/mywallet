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
                                    <div class="card-header h4 text-center" style="background-color: #BB8FCE">
                                        About
                                    </div>
                                    <div class="card-body income-body-area">
                                        <div class="contact-area">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="contact-image mt-4">
                                                        <img src="{{ asset('img/about-wallet.png') }}" alt="contact-image"
                                                            height="450px">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="contact-form mt-4">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div class="about-my-wallet">
                                                                    <h2 class="text-center">My Wallet</h2>
                                                                </div>
                                                                <p style="text-align:justify;">
                                                                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequatur, pariatur porro unde nulla repellendus blanditiis atque illum fuga. Excepturi, suscipit sunt! Atque commodi magnam quae corrupti? Nulla enim quia, expedita esse, deleniti eos totam vero quidem, assumenda fugiat saepe corporis. Nesciunt quam amet minima omnis beatae vero ad repellendus fugiat. Placeat ea non error fugiat voluptate vel illum dolore. Quisquam, similique dicta suscipit, ab voluptatum amet veniam minus eum voluptate id sapiente ut? Dolores officiis deserunt ex cumque nam? Inventore eveniet, exercitationem odio unde aliquid officiis est ex provident praesentium nostrum dolores fuga ipsam maxime dicta et animi omnis sed?
                                                                </p>
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
