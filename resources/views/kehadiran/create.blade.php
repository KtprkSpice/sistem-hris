@extends('layouts.dashboard')
@section('title', 'Create Presences')

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
                            <li class="breadcrumb-item active" aria-current="page">Presences Create</li>
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
                        Create Presences
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

                    @if (session('jabatan') == 'HR')

                        <form action="{{ route('kehadiran.store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="">Employee Name</label>
                                <select name="id_karyawan"
                                    class="form-control @error('id_karyawan')
                                is-invalid
                            @enderror">
                                    <option value="">Select An Employee</option>
                                    @foreach ($karyawan as $kr)
                                        <option value="{{ $kr->id }}">{{ $kr->nama_lengkap }}</option>
                                    @endforeach
                                    @error('id_karyawan')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Check in</label>
                                <input type="date" name="waktu_masuk"
                                    class="dateTime form-control @error('waktu_masuk')
                                is-invalid
                            @enderror">
                                @error('waktu_masuk')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Check Out</label>
                                <input type="date" name="waktu_keluar"
                                    class="dateTime form-control @error('waktu_keluar')
                                is-invalid
                            @enderror">
                                @error('waktu_keluar')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="">Date</label>
                                <input type="date" name="tanggal"
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
                                    <option value="hadir">Hadir</option>
                                    <option value="absen">Absen</option>
                                    <option value="cuti">Cuti</option>
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
                    @else
                        <form action="{{ route('kehadiran.store') }}" method="POST">
                            @csrf
                            <div class="mb-3"><b>NOTE:</b> Harap aktifkan lokasi di ponsel anda agar dapat melakukan
                                presensi</div>
                            <div class="mb-3">
                                <label for="" class="form-label">Latitude</label>
                                <input type="text" class="form-control" name="latitude" id="latitude" required>
                                @error('latitude')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">longitude</label>
                                <input type="text" class="form-control" name="longitude" id="longitude" required>
                                @error('longitude')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <iframe width="500" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=""  ></iframe>
                            </div>
                            <button class="btn btn-primary" disabled id="btn-present">Submit</button>
                        </form>
                    @endif

                </div>
            </div>

        </section>
    </div>

    <script>
        const iframe = document.querySelector("iframe");

        const officeLat = -6.300848683435793;
        const officeLon = 106.73984387977761;
        const treshold = 0.01;
        
        navigator.geolocation.getCurrentPosition(function(position) {
            const lat = position.coords.latitude;
            const lon = position.coords.longitude;

            iframe.src = `https://google.com/maps?q=${lat},${lon}&output=embed`;
        });

        document.addEventListener("DOMContentLoaded", (event) => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;

                    document.getElementById("latitude").value = lat;
                    document.getElementById("longitude").value = lon;

                    const distance = Math.sqrt(Math.pow(lat - officeLat, 2) + Math.pow(lon - officeLon, 2));

                    if (distance <= treshold) {
                        alert("Kamu berada dikantor selamat bekerja");
                        document.getElementById("btn-present").removeAttribute("disabled")
                    }else {
                        alert("kamu sedang tidak berada dikantor, pastikan berada dikantor untuk melakukan presensi")
                    }
                })
            }
        })
    </script>
@endsection
