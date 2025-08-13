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



                    <form action={{ route('tugas.store') }} method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="" class="form-label">Title</label>
                            <input type="text" class="form-control" name="nama_tugas" required>
                            @error('nama_tugas')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="mb-2">
                            <label for="" class="form-label">Karyawan</label>
                            <select name="ditugaskan" class="form-control @error('ditugaskan') is-invalid @enderror">
                                <option value="">Select an Employee</option>
                                @foreach ($karyawan as $kr)
                                    <option value="{{ $kr->id }}">{{ $kr->nama_lengkap }}</option>
                                @endforeach
                                @error('ditugaskan')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror

                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">Due Date</label>
                            <input type="datetime-local"
                                class="form-control @error('tenggat_waktu') is-invalid @enderror date" name="tenggat_waktu"
                                value="{{ old('tenggat_waktu') }}" required>
                            @error('tenggat_waktu')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-2">
                            <label for="" class="form-label">Status</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror">
                                <option value="pending">Pending</option>
                                <option value="on progress">On Progress</option>
                            </select>
                            @error('status')
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

                        <div class="mt-10">
                            <button class="btn btn-primary" type="submit">Create</button>
                            <a href="{{ route('tugas.index') }}">
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
