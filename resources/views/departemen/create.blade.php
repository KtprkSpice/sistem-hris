@extends('layouts.dashboard')
@section('title', 'Create Departemen')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Create Departement</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Departement</li>
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
                        Create Departements
                    </h5>
                </div>
                <div class="card-body">

                    @if ($errors->all())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error )
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    
                    <form action={{ route('departemen.store') }} method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" name="nama" required>
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label for="" class="form-label">Description</label>
                            <textarea type="text" class="form-control @error('deksripsi') is-invalid @enderror" name="deksripsi" required> </textarea>
                            @error('deksripsi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
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
                        <div class="mt-10">
                            <button class="btn btn-primary" type="submit">Create</button>
                            <a href="{{ route('departemen.index') }}">
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
