@extends('master.master')
@section('title', 'Edit Data Rencana Anggaran Biaya')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <p class="text-subtitle text-muted">Lakukan Edit Data Rencana Anggaran Biaya</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('anggaranTahunan.rab.view') }}">Data RAB</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            <form class="form" method="POST" action="{{ route('anggaranTahunan.rab.update', $rab->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Kegiatan</label>
                                            <input type="text" id="nama_kegiatan" class="form-control 
                                            @error ('nama_kegiatan') is invalid
                                            @enderror"
                                                placeholder="Nama Kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan') ?? $rab->nama_kegiatan }}">
                                                @error('nama_kegiatan')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Term Of Reference</label>
                                            <select class="choices form-select @error('tor_id') is-invalid @enderror" name="tor_id" id="tor_id">
                                                @foreach ($tor as $tors)
                                                <option value="{{ $tors->id }}" {{ (old('tor_id') ?? $rab->tor_id) == $tors->id ? 'selected' : '' }}>
                                                    {{ $tors->nama }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('tor_id')
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
                                                placeholder="Total Biaya" name="total_biaya" value="{{ old('total_biaya') ?? $rab->total_biaya }}">
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
                                                placeholder="Biaya Terbilang" name="biaya_terbilang" value="{{ old('biaya_terbilang') ?? $rab->biaya_terbilang}}">
                                                @error('biaya_terbilang')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                                    <option value="Aktif" {{ (old('status') ?? $tors->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                    <option value="Tidak Aktif" {{ (old('status') ?? $tors->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                                </select>
                                                @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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