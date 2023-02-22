@extends('layouts.user')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card shadow wallet-dashboard-area">
                    <div class="card-body">
                        <div class="main-body-area">

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

                            <h1 class="text-center mt-2">Expenses Page</h1>
                            <p style="text-align: justify;">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque aperiam harum optio
                                voluptatibus, earum rerum itaque at fugit asperiores dolor quae, dignissimos id
                                recusandae quos, voluptas tenetur quam dolorum fuga. Tenetur architecto autem
                                temporibus maxime optio corporis, repellendus nam assumenda, ducimus excepturi
                                veritatis deserunt laboriosam quidem exercitationem nulla obcaecati quas eius quia
                                itaque doloribus, odio quod vero voluptates magni. Saepe tenetur suscipit voluptate?
                                Corrupti accusamus officia amet consectetur non impedit saepe dolorem assumenda illo
                                aliquid ipsum dolores repudiandae voluptates qui, commodi dicta iste vero error
                                iure. Sunt commodi magni ut nemo, hic quos a eos aut esse, mollitia natus
                                voluptates.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
