@extends('layouts.dashboard')
@section('title', 'Edit Presences')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Create Presences</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Presences Edit</li>
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
                        Edit Presences
                    </h5>
                </div>
                <div class="card-body">

                    @if ($errors->all())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kehadiran.update', $kehadiran->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="">Employee Name</label>
                            <select name="id_karyawan"
                                class="form-control @error('id_karyawan')
                                is-invalid
                            @enderror">
                                @foreach ($karyawan as $kr)
                                    <option value="{{ $kr->id }}" {{ ($kr->id == $kehadiran->id_karyawan )? "selected" : "" }}>
                                        {{ $kr->nama_lengkap }}
                                    </option>
                                @endforeach
                                @error('id_karyawan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Check in</label>
                            <input type="datetime" name="waktu_masuk"
                                value="{{ old('waktu_masuk', $kehadiran->waktu_masuk) }}"
                                class="dateTime form-control @error('waktu_masuk')
                                is-invalid
                            @enderror">
                            @error('waktu_masuk')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Check Out</label>
                            <input type="datetime" name="waktu_keluar"
                                value="{{ old('waktu_keluar', $kehadiran->waktu_keluar) }}"
                                class="dateTime form-control @error('waktu_keluar')
                                is-invalid
                            @enderror">
                            @error('waktu_keluar')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Date</label>
                            <input type="date" name="tanggal" value="{{ old('tanggal', $kehadiran->tanggal) }}"
                                class="date form-control @error('tanggal')
                                is-invalid
                            @enderror">
                            @error('tanggal')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Status</label>
                            <select name="status"
                                class="form-control @error('status')
                                is-invalid
                            @enderror">
                                <option value="hadir"
                                    {{ old('status', $kehadiran->status == 'hadir') ? 'selected' : '' }}>Hadir
                                </option>
                                <option value="absen"
                                    {{ old('status', $kehadiran->status == 'absen') ? 'selected' : '' }}>Absen
                                </option>
                                <option value="cuti" {{ old('status', $kehadiran->status == 'cuti') ? 'selected' : '' }}>
                                    Cuti
                                </option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-10">
                            <button class="btn btn-info" type="submit">Create</button>
                            <a href="{{ route('kehadiran.index') }}" class="btn btn-secondary">Back To List</a>
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
