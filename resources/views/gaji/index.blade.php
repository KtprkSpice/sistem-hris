@extends('layouts.dashboard')
@section('title', 'Gaji')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Payrolls</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Payrolls</li>
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

                    @if ($errors->all())
                        @foreach ($errors->all() as $error)
                            <span class="alert alert-danger">{{ $error }}</span>
                        @endforeach
                    @endif

                    <div class="d-flex">
                        <a href="{{ route('gaji.create') }}" class="btn btn-primary mb-3 ms-auto">Add Payroll</a>
                    </div>

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Employee Nmae</th>
                                <th>Payroll</th>
                                <th>Bonus</th>
                                <th>Cuts</th>
                                <th>Total Payroll</th>
                                <th>Payroll Date</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gaji as $gj)
                                <tr>
                                    <td>{{ $gj->karyawan->nama_lengkap }}</td>
                                    <td>{{ number_format($gj->gaji) }}</td>
                                    <td>{{ number_format($gj->bonus) }}</td>
                                    <td>{{ number_format($gj->potongan) }}</td>
                                    <td>{{ number_format($gj->total_gaji) }}</td>
                                    <td>{{ $gj->tanggal_gaji }}</td>
                                    <td>
                                        <a href="{{ route('gaji.show', $gj->id) }}" class="btn btn-sm btn-info">View
                                            Payroll</a>
                                        @if (session('jabatan') == 'HR')
                                            <a href="{{ route('gaji.edit', $gj->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('gaji.destroy', $gj->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure want to delete {{ $gj->karyawan->nama_lengkap }}?')">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection
