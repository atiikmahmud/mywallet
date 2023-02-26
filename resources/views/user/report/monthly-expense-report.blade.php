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
                                    <div class="card-header h4 text-center" style="background-color: #B2BABB">
                                        Report
                                    </div>
                                    <div class="card-body income-body-area">
                                        <div class="d-flex justify-content-between mb-3">
                                            <a href="{{ route('user.report') }}" class="btn btn-sm btn-dark">Cancel</a>
                                            <a href="{{ route('monthly.income.report.pdf') }}" class="btn btn-sm btn-primary">PDF Download</a>
                                        </div>
                                        <div class="border rounded">
                                            <iframe src="http://127.0.0.1:8000/monthly-expense-report" frameborder="0" width="100%" height="432px"></iframe>
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
