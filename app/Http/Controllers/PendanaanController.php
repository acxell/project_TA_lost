<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pendanaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendanaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendanaan = Pendanaan::all();

        return view('pendanaan.dataPendanaan.view', ['pendanaan' => $pendanaan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($kegiatan_id)
    {
        $kegiatan = Kegiatan::findOrFail($kegiatan_id);

        return view('pendanaan.dataPendanaan.create', ['kegiatan' => $kegiatan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'bukti_transfer' => 'string|required',
            'besaran_transfer' => 'integer|required',
            'kegiatan_id' => 'string|required|exists:kegiatans,id',
        ]);

        $validateData['user_id'] = Auth::id();
        $validateData['unit_id'] = Auth::user()->unit_id;

        $pendanaan = Pendanaan::create($validateData);

        if ($pendanaan) {
            $kegiatan = Kegiatan::find($validateData['kegiatan_id']);

            $kegiatan->status = 'Telah Didanai';
            $kegiatan->save();

            return to_route('pendanaan.givePendanaan.view')->with('success', 'Pesan Perbaikan Telah Ditambahkan dan Kegiatan Ditolak');
        } else {
            return to_route('pendanaan.givePendanaan.view')->with('failed', 'Pesan Perbaikan Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendanaan $pendanaan)
    {
        return view('pendanaan.dataPendanaan.detail', ['pendanaan' => $pendanaan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendanaan $pendanaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendanaan $pendanaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendanaan $pendanaan)
    {
        //
    }
}
