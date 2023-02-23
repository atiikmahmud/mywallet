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
                                    <div class="card-header h4 text-center" style="background-color: #4cd294">
                                        Your Income Filter by Month
                                    </div>
                                    <div class="card-body income-body-area">
                                        <div class="income-button-area row d-flex justify-content-between">
                                            <div class="col-md-3">
                                                <a href="{{ route('search.income.month') }}"
                                                    class="btn btn-sm btn-primary">Monthly</a>
                                                <a href="{{ route('search.income.year') }}"
                                                    class="btn btn-sm btn-primary">Yearly</a>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="{{ route('search.income.date') }}" method="POST">
                                                    @csrf
                                                    <div class="input-group">
                                                        <span class="input-group-text" id="basic-addon1">Search</span>
                                                        <input type="date" name="start_date"
                                                            class="form-control form-control-sm" placeholder="Search here.."
                                                            aria-label="search">
                                                        <span class="px-1 pt-2">To</span>
                                                        <input type="date" name="end_date"
                                                            class="form-control form-control-sm" placeholder="Search here.."
                                                            aria-label="search">

                                                        <button class="btn btn-sm btn-outline-secondary" type="submit"
                                                            id="button-addon2"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-3 text-end">
                                                <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#income">Add Income</button>
                                            </div>
                                        </div>
                                        <div class="income-inner-body-area mt-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="income-month-table">
                                                        <table class="table table-striped">
                                                            <thead class="sticky-top bg-white">
                                                                <tr>
                                                                    <th scope="col">No.</th>
                                                                    <th scope="col">Month</th>
                                                                    <th scope="col">Monthly Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($sumOfResult) > 0)
                                                                    @foreach ($sumOfResult as $item => $value)
                                                                        <tr>
                                                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                                                            <td>{{ \Carbon\Carbon::parse($item)->format('M-Y') }}
                                                                            </td>
                                                                            <td>৳ {{ number_format($value) }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                    <tr>
                                                                        <td colspan="3" class="text-center">Data Not
                                                                            Found!</td>
                                                                    </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
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

    <!-- Add Income Modal Begin -->
    <div class="modal fade" id="income" tabindex="-1" aria-labelledby="incomeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="incomeLabel">Add Your Income</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('user.add-income', ['categories' => $categories])
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Add Income Modal End -->

@endsection
