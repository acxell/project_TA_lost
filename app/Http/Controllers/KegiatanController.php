<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\pengguna;
use App\Models\ProgramKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();

        return view('penganggaran.kegiatan.view', ['kegiatan' => $kegiatan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kegiatan = Kegiatan::all();
        $proker = ProgramKerja::all();

        return view('penganggaran.kegiatan.create', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_kegiatan' => 'string|required|unique:kegiatans',
            'total_biaya' => 'integer|required',
            'biaya_terbilang' => 'string|required',
            'proker_id' => 'string|required|exists:program_kerjas,id',
        ]);

        $validateData['user_id'] = Auth::id();

        $user = Auth::user();

        $validateData['unit_id'] = $user->unit_id;

        $kegiatan = Kegiatan::create($validateData);

        if ($kegiatan) {
            return to_route('penganggaran.kegiatan.view')->with('success', 'Data Telah Ditambahkan');
        } else {
            return to_route('penganggaran.kegiatan.view')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        $proker = ProgramKerja::all();

        $kegiatan->load('unit');

        return view('penganggaran.kegiatan.detail', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kegiatan $kegiatan)
    {
        $proker = ProgramKerja::all();

        return view('penganggaran.kegiatan.edit', ['kegiatan' => $kegiatan, 'proker' => $proker]);
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
            'biaya_terbilang' => 'string|required',
            'proker_id' => 'string|required|exists:program_kerjas,id',
        ]);

        $validateData['user_id'] = Auth::id();

        $user = Auth::user();

        $validateData['unit_id'] = $user->unit_id;

        $kegiatan->update(['status' => 'Belum Diajukan']);

        $kegiatan->update($validateData);

        if ($kegiatan) {
            return to_route('penganggaran.kegiatan.view')->with('success', 'Data Telah Ditambahkan');
        } else {
            return to_route('penganggaran.kegiatan.view')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();

        if ($kegiatan) {
            return to_route('penganggaran.kegiatan.view')->with('success', 'Data Telah Dihapus');
        } else {
            return to_route('penganggaran.kegiatan.view')->with('failed', 'Data Gagal Dihapus');
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

        return view('validasiAnggaran.view', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    public function validasi_pengajuan_tahunan(Kegiatan $kegiatan)
    {
        $proker = ProgramKerja::all();

        $kegiatan->load('unit');

        return view('validasiAnggaran.validasi', ['kegiatan' => $kegiatan, 'proker' => $proker]);
    }

    public function acc_validasi_pengajuan_tahunan(Request $request, Kegiatan $kegiatan)
    {
        if ($request->input('action') == 'reject') {
            return redirect()->route('pesanPerbaikan.create')->with('success', 'Pengajuan telah ditolak.');
        } elseif ($request->input('action') == 'accept') {
            $kegiatan->update(['status' => 'Diterima']);
            return redirect()->route('validasiAnggaran.view')->with('success', 'Pengajuan telah diterima.');
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
