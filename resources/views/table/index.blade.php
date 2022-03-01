@extends('templates.master')
@section('title', 'Table List')

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
                    <h3>Table List</h3>
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
                <div class="card-header">
                    <a href="{{ url('/table/create') }}" class="btn btn-primary rounded-pill">Add Table</a>
                </div>
                <div class="card-body">
                    @if(session('status'))
                    <div class="row">
                        <div class="col-6">
                            <div class="alert alert-success alert-dismissible show fade">
                                {{ session('status') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(session('delete'))
                    <div class="row">
                        <div class="col-6">
                            <div class="alert alert-success alert-dismissible show fade">
                                {{ session('delete') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Number</th>
                                <th>Table Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($table as $table)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $table->number }}</td>
                                <td>{{ $table->status_table }}</td>
                                <td>
                                    <a href="{{ url('/table/' .$table->id.'/edit') }}" class="btn btn-warning rounded-pill">edit</a>
                                    <form action="{{ url('/table/' .$table->id) }}" method="POST" class="d-inline">
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