@extends('layouts.dashboard')
@section('title', 'Edit Department')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Update Departement</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Departmen</li>
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

                    <form action="{{ route('departemen.update', $departemen->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label for="" class="form-label">Departement Name</label>
                            <input type="text" class="form-control" name="nama" required
                                value="{{ old('nama', $departemen->nama) }}">
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="active" {{ old('status', $departemen->status == 'active') ? 'selected' : '' }}>Active
                                </option>
                                <option value="inactive" {{ old('status', $departemen->status == 'inactive') ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Description</label>
                            <textarea type="text" class="form-control @error('deksripsi') is-invalid @enderror" name="deksripsi" required>{{ old('deksripsi', $departemen->deksripsi) }}</textarea>
                            @error('deksripsi')
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
