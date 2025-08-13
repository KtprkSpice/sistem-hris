@extends('layouts.dashboard')
@section('title', 'Jabatan')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Roles</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Roles</li>
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
                        Simple Datatable
                    </h5>
                </div>
                <div class="card-body">


                    @if (session('Berhasil'))
                        <div class="alert alert-success">{{ session('Berhasil') }}</div>
                    @endif

                    @if ($errors->all())
                        @foreach ($errors->all() as $error)
                            <span class="alert alert-danger">{{ $error }}</span>
                        @endforeach
                    @endif

                    <div class="d-flex">
                        <a href="{{ route('jabatan.create') }}" class="btn btn-primary mb-3 ms-auto">Tambah
                            Jabatan</a>
                    </div>

                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Role Name</th>
                                <th>Role Description</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jabatan as $jb)
                                <tr>
                                    <td>{{ $jb->nama_jabatan }}</td>
                                    <td>{{ $jb->deskripsi }}</td>
                                    <td>
                                        <a href="{{ route('jabatan.edit', $jb->id) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <form action="{{ route('jabatan.destroy', $jb->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure want to delete {{ $jb->nama_jabatan }} Roles?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

@endsection
