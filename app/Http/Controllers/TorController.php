<?php

namespace App\Http\Controllers;

use App\Models\tor;
use App\Models\Tor as ModelsTor;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tor = ModelsTor::all();
        
        return view('anggaranTahunan.tor.view', ['tor' => $tor]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tor = ModelsTor::all();
        $units = Unit::all();

        return view('anggaranTahunan.tor.create', ['tor' => $tor, 'units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_proker' => 'string|required|unique:tors',
            'satuan_kerja' => 'string|required',
            'pic' => 'string|required',
            'unit_id' => 'string|required|exists:units,id',
            'status' => 'string|required',
        ]);

        $tor = tor::create($validateData);

        if ($tor) {
            return to_route('anggaranTahunan.tor.view')->with('success', 'Data Telah Ditambahkan');
        } else {
            return to_route('anggaranTahunan.tor.view')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(tor $tor)
    {
        $units = Unit::all();

        return view('anggaranTahunan.tor.detail', ['tor' => $tor, 'units' => $units]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tor $tor)
    {
        $units = Unit::all();

        return view('anggaranTahunan.tor.edit', ['tor' => $tor, 'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tor $tor)
    {
        $validateData = $request->validate([
            'nama_proker' => 'string|required|unique:tors',
            'satuan_kerja' => 'string|required',
            'pic' => 'string|required',
            'unit_id' => 'string|required|exists:units,id',
            'status' => 'string|required',
        ]);

        $tor->update($validateData);

        if ($tor) {
            return to_route('anggaranTahunan.tor.view')->with('success', 'Data Telah Ditambahkan');
        } else {
            return to_route('anggaranTahunan.tor.view')->with('failed', 'Data Gagal Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tor $tor)
    {
        $tor->delete();

        if ($tor) {
            return to_route('anggaranTahunan.tor.view')->with('success', 'Data Telah Dihapus');
        } else {
            return to_route('anggaranTahunan.tor.view')->with('failed', 'Data Gagal Dihapus');
        }
    }
}
