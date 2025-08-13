@extends('layouts.dashboard')
@section('title', 'Kehadiran')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Roles</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kehadiran</li>
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
                        <a href="{{ route('kehadiran.create') }}" class="btn btn-primary mb-3 ms-auto">Tambah
                            Kehadiran</a>
                    </div>

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Date</th>
                                <th>Status</th>
                                @if (session('jabatan') == 'HR')
                                    <th>Options</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kehadiran as $kh)
                                <tr>
                                    <td>{{ $kh->karyawan->nama_lengkap }}</td>
                                    <td>{{ $kh->waktu_masuk }}</td>
                                    <td>{{ $kh->waktu_keluar }}</td>
                                    <td>{{ $kh->tanggal }}</td>
                                    <td>
                                        @if ($kh->status == 'hadir')
                                            <span class="text-success">{{ ucfirst($kh->status) }}</span>
                                        @else
                                            <span class="text-danger">{{ ucfirst($kh->status) }}</span>
                                        @endif
                                    </td>
                                    @if (session('jabatan') == 'HR')
                                        <td>
                                            <a href="{{ route('kehadiran.edit', $kh->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('kehadiran.destroy', $kh->id) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    onclick="return confirm('Apa anda yakin ingin menghapus data {{ $kh->karyawan->nama_lengkap }}')"
                                                    class="btn btn-sm btn-danger">Delete</button>
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
