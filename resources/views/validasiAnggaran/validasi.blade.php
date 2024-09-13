@extends('master.master')
@section('title', 'Validasi Pengajuan Anggaran Tahunan')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <p class="text-subtitle text-muted">Validasi Pengajuan Anggaran Tahunan</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('anggaranTahunan.rab.view') }}">Data RAB</a></li>
                        <li class="breadcrumb-item active" aria-current="page">validasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                        @if($rab->status == 'Telah Diajukan')
                            <form class="form" action="{{ route('validasiAnggaran.acc', $rab->id) }}" method="POST">
                                @csrf
                            <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Kegiatan</label>
                                            <input type="text" id="nama_kegiatan" class="form-control 
                                            @error ('nama_kegiatan') is invalid
                                            @enderror"
                                                placeholder="Nama Kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan') ?? $rab->nama_kegiatan }}" disabled>
                                                @error('nama_kegiatan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Program Kerja</label>
                                            <input type="text" id="nama_proker" class="form-control @error ('nama_proker') is-invalid @enderror"
                                                placeholder="Nama Program Kerja" name="nama_proker" value="{{ old('nama_proker') ?? $rab->tor->nama_proker }}" disabled>
                                            @error('nama_proker')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Total Biaya</label>
                                            <input type="number" id="total_biaya" class="form-control 
                                            @error ('total_biaya') is invalid
                                            @enderror"
                                                placeholder="Total Biaya" name="total_biaya" value="{{ old('total_biaya')  ?? $rab->total_biaya }}" disabled>
                                                @error('total_biaya')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Biaya Terbilang</label>
                                            <input type="text" id="biaya_terbilang" class="form-control 
                                            @error ('biaya_terbilang') is invalid
                                            @enderror"
                                                placeholder="Biaya Terbilang" name="biaya_terbilang" value="{{ old('biaya_terbilang')  ?? $rab->biaya_terbilang }}" disabled>
                                                @error('biaya_terbilang')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="text" id="status" class="form-control 
                                            @error ('status') is invalid
                                            @enderror"
                                                placeholder="Status" name="status" value="{{ old('status')  ?? $rab->status }}" disabled>
                                                @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary me-1 mb-1" onclick="window.history.back();">Go Back</button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Tolak Pengajuan</button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Terima Pengajuan</button>
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@endsection