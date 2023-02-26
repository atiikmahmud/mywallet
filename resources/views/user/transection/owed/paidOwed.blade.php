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
                                    <div class="card-header h4 text-center" style="background-color: #48C9B0">
                                        Your Owed
                                    </div>
                                    <div class="card-body income-body-area">
                                        <div class="income-button-area row d-flex justify-content-between">
                                            <div class="col-md-3">
                                                <a href="{{ route('user.owed') }}"
                                                    class="btn btn-sm btn-success">Unpaid Owed</a>
                                            </div>
                                            <div class="col-md-3 text-end">
                                                <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                                    data-bs-target="#owed">Add Owed</button>
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
                                                                @if (count($oweds) > 0)
                                                                    @foreach ($oweds as $data)
                                                                        <tr>
                                                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                                                            <td>{{ Str::limit($data->title, 20) }}</td>
                                                                            <td>{{ $data->created_at->toFormattedDateString() }}
                                                                            </td>
                                                                            <td>{{ $data->categories->name }}</td>
                                                                            <td>৳ {{ number_format($data->amount) }}</td>
                                                                            <td>
                                                                                <a href=""
                                                                                    class="btn btn-sm btn-warning"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#owedEdit{{$data->id}}">Edit</a>
                                                                                <form action="{{ route('delete.owed') }}"
                                                                                    method="POST" class="d-inline">
                                                                                    @csrf
                                                                                    <input type="hidden" name="id"
                                                                                        value="{{ $data->id }}">
                                                                                    <button type="submit"
                                                                                        class="btn btn-sm btn-danger"
                                                                                        onclick="return confirm('Are you sure you want to delete this owed information?')">Delete</button>
                                                                                </form>
                                                                            </td>
                                                                        </tr>
                                                                        @include('user.transection.owed.edit-owed')
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
                                                    Total Income: ৳ {{ number_format($oweds_sum) }}
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
    <div class="modal fade" id="owed" tabindex="-1" aria-labelledby="owedLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="incomeLabel">Add Your Owed</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('user.transection.owed.add-owed', ['categories' => $categories])
                </div>
            </div>
        </div>
    </div>
    <!-- Add Income Modal End -->

@endsection
