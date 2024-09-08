@extends('master.master')
@section('title', 'Detail Data Term Of Reference')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <p class="text-subtitle text-muted">Detail Data Unit</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('anggaranTahunan.tor.view') }}">Data Unit</a></li>
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
                            <form class="form" action="{{ route('anggaranTahunan.tor.view') }}">
                            <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Program Kerja</label>
                                            <input type="text" id="nama_proker" class="form-control 
                                            @error ('nama_proker') is invalid
                                            @enderror"
                                                placeholder="Nama Program Kerja" name="nama_proker" value="{{ old('nama_proker') ?? $tor->nama_proker }}" disabled>
                                                @error('nama_proker')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Satuan Kerja</label>
                                            <input type="text" id="satuan_kerja" class="form-control 
                                            @error ('satuan_kerja') is invalid
                                            @enderror"
                                                placeholder="Satuan Kerja" name="satuan_kerja" value="{{ old('satuan_kerja') ?? $tor->satuan_kerja }}" disabled>
                                                @error('satuan_kerja')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>PIC</label>
                                            <input type="text" id="pic" class="form-control 
                                            @error ('pic') is invalid
                                            @enderror"
                                                placeholder="PIC" name="pic" value="{{ old('pic') ?? $tor->pic }}" disabled>
                                                @error('pic')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status" disabled>
                                                    <option value="Aktif" {{ (old('status') ?? $tor->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                                    <option value="Tidak Aktif" {{ (old('status') ?? $tor->status) == 'Tidak Aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                                                </select>
                                                @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </fieldset>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <input type="text" id="unit_id" class="form-control @error ('unit_id') is-invalid @enderror"
                                                placeholder="Nama Unit" name="unit_id" value="{{ old('unit_id') ?? $tor->unit->nama }}" disabled>
                                            @error('unit_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button class="btn btn-light-secondary me-1 mb-1">Done</button>
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