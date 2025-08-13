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
                        Create Tasks
                    </h5>
                </div>
                <div class="card-body">


                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    {{-- Kenapa bukan edit? karena edit itu untuk view page ini yang ada di index nah disini make update karena di tugascontroller kita pake logic update untuk save sama seperti create --}}
                    <div class="mb-3">
                        <label for="">Title</label>
                        <p>{{ $tugas->nama_tugas }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="">Employee</label>
                        <p>{{ $tugas->karyawan->nama_lengkap }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="">Due Date</label>
                        <p>{{ \Carbon\Carbon::parse($tugas->tenggat_waktu)->format('d F Y') }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="">Status</label>
                        <p>{{ $tugas->status }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <p>{{ $tugas->deksripsi }}</p>
                    </div>
                    <a href="{{ route('tugas.index') }}" class="btn btn-secondary">Back to List</a>
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
