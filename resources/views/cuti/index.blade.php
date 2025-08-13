@extends('layouts.dashboard')
@section('title', 'Leave Requests')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Leave Requests</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Leave Requests</li>
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
                        <div class="alert alert-success">{!! session('Berhasil') !!}</div>
                    @endif
                    <div class="d-flex">
                        <a href="{{ route('cuti.create') }}" class="btn btn-primary mb-3 ms-auto">Add Record
                        </a>
                    </div>

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Employee Nmae</th>
                                <th>Leave Type</th>
                                <th>Leave Start</th>
                                <th>Leave End</th>
                                <th>Status</th>
                                @if (session('jabatan') == 'HR')
                                    <th>Leave Options</th>
                                    <th>Data Options</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cuti as $ct)
                                <tr>
                                    <td>{{ $ct->karyawan->nama_lengkap }}</td>
                                    <td>{{ ucfirst($ct->jenis_cuti) }}</td>
                                    <td>{{ $ct->awal_cuti }}</td>
                                    <td>{{ $ct->akhir_cuti }}</td>
                                    <td>
                                        @if ($ct->status === 'pending')
                                            <span class="text-warning">{{ ucfirst($ct->status) }}</span>
                                        @elseif ($ct->status == 'accepted')
                                            <span class="text-success">{{ ucfirst($ct->status) }}</span>
                                        @else
                                            <span class="text-danger">{{ ucfirst($ct->status) }}</span>
                                        @endif
                                    </td>
                                    @if (session('jabatan') == 'HR')
                                        <td>
                                            @if ($ct->status == 'accepted')
                                                <a href="{{ route('cuti.reject', $ct->id) }}"
                                                    class="btn btn-sm btn-danger">Reject</a>
                                            @elseif ($ct->status == 'rejected')
                                                <a href="{{ route('cuti.confirm', $ct->id) }}"
                                                    class="btn btn-sm btn-success">Confirm</a>
                                            @else
                                                <a href="{{ route('cuti.confirm', $ct->id) }}"
                                                    class="btn btn-sm btn-success">Confirm</a>
                                                <a href="{{ route('cuti.reject', $ct->id) }}"
                                                    class="btn btn-sm btn-danger">Reject</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('cuti.edit', $ct->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('cuti.destroy', $ct->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure want to delete {{ $ct->karyawan->nama_lengkap }}')">Delete</button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection
