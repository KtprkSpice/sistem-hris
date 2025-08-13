@extends('layouts.dashboard')
@section('title', 'Tugas')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tugas</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tugas</li>
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
                        @if (session('jabatan') == 'HR')
                            <a href="{{ route('tugas.create') }}" class="btn btn-primary mb-3 ms-auto">Tambah Tugas</a>
                        @endif
                    </div>

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Assigned To</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tugas as $tg)
                                <tr>
                                    <td>{{ $tg->nama_tugas }}</td>
                                    <td>{{ $tg->karyawan->nama_lengkap }}</td>
                                    <td>{{ $tg->tenggat_waktu }}</td>
                                    <td>
                                        @if ($tg->status === 'pending')
                                            <span class="text-warning">Pending</span>
                                        @elseif ($tg->status === 'done')
                                            <span class="text-success">Done</span>
                                        @else
                                            <span class="text-danger">{{ $tg->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{-- Ambil BErdasarkan ID --}}
                                        <a href="{{ route('tugas.show', $tg->id) }}" class="btn btn-sm btn-info">View</a>
                                        @if ($tg->status === 'pending')
                                            <a href="{{ route('tugas.done', $tg->id) }}" class="btn btn-sm btn-primary">Mark
                                                As Done</a>
                                        @else
                                            <a href="{{ route('tugas.pending', $tg->id) }}"
                                                class="btn btn-sm btn-success">Mark As Pending</a>
                                        @endif
                                        @if (session('jabatan') == 'HR')
                                            <a href="{{ route('tugas.edit', $tg->id) }}"
                                                class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ route('tugas.destroy', $tg->id) }}" class="d-inline"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger" type="submit">Delete</button>
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
