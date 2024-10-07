@extends('master.master')
@section('title', 'Masukkan Data Kegiatan Program Kerja')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <p class="text-subtitle text-muted">Input Detail Data Kegiatan Program Kerja</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('penyusunan.kegiatan.view') }}">Data Kegiatan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Insert</li>
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
                            <form class="form" method="POST" action=" {{ route('penyusunan.kegiatan.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Program Kerja</label>
                                            <select class="choices form-select" name="proker_id" id="proker_id" type="text" aria-placeholder="Program Kerja">
                                                @foreach ($proker as $prokers)
                                                <option value="{{ $prokers->id }}">{{ $prokers->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nama Kegiatan</label>
                                            <input type="text" id="nama_kegiatan" class="form-control 
                                            @error ('nama_kegiatan') is invalid
                                            @enderror"
                                                placeholder="Nama Kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}">
                                            @error('nama_kegiatan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group square-box">
                                                            <label>Indikator</label>
                                                            <input type="text" id="pic" class="form-control 
                            @error ('pic') is-invalid
                            @enderror"
                                                                placeholder="Person In Charge" name="pic" value="{{ old('pic') }}">
                                                            @error('pic')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group square-box">
                                                            <label>Outcome</label>
                                                            <input type="text" id="pic" class="form-control 
                            @error ('pic') is-invalid
                            @enderror"
                                                                placeholder="Person In Charge" name="pic" value="{{ old('pic') }}">
                                                            @error('pic')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Orang yang Bertanggung Jawab (PIC)</label>
                                            <input type="text" id="pic" class="form-control 
                                            @error ('pic') is invalid
                                            @enderror"
                                                placeholder="Person In Charge" name="pic" value="{{ old('pic') }}">
                                            @error('pic')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Kepesertaan Kegiatan</label>
                                            <input type="text" id="kepesertaan" class="form-control 
                                            @error ('kepesertaan') is invalid
                                            @enderror"
                                                placeholder="Kepesertaan Kegiatan" name="kepesertaan" value="{{ old('kepesertaan') }}">
                                            @error('kepesertaan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Nomor Standar Akreditasi</label>
                                            <input type="text" id="nomor_standar_akreditasi" class="form-control 
                                            @error ('nomor_standar_akreditasi') is invalid
                                            @enderror"
                                                placeholder="Nomor Standar Akreditasi" name="nomor_standar_akreditasi" value="{{ old('nomor_standar_akreditasi') }}">
                                            @error('nomor_standar_akreditasi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Penjelasan Standar Akreditasi</label>
                                            <input type="text" id="penjelasan_standar_akreditasi" class="form-control 
                                            @error ('penjelasan_standar_akreditasi') is invalid
                                            @enderror"
                                                placeholder="Penjelasan Standar Akreditasi" name="penjelasan_standar_akreditasi" value="{{ old('penjelasan_standar_akreditasi') }}">
                                            @error('penjelasan_standar_akreditasi')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Chart Of Accounts (COA)</label>
                                            <select class="choices form-select" name="coa_id" id="coa_id" type="text" aria-placeholder="COA">
                                                @foreach ($coa as $coas)
                                                <option value="{{ $coas->id }}">{{ $coas->kode }} - {{ $coas->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Latar Belakang Kegiatan</label>
                                            <input type="text" id="latar_belakang" class="form-control 
                                            @error ('latar_belakang') is invalid
                                            @enderror"
                                                placeholder="Latar Belakang Kegiatan" name="latar_belakang" value="{{ old('latar_belakang') }}">
                                            @error('latar_belakang')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Tujuan</label>
                                            <input type="text" id="tujuan" class="form-control 
                                            @error ('tujuan') is invalid
                                            @enderror"
                                                placeholder="Tujuan" name="tujuan" value="{{ old('tujuan') }}">
                                            @error('tujuan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Manfaat Internal</label>
                                            <input type="text" id="manfaat_internal" class="form-control 
                                            @error ('manfaat_internal') is invalid
                                            @enderror"
                                                placeholder="Manfaat Internal" name="manfaat_internal" value="{{ old('manfaat_internal') }}">
                                            @error('manfaat_internal')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Manfaat Eksternal</label>
                                            <input type="text" id="manfaat_eksternal" class="form-control 
                                            @error ('manfaat_eksternal') is invalid
                                            @enderror"
                                                placeholder="Manfaat Eksternal" name="manfaat_eksternal" value="{{ old('manfaat_eksternal') }}">
                                            @error('manfaat_eksternal')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Metode Pelaksanaan</label>
                                            <input type="text" id="metode_pelaksanaan" class="form-control 
                                            @error ('metode_pelaksanaan') is invalid
                                            @enderror"
                                                placeholder="Metode Pelaksanaan" name="metode_pelaksanaan" value="{{ old('metode_pelaksanaan') }}">
                                            @error('metode_pelaksanaan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group square-box">
                                                            <label>Aktivitas</label>
                                                            <input type="text" id="pic" class="form-control 
                            @error ('pic') is-invalid
                            @enderror"
                                                                placeholder="Person In Charge" name="pic" value="{{ old('pic') }}">
                                                            @error('pic')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Biaya Keperluan</label>
                                            <input type="number" id="biaya_keperluan" class="form-control 
                                            @error ('biaya_keperluan') is invalid
                                            @enderror"
                                                placeholder="Biaya Keperluan" name="biaya_keperluan" value="{{ old('biaya_keperluan') }}">
                                            @error('biaya_keperluan')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Persen Dana Yang Dibutuhkan</label>
                                            <input type="number" id="persen_dana" class="form-control 
                                            @error ('persen_dana') is invalid
                                            @enderror"
                                                placeholder="Persen Dana Yang Dibutuhkan" name="persen_dana" value="{{ old('persen_dana') }}">
                                            @error('persen_dana')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Dana Bulan Berjalan</label>
                                            <input type="number" id="dana_bulan_berjalan" class="form-control 
                                            @error ('dana_bulan_berjalan') is invalid
                                            @enderror"
                                                placeholder="Dana Bulan Berjalan" name="dana_bulan_berjalan" value="{{ old('dana_bulan_berjalan') }}">
                                            @error('dana_bulan_berjalan')
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