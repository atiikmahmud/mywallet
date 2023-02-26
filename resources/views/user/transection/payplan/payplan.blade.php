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
                                    <div class="card-header h4 text-center" style="background-color: #85C1E9">
                                        Your Payment Plan
                                    </div>
                                    <div class="card-body income-body-area">
                                        <div class="income-button-area row d-flex justify-content-between">
                                            <div class="col-md-3">
                                                <a href="{{ route('user.paid.plan') }}"
                                                    class="btn btn-sm btn-success">Paid Pay Plan</a>
                                            </div>
                                            <div class="col-md-3 text-end">
                                                <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#payPlan">Add Pay Plan</button>
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
                                                                    <th scope="col" style="width: 25%">Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @if (count($payPlan) > 0)
                                                                    @foreach ($payPlan as $data)
                                                                        <tr>
                                                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                                                            <td>{{ Str::limit($data->title, 20) }}</td>
                                                                            <td>{{ $data->created_at->toFormattedDateString() }}
                                                                            </td>
                                                                            <td>{{ $data->categories->name }}</td>
                                                                            <td>৳ {{ number_format($data->amount) }}</td>
                                                                            <td>
                                                                                <form action="{{ route('user.do.paid.pay') }}" method="POST" class="d-inline">
                                                                                    @csrf
                                                                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                                                                    <button type="submit" class="btn btn-sm btn-success">Paid</button>
                                                                                </form>
                                                                                <a href=""
                                                                                    class="btn btn-sm btn-warning"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#payplanEdit{{$data->id}}">Edit</a>
                                                                                <form action="{{ route('delete.payplan') }}"
                                                                                    method="POST" class="d-inline">
                                                                                    @csrf
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $data->id }}">
                                                                                    <button type="submit"
                                                                                        class="btn btn-sm btn-danger"
                                                                                        onclick="return confirm('Are you sure you want to delete this pay plan information?')">Delete</button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                        @include('user.transection.payplan.edit-payplan')
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
                                                    Total Income: ৳ 
                                                    {{ number_format($payPlanSum) }}
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
    <div class="modal fade" id="payPlan" tabindex="-1" aria-labelledby="payPlanLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="payPlanLabel">Add Your Pay Plan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('user.transection.payplan.add-pay-plan', ['categories' => $categories])
                </div>
            </div>
        </div>
    </div>
    <!-- Add Income Modal End -->

@endsection
