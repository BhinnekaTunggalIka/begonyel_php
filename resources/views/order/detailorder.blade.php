@extends('templates.master')
@section('title', 'Detail Order List')

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
                    <h3>Detail Order List</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    @if (session('create'))
                    <div class="row">
                        <div class="col-6">
                            <div class="alert alert-success alert-dismissible show fade">
                                {{ session('create') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif


                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form class="form form-horizontal">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h6>Invoice Number</h6>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <input type="text" class="form-control" id="disabledInput" value="{{ $detailorder->invoice }}" placeholder="Disabled Text" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6>Customer Name</h6>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <input type="text" class="form-control" id="disabledInput" value="{{ $detailorder->customer_name }}" placeholder="Disabled Text" disabled>
                                                </div>
                                                <div class="col-md-6">
                                                    <h6>Table Number</h6>
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <input type="text" class="form-control" id="disabledInput" value="{{ $detailorder->table_id }}" placeholder="Disabled Text" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-responsive" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Table number</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detailorder->detailorder as $order)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $order->description }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->table_id }}</td>
                                <td>{{ $detailorder->total }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-md-12 col-12">
                        <div class="col-md-6">
                            <h6>Grand Total</h6>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

</section>
</div>
</div>
@endsesction