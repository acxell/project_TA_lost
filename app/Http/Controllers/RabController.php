<?php

namespace App\Http\Controllers;

use App\Models\rab;
use App\Models\Tor;
use Illuminate\Http\Request;

class RabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rab = rab::all();

        return view('anggaranTahunan.rab.view', ['rab' => $rab]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rab = rab::all();
        $tor = Tor::all();

        return view('anggaranTahunan.rab.create', ['rab' => $rab, 'tor' => $tor]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_kegiatan' => 'string|required|unique:rabs',
            'total_biaya' => 'integer|required',
            'biaya_terbilang' => 'string|required',
            'tor_id' => 'string|required|exists:tors,id',
            'status' => 'string|required',
        ]);

        $rab = rab::create($validateData);

        if ($rab) {
            return to_route('anggaranTahunan.rab.view')->with('success', 'Data Telah Ditambahkan');
        } else {
            return to_route('anggaranTahunan.rab.view')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(rab $rab)
    {
        $tor = Tor::all();

        return view('anggaranTahunan.rab.detail', ['rab' => $rab, 'tor' => $tor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rab $rab)
    {
        $tor = Tor::all();

        return view('anggaranTahunan.rab.edit', ['rab' => $rab, 'tor' => $tor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rab $rab)
    {
        $validateData = $request->validate([
            'nama_kegiatan' => 'string|required|unique:rabs',
            'total_biaya' => 'integer|required',
            'biaya_terbilang' => 'string|required',
            'tor_id' => 'string|required|exists:tors,id',
            'status' => 'string|required',
        ]);

        $rab->update($validateData);

        if ($rab) {
            return to_route('anggaranTahunan.rab.view')->with('success', 'Data Telah Ditambahkan');
        } else {
            return to_route('anggaranTahunan.rab.view')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(rab $rab)
    {
        $rab->delete();

        if ($rab) {
            return to_route('anggaranTahunan.rab.view')->with('success', 'Data Telah Dihapus');
        } else {
            return to_route('anggaranTahunan.rab.view')->with('failed', 'Data Gagal Dihapus');
        }
    }
}
