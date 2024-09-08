@extends('master.master')
@section('title', 'Edit Data Term Of Reference')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <p class="text-subtitle text-muted">Lakukan Edit Data TOR</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('anggaranTahunan.tor.view') }}">Data TOR</a></li>
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
                            <form class="form" method="POST" action="{{ route('anggaranTahunan.tor.update', $tor->id) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Program Kerja</label>
                                            <input type="text" id="nama_proker" class="form-control 
                                            @error ('nama_proker') is invalid
                                            @enderror"
                                                placeholder="Nama Program Kerja" name="nama_proker" value="{{ old('nama_proker') ?? $tor->nama_proker }}">
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
                                                placeholder="Satuan Kerja" name="satuan_kerja" value="{{ old('satuan_kerja') ?? $tor->satuan_kerja }}">
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
                                                placeholder="PIC" name="pic" value="{{ old('pic') ?? $tor->pic }}">
                                                @error('pic')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <fieldset class="form-group">
                                                <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
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
                                            <select class="choices form-select @error('unit_id') is-invalid @enderror" name="unit_id" id="unit_id">
                                                @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}" {{ (old('unit_id') ?? $tor->unit_id) == $unit->id ? 'selected' : '' }}>
                                                    {{ $unit->nama }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('unit_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
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