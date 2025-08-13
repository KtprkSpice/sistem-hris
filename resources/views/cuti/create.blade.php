@extends('layouts.dashboard')
@section('title', 'Create Leave Request')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Create Leave Request</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Leave Request</li>
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
                        Create Leave Request
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

                    <form action={{ route('cuti.store') }} method="POST">
                        @csrf
                        @if (session('jabatan') == 'HR')
                            <div class="mb-2">
                                <label for="" class="form-label">Employee Name</label>
                                <select name="id_karyawan" class="form-control" id="id_karyawan">
                                    @foreach ($karyawan as $kr)
                                        <option value="{{ $kr->id }}">{{ $kr->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                                @error('id_karyawan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                        <div class="mb-2">
                            <label for="" class="form-label">Leave Type</label>
                            <select name="jenis_cuti" class="form-control">
                                <option value="">Pilih Jenis Cuti</option>
                                <option value="sakit">Sakit</option>
                                <option value="liburan">Liburan</option>
                                <option value="melahirkan">Melahirkan</option>
                            </select>
                            @error('jenis_cuti')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Leave Start</label>
                            <input type="date" name="awal_cuti"
                                class="form-control date @error('awal_cuti')
                                is-invalid
                            @enderror">
                            @error('awal_cuti')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Leave End</label>
                            <input type="date" name="akhir_cuti"
                                class="form-control date @error('akhir_cuti')
                                is-invalid
                            @enderror">
                            @error('akhir_cuti')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-10">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('cuti.index') }}">
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
