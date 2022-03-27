@extends('templates.master')
@section('title', 'Cart List')

@section('main')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>cart List</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Datacart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{ url('/master-data/carts/create') }}" class="btn btn-primary rounded-pill">Add cart</a>
                </div>
                <div class="card-body">
                    @if(session('create'))
                    <div class="row">
                        <div class="col-6">
                            <div class="alert alert-success alert-dismissible show fade">
                                {{ session('create') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Quantity</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $cart)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $cart->quantity }}</td>
                                <td>{{ $cart->description }}</td>
                                <td>
                                    <a href="{{ url('master-data/carts/' .$cart->id.'/edit') }}" class="btn btn-warning rounded-pill">edit</a>
                                    <form action="{{ url('master-data/carts/' .$cart->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger rounded-pill" onclick="return confirm('Apakah anda yakin?')">delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
</div>
@endsesction