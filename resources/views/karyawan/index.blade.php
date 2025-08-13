@extends('layouts.dashboard')
@section('title', 'Data Karyawan')

@section('content')

    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Employee List</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Karyawan</li>
                            <li class="breadcrumb-item active" aria-current="page">index</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Simple Datatable
                    </h5>
                </div>
                <div class="card-body">


                    @if (session('Berhasil'))
                        <div class="alert alert-success">{{ session('Berhasil') }}</div>
                    @endif

                    <div class="d-flex">
                        <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3 ms-auto">Create Employee</a>
                    </div>

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Departements</th>
                                <th>Roles</th>
                                <th>Status</th>
                                <th>Salary</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($karyawan as $kr)
                                <tr>
                                    <td>{{ $kr->nama_lengkap }}</td>
                                    <td>{{ $kr->email }}</td>
                                    <td>{{ $kr->no_telepon }}</td>
                                    <td>{{ $kr->departemen->nama }}</td>
                                    <td>{{ $kr->jabatan->nama_jabatan }}</td>
                                    <td>
                                        @if ($kr->status === 'active')
                                            <span class="text-success">{{ ucfirst($kr->status) }}</span>
                                        @else
                                            <span class="text-danger">{{ ucfirst($kr->status) }}</span>
                                        @endif
                                    </td>
                                    <td>{{ number_format($kr->gaji) }}</td>
                                    <td>
                                        <a href="{{ route('karyawan.show', $kr->id) }}"
                                            class="btn btn-sm btn-info">View</a>
                                        <a href="{{ route("karyawan.edit", $kr->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route("karyawan.destroy", $kr->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method("DELETE")
                                           <button class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure Want To Delete')">Delete</button>
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

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2023 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart-fill icon-mid"></i></span>
                    by <a href="https://saugi.me">Saugi</a></p>
            </div>
        </div>
    </footer>
@endsection
