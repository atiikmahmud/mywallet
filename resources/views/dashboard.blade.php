@extends('layouts.user')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card shadow wallet-dashboard-area">
                    <div class="card-body">
                        <div class="main-body-area">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#dashboard-tab-pane" type="button" role="tab"
                                        aria-controls="dashboard-tab-pane" aria-selected="true">Dashboard</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="expenses-tab" data-bs-toggle="tab"
                                        data-bs-target="#expenses-tab-pane" type="button" role="tab"
                                        aria-controls="expenses-tab-pane" aria-selected="false">Expenses</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="income-tab" data-bs-toggle="tab"
                                        data-bs-target="#income-tab-pane" type="button" role="tab"
                                        aria-controls="income-tab-pane" aria-selected="false">Income</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="dashboard-tab-pane" role="tabpanel"
                                    aria-labelledby="dashboard-tab" tabindex="0">
                                    <div>
                                        @include('user.dashboard')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="expenses-tab-pane" role="tabpanel"
                                    aria-labelledby="expenses-tab" tabindex="0">
                                    @include('user.expenses')
                                </div>
                                <div class="tab-pane fade" id="income-tab-pane" role="tabpanel"
                                    aria-labelledby="income-tab" tabindex="0">
                                    @include('user.income')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
