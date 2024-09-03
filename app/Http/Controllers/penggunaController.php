<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

use App\Models\pengguna;

class penggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengguna = pengguna::all();

        return view('pengguna.view',['penggunas' => $pengguna]);

        //return view('pengguna.viewPengguna');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$pengguna = DB::table('penggunas')->get();
        $roles = Role::pluck('name', 'name')->all();

        return view('pengguna.create',['roles' => $roles]);
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
        'roles' => 'required',
        'unit_id' => 'integer|required',
        ]);

        $validateData['password'] = Hash::make($validateData['password']);

        $pengguna = pengguna::create($validateData);

        $pengguna->assignRole($request->input('roles'));

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
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $pengguna->roles->pluck('name','name')->all();

        return view('pengguna.edit',['pengguna' => $pengguna, 'roles' => $roles, 'userRoles' => $userRoles]);
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
            'roles' => 'required',
            'unit_id' => 'integer|required',
            ]);

            $validateData['password'] = Hash::make($validateData['password']);
    
            $pengguna->update($validateData);

            $pengguna->assignRole($request->input('roles'));
    
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
