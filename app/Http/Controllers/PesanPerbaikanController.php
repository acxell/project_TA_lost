<?php

namespace App\Http\Controllers;

use App\Models\PesanPerbaikan;
use Illuminate\Http\Request;

class PesanPerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanPerbaikan = PesanPerbaikan::all();

        return view('pesanPerbaikan.view', ['pesanPerbaikan' => $pesanPerbaikan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PesanPerbaikan $pesanPerbaikan)
    {
        //
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
