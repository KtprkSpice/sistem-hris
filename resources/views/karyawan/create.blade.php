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



                    <form action={{ route('karyawan.store') }} method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="nama_lengkap" required>
                            @error('nama_lengkap')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">Phone Number</label>
                            <input type="number" class="form-control" name="no_telepon" required>
                            @error('no_telepon')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">Address</label>
                            <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required> </textarea>
                            @error('alamat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">Born Date</label>
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror date"
                                name="tgl_lahir" value="{{ old('tgl_lahir') }}" required>
                            @error('tgl_lahir')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">Hire Date</label>
                            <input type="date" class="form-control @error('tgl_kerja') is-invalid @enderror date"
                                name="tgl_kerja" value="{{ old('tgl_kerja') }}" required>
                            @error('tgl_kerja')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label for="" class="form-label">Departement</label>
                            <select name="departemen_id" class="form-control @error('departemen_id') is-invalid @enderror">
                                <option value="">Select a Deppartement</option>
                                @foreach ($departemen as $dp)
                                    <option value="{{ $dp->id }}">{{ $dp->nama }}</option>
                                @endforeach
                                @error('departemen_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">Roles</label>
                            <select name="roles_id" class="form-control @error('roles_id') is-invalid @enderror">
                                <option value="">Select a Role</option>
                                @foreach ($role as $rl)
                                    <option value="{{ $rl->id }}">{{ $rl->nama_jabatan }}</option>
                                @endforeach
                                @error('roles_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </select>
                        </div>



                        <div class="mb-2">
                            <label for="" class="form-label">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                         <div class="mb-2">
                            <label for="" class="form-label">Salary</label>
                            <input type="number" class="form-control @error('gaji') is-invalid @enderror"
                                name="gaji" value="{{ old('gaji') }}" required>
                            @error('gaji')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mt-10">
                            <button class="btn btn-primary" type="submit">Create</button>
                            <a href="{{ route('karyawan.index') }}">
                                <button class="btn btn-secondary" type="button">Back To List</button></a>
                        </div>

                    </form>
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
