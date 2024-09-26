@extends('master.master')
@section('title', 'Pengajuan Pendanaan Kegiatan')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <p class="text-subtitle text-muted">Detail Data Pengajuan Pendanaan Kegiatan</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pendanaan.givePendanaan.view') }}">Data Pengajuan Pendanaann Kegiatan</a></li>
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
                            <form class="form" action="{{ route('pendanaan.dataPendanaan.create', $kegiatan->id) }}" method="GET">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Kegiatan</label>
                                            <input type="text" id="nama_kegiatan" class="form-control 
                                            @error ('nama_kegiatan') is invalid
                                            @enderror"
                                                placeholder="Nama Kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan') ?? $kegiatan->nama_kegiatan }}" disabled>
                                            @error('nama_kegiatan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Program Kerja</label>
                                            <input type="text" id="nama" class="form-control @error ('nama') is-invalid @enderror"
                                                placeholder="Nama Program Kerja" name="nama" value="{{ old('nama') ?? $kegiatan->proker->nama }}" disabled>
                                            @error('nama')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Unit</label>
                                            <input type="text" id="nama" class="form-control @error ('nama') is-invalid @enderror"
                                                placeholder="Nama Unit" name="nama" value="{{ old('nama') ?? $kegiatan->unit->nama }}" disabled>
                                            @error('nama')
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
                                                placeholder="Total Biaya" name="total_biaya" value="{{ old('total_biaya')  ?? $kegiatan->total_biaya }}" disabled>
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
                                                placeholder="Biaya Terbilang" name="biaya_terbilang" value="{{ old('biaya_terbilang')  ?? $kegiatan->biaya_terbilang }}" disabled>
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
                                                placeholder="Status" name="status" value="{{ old('status')  ?? $kegiatan->status }}" disabled>
                                            @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary me-1 mb-1" onclick="window.history.back();">Go Back</button>
                                        <button type="button" class="btn btn-primary me-1 mb-1" data-bs-toggle="modal"
                                            data-bs-target="#inlineForm">
                                            Info
                                        </button>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Berikan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--login form Modal -->
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Informasi Transfer </h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="#">
                        <div class="modal-body">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Nama Kegiatan</label>
                                    <input type="text" id="nama_kegiatan" class="form-control 
                                            @error ('nama_kegiatan') is invalid
                                            @enderror"
                                        placeholder="Nama Kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan') ?? $kegiatan->nama_kegiatan }}" disabled>
                                    @error('nama_kegiatan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Nama Program Kerja</label>
                                    <input type="text" id="nama" class="form-control @error ('nama') is-invalid @enderror"
                                        placeholder="Nama Program Kerja" name="nama" value="{{ old('nama') ?? $kegiatan->proker->nama }}" disabled>
                                    @error('nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Pengguna</label>
                                    <input type="text" id="nama" class="form-control 
                                            @error ('nama') is invalid
                                            @enderror"
                                        placeholder="Nama Pengguna" name="nama" value="{{ old('nama') ?? $kegiatan->user->nama }}" disabled>
                                    @error('nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Nomor Rekening Tujuan</label>
                                    <input type="text" id="nomor_rekening" class="form-control 
                                            @error ('nomor_rekening') is invalid
                                            @enderror"
                                        placeholder="Nomor Rekening" name="nomor_rekening" value="{{ old('nomor_rekening') ?? $kegiatan->user->nomor_rekening }}" disabled>
                                    @error('nomor_rekening')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Total Biaya</label>
                                    <input type="text" id="total_biaya" class="form-control 
            @error ('total_biaya') is-invalid @enderror"
                                        placeholder="Total Biaya" name="total_biaya"
                                        value="Rp {{ old('total_biaya') ?? $kegiatan->total_biaya }}" disabled>
                                    @error('total_biaya')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic multiple Column Form section end -->
</div>
@endsection