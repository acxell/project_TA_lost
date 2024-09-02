<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\pengguna;

class penggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = DB::table('penggunas')->get();

        return view('pengguna.view',['penggunas' => $pengguna]);

        //return view('pengguna.viewPengguna');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pengguna = DB::table('penggunas')->get();

        return view('pengguna.create',['penggunas' => $pengguna]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
        'nama' => 'string|required',
        'email' => 'string|required|unique:penggunas',
        'password' => 'string|required|min:10',
        'status' => 'integer|required',
        'nomor_rekening' => 'string|required',
        'role' => 'string|required',
        'unit_id' => 'integer|required',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        $pengguna = pengguna::create($validateData);

        if ($pengguna) {
            return to_route('pengguna.view')->with('success', 'Data Telah Ditambahkan');
        }
        else {
            return to_route('pengguna.view')->with('failed', 'Data Gagal Ditambahkan');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengguna $pengguna)
    {
        //
        return view('pengguna.detail', ['pengguna' => $pengguna]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengguna $pengguna)
    {
        //$pengguna = DB::table('penggunas')->get();

        return view('pengguna.edit',['pengguna' => $pengguna]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        $validateData = $request->validate([
            'id' . $pengguna->id,
            'nama' => 'string|required',
            'email' => 'string|required',
            'password' => 'string|required|min:10',
            'status' => 'integer|required',
            'nomor_rekening' => 'string|required',
            'role' => 'string|required',
            'unit_id' => 'integer|required',
            ]);

            $validateData['password'] = Hash::make($validateData['password']);
    
            $pengguna->update($validateData);
    
            if ($pengguna) {
                return to_route('pengguna.view')->with('success', 'Data Berhasil Diubah');
            }
            else {
                return to_route('pengguna.view')->with('failed', 'Data Gagal Diubah');
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
    
            if ($pengguna) {
                return to_route('pengguna.view')->with('success', 'Data Telah Dihapus');
            }
            else {
                return to_route('pengguna.view')->with('failed', 'Data Gagal Dihapus');
            }
    }
}
