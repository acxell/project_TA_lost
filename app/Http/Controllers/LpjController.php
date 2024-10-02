<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Lpj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LpjController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lpj = Lpj::all();

        return view('lpjKegiatan.view', ['lpj' => $lpj]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lpj = Lpj::all();
        $kegiatan = Kegiatan::where('status', 'Telah Didanai')->get();

        return view('lpjKegiatan.create', ['lpj' => $lpj, 'kegiatan' => $kegiatan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'penjelasan_kegiatan' => 'string|required',
            'jumlah_peserta_undangan' => 'integer|required',
            'jumlah_peserta_hadir' => 'integer|required',
            'kegiatan_id' => 'string|required|exists:kegiatans,id',
        ]);

        $validateData['user_id'] = Auth::id();

        $user = Auth::user();

        $validateData['unit_id'] = $user->unit_id;

        $kegiatan = Kegiatan::findOrFail($validateData['kegiatan_id']);
        $validateData['proker_id'] = $kegiatan->proker_id;

        $lpj = Lpj::create($validateData);

        if ($lpj) {
            return to_route('lpjKegiatan.view')->with('success', 'Data Telah Ditambahkan');
        } else {
            return to_route('lpjKegiatan.view')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lpj $lpj)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lpj $lpj)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lpj $lpj)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lpj $lpj)
    {
        //
    }
}
