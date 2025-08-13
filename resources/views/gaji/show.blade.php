@extends('layouts.dashboard')
@section('title', 'Show Payrolls')

@section('content')

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Show Payrolls</h3>
                    <p class="text-subtitle text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Reiciendis, excepturi.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href={{ route('dashboard') }}>Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> Show Payrolls</li>
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
                        Show Payrolls
                    </h5>
                </div>
                <div class="card-body">
                    <div id="print-area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="" class="form-label fw-bold">Employee Name</label>
                                    <p>{{ $gaji->karyawan->nama_lengkap }}</p>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label fw-bold">Salary</label>
                                    <p>{{ number_format($gaji->gaji) }}</p>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label fw-bold">Bonus</label>
                                    <p>{{ number_format($gaji->bonus) }}</p>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label fw-bold">Cuts</label>
                                    <p>{{ number_format($gaji->potongan) }}</p>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="" class="form-label fw-bold">Total Gaji</label>
                                    <p>{{ number_format($gaji->total_gaji) }}</p>
                                </div>
                                <div class="mb-2">
                                    <label for="" class="form-label fw-bold">Pay Date</label>
                                    <p>{{ Carbon\Carbon::parse($gaji->tanggal_gaji)->format('d F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-10">
                        <a href="{{ route('gaji.index') }}">
                            <button class="btn btn-secondary" type="button">Back To List</button></a>
                        <button class="btn btn-primary" id="btn-print" type="button"><span class="bi bi-printer"></span>
                            Print</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.getElementById("btn-print").addEventListener("click", function() {
            let printContent = document.getElementById("print-area").innerHTML;
            let originalContent = document.body.innerHTML;

            document.body.innerHTML = printContent;

            window.print();

            document.body.innerHTML = originalContent;
        })
    </script>
@endsection
