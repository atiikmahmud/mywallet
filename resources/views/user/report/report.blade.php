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
                                        <div class="report-btn-section text-center">
                                            <div class="h5 text-center mb-3">Current Monthly Report</div>
                                            <div class="group-btn mb-3">
                                                <a href="{{ route('report.month.income') }}" class="btn btn-outline-primary">Monthy Income Report</a>
                                                <a href="{{ route('report.month.expense') }}" class="btn btn-outline-success">Monthy Expense Report</a>
                                                <a href="" class="btn btn-outline-warning">Monthy Loan Report</a>
                                                <a href="" class="btn btn-outline-danger">Monthy Owed Report</a>
                                            </div>
                                            <div class="date-range mt-5">
                                                <div class="h5 text-center mb-3">Date Range Report</div>
                                                <div class="input-group px-5">
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Select option</option>
                                                        <option value="1">Income</option>
                                                        <option value="2">Expense</option>
                                                        <option value="3">Loan</option>
                                                        <option value="4">Owed</option>
                                                      </select>
                                                    <input type="date" class="form-control" aria-label="Text input with 2 dropdown buttons"> <span class="mx-2 pt-2">To</span>
                                                    <input type="date" class="form-control" aria-label="Text input with 2 dropdown buttons">
                                                    <button class="btn btn-outline-secondary" type="button">Search</button>
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
