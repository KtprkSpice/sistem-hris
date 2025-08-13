@extends('layouts.dashboard')
@section('title', 'Edit Department')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Update Role</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Role</li>
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
                        Update Form
                    </h5>
                </div>
                <div class="card-body">


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('jabatan.update', $jabatan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="" class="form-label">Role Name</label>
                            <input type="text" class="form-control" name="nama_jabatan" required
                                value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}">
                            @error('nama_jabatan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Description</label>
                            <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" required>{{ old('deskripsi', $jabatan->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mt-10">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('departemen.index') }}">
                                <button class="btn btn-secondary" type="button">Back To List</button></a>
                        </div>

                    </form>
                </div>
            </div>

        </section>
    </div>
@endsection
