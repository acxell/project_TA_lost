<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\coa;
use App\Models\indikatorKegiatan;
use App\Models\Kegiatan;
use App\Models\outcomeKegiatan;
use App\Models\pengguna;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();

        return view('penyusunan.kegiatan.view', ['kegiatan' => $kegiatan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatan = Kegiatan::all();
        $proker = ProgramKerja::all();
        $coa = coa::all();

        return view('penyusunan.kegiatan.create', ['kegiatan' => $kegiatan, 'proker' => $proker, 'coa' => $coa]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'proker_id' => 'string|required|exists:program_kerjas,id',
            'nama_kegiatan' => 'string|required|unique:kegiatans',
            'pic' => 'string|required',
            'kepesertaan' => 'string|required',
            'nomor_standar_akreditasi' => 'string|required',
            'penjelasan_standar_akreditasi' => 'string|required',
            'coa_id' => 'string|required|exists:coas,id',
            'latar_belakang' => 'string|required',
            'tujuan' => 'string|required',
            'manfaat_internal' => 'string|required',
            'manfaat_eksternal' => 'string|required',
            'metode_pelaksanaan' => 'string|required',
            'biaya_keperluan' => 'numeric|required',
            'persen_dana' => 'numeric|required',
            'dana_bulan_berjalan' => 'numeric|required',
            'outcomes' => 'array|required',
            'outcomes.*' => 'string|required',
            'indikators' => 'array|required',
            'indikators.*' => 'string|required',

            // Validasi waktu dan penjelasan dari setiap kategori
            'waktu_persiapan' => 'array|required',
            'waktu_persiapan.*' => 'date|required',
            'penjelasan_persiapan' => 'array|required',
            'penjelasan_persiapan.*' => 'string|required',

            'waktu_pelaksanaan' => 'array|required',
            'waktu_pelaksanaan.*' => 'date|required',
            'penjelasan_pelaksanaan' => 'array|required',
            'penjelasan_pelaksanaan.*' => 'string|required',

            'waktu_pelaporan' => 'array|required',
            'waktu_pelaporan.*' => 'date|required',
            'penjelasan_pelaporan' => 'array|required',
            'penjelasan_pelaporan.*' => 'string|required',
        ]);

        $validateData['user_id'] = Auth::id();
        $user = Auth::user();
        $validateData['unit_id'] = $user->unit_id;
        $validateData['satuan_id'] = $user->unit->satuan_id;

        // Create the Kegiatan record
        $kegiatan = Kegiatan::create($validateData);

        if ($kegiatan) {
            // Store outcomes and indicators
            foreach ($request->outcomes as $outcome) {
                OutcomeKegiatan::create([
                    'kegiatan_id' => $kegiatan->id,
                    'outcome' => $outcome,
                ]);
            }

            foreach ($request->indikators as $indikator) {
                IndikatorKegiatan::create([
                    'kegiatan_id' => $kegiatan->id,
                    'indikator' => $indikator,
                ]);

                // Store aktivitas for 'Persiapan'
                foreach ($request->waktu_persiapan as $index => $waktu) {
                    Aktivitas::create([
                        'kegiatan_id' => $kegiatan->id,
                        'kategori' => 'Persiapan',  // Assign kategori directly
                        'waktu' => $waktu,
                        'penjelasan' => $request->penjelasan_persiapan[$index],
                    ]);
                }

                // Store aktivitas for 'Pelaksanaan'
                foreach ($request->waktu_pelaksanaan as $index => $waktu) {
                    Aktivitas::create([
                        'kegiatan_id' => $kegiatan->id,
                        'kategori' => 'Pelaksanaan',  // Assign kategori directly
                        'waktu' => $waktu,
                        'penjelasan' => $request->penjelasan_pelaksanaan[$index],
                    ]);
                }

                // Store aktivitas for 'Pelaporan'
                foreach ($request->waktu_pelaporan as $index => $waktu) {
                    Aktivitas::create([
                        'kegiatan_id' => $kegiatan->id,
                        'kategori' => 'Pelaporan',  // Assign kategori directly
                        'waktu' => $waktu,
                        'penjelasan' => $request->penjelasan_pelaporan[$index],
                    ]);
                }
            }

            return to_route('penyusunan.kegiatan.view')->with('success', 'Data telah ditambahkan.');
        } else {
            return to_route('penyusunan.kegiatan.view')->with('failed', 'Data gagal ditambahkan.');
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        $proker = ProgramKerja::all();

        $kegiatan->load('unit');

        return view('penyusunan.kegiatan.detail', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        $proker = ProgramKerja::all();

        return view('penyusunan.kegiatan.edit', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validateData = $request->validate([
            'nama_kegiatan' => [
                'string',
                'required',
                Rule::unique('kegiatans')->ignore($kegiatan->id),
            ],
            'total_biaya' => 'integer|required',
            'proker_id' => 'string|required|exists:program_kerjas,id',
        ]);

        $validateData['user_id'] = Auth::id();

        $user = Auth::user();

        $validateData['unit_id'] = $user->unit_id;

        $validateData['satuan_id'] = $user->unit->satuan_id;

        $kegiatan->update(['status' => 'Belum Diajukan']);

        $kegiatan->update($validateData);

        if ($kegiatan) {
            return to_route('penyusunan.kegiatan.view')->with('success', 'Data Telah Ditambahkan');
        } else {
            return to_route('penyusunan.kegiatan.view')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        if ($kegiatan) {
            return to_route('penyusunan.kegiatan.view')->with('success', 'Data Telah Dihapus');
        } else {
            return to_route('penyusunan.kegiatan.view')->with('failed', 'Data Gagal Dihapus');
        }
    }

    // Pengajuan Anggaran Tahunan

    public function pengajuanIndex()
    {
        $kegiatan = Kegiatan::all();

        //$kegiatan = Kegiatan::whereIn('status', ['Belum Diajukan'])->get();

        return view('pengajuan.anggaranTahunan.view', ['kegiatan' => $kegiatan]);
    }

    public function ajukan(Kegiatan $kegiatan)
    {
        $kegiatan->update(['status' => 'Telah Diajukan']);

        return redirect()->route('pengajuan.anggaranTahunan.view')->with('success', 'Status telah diubah menjadi "Telah Diajukan"');
    }

    public function konfirmasiPengajuan(Kegiatan $kegiatan)
    {
        $proker = ProgramKerja::all();

        $kegiatan->load('unit');

        return view('pengajuan.anggaranTahunan.detail', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }


    // Validasi Pengajuan by Atasan

    public function validasi_index()
    {
        $kegiatan = Kegiatan::whereIn('status', ['Telah Diajukan', 'Diterima'])->get();

        $proker = ProgramKerja::all();

        return view('validasi.validasiAnggaran.view', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    public function validasi_pengajuan_tahunan(Kegiatan $kegiatan)
    {
        $proker = ProgramKerja::all();

        $kegiatan->load('unit');

        return view('validasi.validasiAnggaran.validasi', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    public function acc_validasi_pengajuan_tahunan(Request $request, Kegiatan $kegiatan)
    {
        if ($request->input('action') == 'reject') {
            return redirect()->route('pesanPerbaikan.anggaranTahunan.create')->with('success', 'Pengajuan telah ditolak.');
        } elseif ($request->input('action') == 'accept') {
            $kegiatan->update(['status' => 'Diterima']);
            return redirect()->route('validasi.validasiAnggaran.view')->with('success', 'Pengajuan telah diterima.');
        }
    }

    // Pengajuan Pendanaan Kegiatan

    public function pendanaan_kegiatan_index()
    {
        $kegiatan = Kegiatan::whereIn('status', ['Diterima', 'Proses Pendanaan'])->get();

        $proker = ProgramKerja::all();

        return view('pengajuan.pendanaanKegiatan.view', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    public function konfirmasiPendanaan(Kegiatan $kegiatan)
    {
        $proker = ProgramKerja::all();

        $kegiatan->load('unit');

        return view('pengajuan.pendanaanKegiatan.detail', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    public function pendanaan(Kegiatan $kegiatan)
    {
        $kegiatan->update(['status' => 'Proses Pendanaan']);

        return redirect()->route('pengajuan.pendanaanKegiatan.view')->with('success', 'Status telah diubah menjadi "Telah Diajukan"');
    }

    // Proses Pendanaan
    public function give_pendanaan_index()
    {
        $kegiatan = Kegiatan::whereIn('status', ['Proses Pendanaan', 'Telah Didanai'])->get();

        $proker = ProgramKerja::all();

        $kegiatan->load(['unit', 'user']);

        return view('pendanaan.givePendanaan.view', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    public function give_konfirmasi_Pendanaan(Kegiatan $kegiatan)
    {
        $proker = ProgramKerja::all();

        $kegiatan->load('unit');

        return view('pendanaan.givePendanaan.detail', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }
}
