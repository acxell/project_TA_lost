@extends('master.master')
@section('title', 'Detail Data Laporan Pertanggung Jawaban Kegiatan')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <p class="text-subtitle text-muted">Detail Data Laporan Pertanggung Jawaban Kegiatan</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('penyusunan.lpjKegiatan.view') }}">Data LPJ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                            <form class="form" action="" method="POST">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Kegiatan</label>
                                            <input type="text" id="nama_kegiatan" class="form-control 
                                            @error ('nama_kegiatan') is invalid
                                            @enderror"
                                                placeholder="Nama Kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan') ?? $lpj->kegiatan->nama_kegiatan }}" disabled>
                                            @error('nama_kegiatan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Program Kerja</label>
                                            <input type="text" id="nama" class="form-control @error ('nama') is-invalid @enderror"
                                                placeholder="Nama Program Kerja" name="nama" value="{{ old('nama') ?? $lpj->proker->nama }}" disabled>
                                            @error('nama')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Penjelasan Kegiatan</label>
                                            <input type="text" id="penjelasan_kegiatan" class="form-control @error ('penjelasan_kegiatan') is-invalid @enderror"
                                                placeholder="Penjelasan Kegiatan" name="penjelasan_kegiatan" value="{{ old('penjelasan_kegiatan') ?? $lpj->penjelasan_kegiatan }}" disabled>
                                            @error('penjelasan_kegiatan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Jumlah Peserta Undangan</label>
                                            <input type="text" id="jumlah_peserta_undangan" class="form-control 
                                            @error ('jumlah_peserta_undangan') is invalid
                                            @enderror"
                                                placeholder="Jumlah Peserta Undangan" name="jumlah_peserta_undangan" value="{{ old('jumlah_peserta_undangan')  ?? $lpj->jumlah_peserta_undangan }}" disabled>
                                            @error('jumlah_peserta_undangan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Jumlah Peserta Hadir</label>
                                            <input type="text" id="jumlah_peserta_hadir" class="form-control 
                                            @error ('jumlah_peserta_hadir') is invalid
                                            @enderror"
                                                placeholder="Jumlah Peserta Hadir" name="jumlah_peserta_hadir" value="{{ old('jumlah_peserta_hadir')  ?? $lpj->jumlah_peserta_hadir }}" disabled>
                                            @error('jumlah_peserta_hadir')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary me-1 mb-1" onclick="window.history.back();">Go Back</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@endsection