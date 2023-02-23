@extends('layouts.user')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card shadow wallet-dashboard-area">
                    <div class="card-body">
                        <div class="main-body-area">

                            @include('user.navbar')

                            <!-- Top Card Section Begin -->
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="box-section mb-2">
                                        <a href="{{ route('user.income') }}" class="text-decoration-none text-dark">
                                            <div class="card shadow" style="border-left: 5px solid #4cd294">
                                                <div class="card-body row">
                                                    <div class="info col-md-8">
                                                        <div class="box-title">
                                                            <strong>Total Income</strong>
                                                        </div>
                                                        <div class="count h3 pt-1" style="color: #4cd294">
                                                            <strong>৳</strong> {{ number_format($totalIncome) }}
                                                        </div>
                                                        <div class="details" style="font-size: 12px">
                                                            Details
                                                        </div>
                                                    </div>
                                                    <div class="icon col-md-4 pt-3">
                                                        <i class="fas fa-money-check-alt"
                                                            style="font-size: 50px; color:#4cd294;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-section mb-2">
                                        <a href="{{ route('user.expense') }}" class="text-decoration-none text-dark">
                                            <div class="card shadow" style="border-left: 5px solid #fd9f45">
                                                <div class="card-body row">
                                                    <div class="info col-md-8">
                                                        <div class="box-title">
                                                            <strong>Total Expenses</strong>
                                                        </div>
                                                        <div class="count h3 pt-1" style="color: #fd9f45">
                                                            <strong>৳</strong> {{ number_format($totalExpense) }}
                                                        </div>
                                                        <div class="details" style="font-size: 12px">
                                                            Details
                                                        </div>
                                                    </div>
                                                    <div class="icon col-md-4 pt-3"><i class="far fa-money-bill-alt"
                                                            style="font-size: 50px; color:#fd9f45;"></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="box-section mb-2">
                                        <a href="{{ route('user.dashboard') }}" class="text-decoration-none text-dark">
                                            <div class="card shadow" style="border-left: 5px solid #e83e8c">
                                                <div class="card-body row">
                                                    <div class="info col-md-8">
                                                        <div class="box-title">
                                                            <strong>Total Savings</strong>
                                                        </div>
                                                        <div class="count h3 pt-1" style="color: #e83e8c">
                                                            <strong>৳</strong> {{ number_format($totalSavings) }}
                                                        </div>
                                                        <div class="details" style="font-size: 12px">
                                                            Details
                                                        </div>
                                                    </div>
                                                    <div class="icon col-md-4 pt-3"><i class="fas fa-wallet"
                                                            style="font-size: 50px; color:#e83e8c;"></i></div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Top Card Section End -->

                            <!-- Summery Section Start -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header text-light" style="background-color: #4cd294">
                                            <strong>Income Summery</strong>
                                        </div>
                                        <div class="card-body summery-body">
                                            <table class="table table-striped">
                                                <thead class="sticky-top bg-white">
                                                    <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">Purpose</th>
                                                        <th scope="col">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($incomeSummeryResult as $item => $value)
                                                    <tr>
                                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                                        <td>{{ \App\Models\Category::where('id', $item)->pluck('name')->first() }}</td>
                                                        <td><strong>৳</strong> {{ number_format($value) }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header text-light" style="background-color: #fd9f45">
                                            <strong>Expenses Summery</strong>
                                        </div>
                                        <div class="card-body summery-body">
                                            <table class="table table-striped">
                                                <thead class="sticky-top bg-white">
                                                    <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">Purpose</th>
                                                        <th scope="col">Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($expenseSummeryResult as $item => $value)
                                                    <tr>
                                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                                        <td>{{ \App\Models\Category::where('id', $item)->pluck('name')->first() }}</td>
                                                        <td><strong>৳</strong> {{ number_format($value) }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Summery Section End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
