<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\PesanPerbaikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanPerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($kegiatan_id)
    {
        $kegiatan = Kegiatan::findOrFail($kegiatan_id);

        return view('pesanPerbaikan.create', ['kegiatan' => $kegiatan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'pesan' => 'string|required',
            'kegiatan_id' => 'string|required|exists:kegiatans,id',
        ]);

        $validateData['user_id'] = Auth::id();
        $validateData['unit_id'] = Auth::user()->unit_id;

        $pesanPerbaikan = PesanPerbaikan::create($validateData);

        if ($pesanPerbaikan) {
            $kegiatan = Kegiatan::find($validateData['kegiatan_id']);

            $kegiatan->status = 'Ditolak';
            $kegiatan->save();

            return to_route('validasiAnggaran.view')->with('success', 'Pesan Perbaikan Telah Ditambahkan dan Kegiatan Ditolak');
        } else {
            return to_route('validasiAnggaran.view')->with('failed', 'Pesan Perbaikan Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($kegiatan_id)
    {
        $pesanPerbaikan = PesanPerbaikan::where('kegiatan_id', $kegiatan_id)->latest()->first();

        if (!$pesanPerbaikan) {
            return redirect()->route('validasiAnggaran.view')->with('error', 'Pesan Perbaikan tidak ditemukan.');
        }

        return view('pesanPerbaikan.detail', ['pesanPerbaikan' => $pesanPerbaikan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesanPerbaikan $pesanPerbaikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PesanPerbaikan $pesanPerbaikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesanPerbaikan $pesanPerbaikan)
    {
        //
    }
}
