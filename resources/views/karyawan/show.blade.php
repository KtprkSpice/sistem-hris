@extends('layouts.dashboard')
@section('title', 'Create Employee')

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
                        <div class="mb-2">
                            <label for="" class="form-label fw-bold h6">Full Name</label>
                            <p>{{ $karyawan->nama_lengkap }}</p>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label fw-bold h6">Email</label>
                            <p>{{ $karyawan->email }}</p>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label fw-bold h6">Phone Number</label>
                            <p>{{ $karyawan->no_telepon }}</p>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label fw-bold h6">Address</label>
                            <pre>{{ $karyawan->alamat }}</pre>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label fw-bold h6">Born Date</label>
                            <p>{{ $karyawan->tgl_lahir }}</p>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label fw-bold h6">Hire Date</label>
                            <p>{{ $karyawan->tgl_kerja }}</p>
                        </div>


                        <div class="mb-2">
                            <label for="" class="form-label fw-bold h6">Departement</label>
                            <p>{{ $karyawan->departemen->nama }}</p>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label fw-bold h6">Roles</label>
                            <p>{{ $karyawan->jabatan->nama_jabatan }}</p>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label fw-bold h6">Status</label>
                            <p>{{ $karyawan->status }}</p>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label fw-bold h6">Salary</label>
                            <p>{{ $karyawan->gaji }}</p>
                        </div>


                        <div class="mt-10">
                            <a href="{{ route('karyawan.index') }}">
                                <button class="btn btn-secondary" type="button">Back To List</button></a>
                        </div>

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
