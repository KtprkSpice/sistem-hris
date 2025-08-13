@extends('layouts.dashboard')
@section('title', 'Edit Payrolls')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Payrolls</h3>
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
                        Edit Payrolls
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


                    <form action={{ route('gaji.update', $gaji->id) }} method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="" class="form-label">Employee Name</label>
                            <select name="id_karyawan" class="form-control">
                                @foreach ($karyawan as $kr)
                                    <option value="{{ $kr->id }}"
                                        {{ $kr->id == $gaji->id_karyawan ? 'selected' : '' }}>{{ $kr->nama_lengkap }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_karyawan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Salary</label>
                            <input type="number" value="{{ old('gaji', $gaji->gaji) }}" name="gaji"
                                class="form-control @error('gaji')
                                is-invalid
                            @enderror">
                            @error('gaji')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Bonus</label>
                            <input type="number" name="bonus"
                                class="form-control @error('bonus')
                                is-invalid
                            @enderror"
                                value="{{ old('bonus', $gaji->bonus) }}">
                            @error('bonus')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Cuts</label>
                            <input type="number" name="potongan"
                                class="form-control @error('potongan')
                                is-invalid
                            @enderror"
                                value="{{ old('potongan', $gaji->potongan) }}">
                            @error('potongan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Pay Date</label>
                            <input type="date" name="tanggal_gaji"
                                class="form-control date @error('tanggal_gaji')
                                is-invalid
                            @enderror"
                                value="{{ old('tanggal_gaji', $gaji->tanggal_gaji) }}">
                            @error('tanggal_gaji')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mt-10">
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <a href="{{ route('gaji.index') }}">
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
