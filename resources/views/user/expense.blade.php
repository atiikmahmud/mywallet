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
                                    <div class="card-header h4 text-center" style="background-color: #fd9f45">
                                        Your Expenses
                                    </div>
                                    <div class="card-body income-body-area">
                                        <div class="income-button-area row d-flex justify-content-between">
                                            <div class="col-md-3">
                                                <a href="{{ route('search.expense.month') }}"
                                                    class="btn btn-sm btn-primary">Monthly</a>
                                                <a href="{{ route('search.expense.year') }}"
                                                    class="btn btn-sm btn-primary">Yearly</a>
                                            </div>
                                            <div class="col-md-6">
                                                <form action="{{ route('search.expense.date') }}" method="POST">
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
                                                    data-bs-target="#expense">Add Expense</button>
                                            </div>
                                        </div>
                                        <div class="income-inner-body-area mt-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="income-table">
                                                        <table class="table table-striped">
                                                            <thead class="sticky-top bg-white">
                                                                <tr>
                                                                    <th scope="col">No.</th>
                                                                    <th scope="col">Title</th>
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">Purpose</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col" style="width: 15%">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($expenseList) > 0)
                                                                    @foreach ($expenseList as $data)
                                                                        <tr>
                                                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                                                            <td>{{ Str::limit($data->title, 25) }}</td>
                                                                            <td>{{ $data->created_at->toFormattedDateString() }}
                                                                            </td>
                                                                            <td>{{ $data->categories->name }}</td>
                                                                            <td>৳ {{ number_format($data->amount) }}</td>
                                                                            <td>
                                                                                <a href=""
                                                                                    class="btn btn-sm btn-warning"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#expenseEdit{{$data->id}}">Edit</a>
                                                                                <form action="{{ route('delete.expense') }}"
                                                                                    method="POST" class="d-inline">
                                                                                    @csrf
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $data->id }}">
                                                                                    <button type="submit"
                                                                                        class="btn btn-sm btn-danger"
                                                                                        onclick="return confirm('Are you sure you want to delete this expense information?')">Delete</button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                        @include('user.edit-expense')
                                                                    @endforeach
                                                                @else
                                                                    <tr>
                                                                        <td colspan="6" class="text-center">Data Not
                                                                            Found!</td>
                                                                    </tr>
                                                                @endif
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    Total Expenses: ৳ {{ number_format($expenseListSum) }}
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

    <!-- Add Expense Modal Begin -->
    <div class="modal fade" id="expense" tabindex="-1" aria-labelledby="expenseLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="expenseLabel">Add Your expense</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('user.add-expense')
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Add Expense Modal End -->

@endsection
