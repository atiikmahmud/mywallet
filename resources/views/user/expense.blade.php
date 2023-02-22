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
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="{{ route('user.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.income') }}">Income</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('user.expense') }}">Expenses</a>
                                </li>
                            </ul>
                            <!-- Navbar Section End -->

                            <!-- Body Section Begin -->
                            <div class="income-body-section mt-3">
                                <div class="card">
                                    <div class="card-header h4 text-center" style="background-color: #fd9f45">
                                        Your Expenses
                                    </div>
                                    <div class="card-body income-body-area">
                                        <div class="income-button-area row d-flex justify-content-between">
                                            <div class="col-md-4">
                                                <a href="" class="btn btn-sm btn-primary">Daily</a>
                                                <a href="" class="btn btn-sm btn-primary">Monthly</a>
                                                <a href="" class="btn btn-sm btn-primary">Yearly</a>
                                            </div>
                                            <div class="col-md-4">
                                                <form action="">
                                                    <div class="input-group">
                                                        <input type="search" class="form-control form-control-sm"
                                                            placeholder="Search here.." aria-label="search"
                                                            aria-describedby="button-addon2">
                                                        <button class="btn btn-sm btn-outline-secondary" type="submit"
                                                            id="button-addon2"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-4 text-end">
                                                <a href="" class="btn btn-sm btn-dark">Add Expense</a>
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
                                                                    <th scope="col">Date</th>
                                                                    <th scope="col">Purpose</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col" style="width: 15%">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th scope="row">1</th>
                                                                    <td>01-02-2023</td>
                                                                    <td>Business</td>
                                                                    <td>৳ 35,000</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">2</th>
                                                                    <td>01-02-2023</td>
                                                                    <td>Business</td>
                                                                    <td>৳ 35,000</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">3</th>
                                                                    <td>01-02-2023</td>
                                                                    <td>Business</td>
                                                                    <td>৳ 35,000</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">4</th>
                                                                    <td>01-02-2023</td>
                                                                    <td>Business</td>
                                                                    <td>৳ 35,000</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">5</th>
                                                                    <td>01-02-2023</td>
                                                                    <td>Business</td>
                                                                    <td>৳ 35,000</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">6</th>
                                                                    <td>01-02-2023</td>
                                                                    <td>Business</td>
                                                                    <td>৳ 35,000</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">7</th>
                                                                    <td>01-02-2023</td>
                                                                    <td>Business</td>
                                                                    <td>৳ 35,000</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">8</th>
                                                                    <td>01-02-2023</td>
                                                                    <td>Business</td>
                                                                    <td>৳ 35,000</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">9</th>
                                                                    <td>01-02-2023</td>
                                                                    <td>Business</td>
                                                                    <td>৳ 35,000</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th scope="row">10</th>
                                                                    <td>01-02-2023</td>
                                                                    <td>Business</td>
                                                                    <td>৳ 35,000</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-sm btn-warning">Edit</a>
                                                                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                                                                    </td>
                                                                </tr>                                                    
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    Lorem ipsum dolor sit amet consectetur.
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
