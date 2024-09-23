<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PesanPerbaikanController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\RabController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TorController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [loginController::class, 'getView'])->name('login');
Route::post('/login', [loginController::class, 'login'])->name('login.store');


Route::group(['middleware' => 'auth'], function() {

Route::post('/logout', [loginController::class, 'logout'])->name('logout');

//Route::get('/dashboard', [dashboardController::class, 'getView'])->name('dashboard')->middleware('auth');

Route::get('/dashboard', [dashboardController::class, 'getView'])->name('dashboard');

//Actions Manajemen Data Pengguna
Route::get('/data-pengguna', [penggunaController::class, 'index'])->name('pengguna.view');
Route::get('/pengguna/{pengguna}/detail', [penggunaController::class, 'show'])->name('pengguna.detail');
Route::get('/create-data-pengguna', [penggunaController::class, 'create'])->name('pengguna.create');
Route::post('/pengguna', [penggunaController::class, 'store'])->name('pengguna.store');
Route::get('/pengguna/{pengguna}/edit', [penggunaController::class, 'edit'])->name('pengguna.edit');
Route::post('/pengguna/{pengguna}/update', [penggunaController::class, 'update'])->name('pengguna.update');
Route::delete('/pengguna/{pengguna}', [penggunaController::class, 'destroy'])->name('pengguna.destroy');

//Actions Manajemen Data Permission Pengguna
Route::get('/data-permission', [permissionController::class, 'index'])->name('permission.view');
Route::get('/create-data-permission', [permissionController::class, 'create'])->name('permission.create');
Route::post('/permission', [permissionController::class, 'store'])->name('permission.store');
Route::get('/permission/{permission}/edit', [permissionController::class, 'edit'])->name('permission.edit');
Route::post('/permission/{permission}/update', [permissionController::class, 'update'])->name('permission.update');
Route::delete('/permission/{permission}', [permissionController::class, 'destroy'])->name('permission.destroy');

//Actions Manajemen Data Role Pengguna
Route::get('/data-role', [RoleController::class, 'index'])->name('role.view');
Route::get('/create-data-role', [RoleController::class, 'create'])->name('role.create');
Route::post('/role', [RoleController::class, 'store'])->name('role.store');
Route::get('/role/{role}/edit', [RoleController::class, 'edit'])->name('role.edit');
Route::post('/role/{role}/update', [RoleController::class, 'update'])->name('role.update');
Route::delete('/role/{role}', [RoleController::class, 'destroy'])->name('role.destroy');

//Actions Role Permissions Pengguna
Route::get('/role/{role}/give-permission', [RoleController::class, 'addPermissionToRole'])->name('addRolePermission.create');
Route::post('/role/{role}/store-permission', [RoleController::class, 'storePermissionToRole'])->name('addRolePermission.store');

//Actions Manajemen Data Unit
Route::get('/data-unit', [UnitController::class, 'index'])->name('unit.view');
Route::get('/create-data-unit', [UnitController::class, 'create'])->name('unit.create');
Route::get('/unit/{unit}/detail', [UnitController::class, 'show'])->name('unit.detail');
Route::post('/unit', [UnitController::class, 'store'])->name('unit.store');
Route::get('/unit/{unit}/edit', [UnitController::class, 'edit'])->name('unit.edit');
Route::post('/unit/{unit}/update', [UnitController::class, 'update'])->name('unit.update');
Route::delete('/unit/{unit}', [UnitController::class, 'destroy'])->name('unit.destroy');

//Actions Manajemen Data Program Kerja
Route::get('/data-program-kerja', [ProgramKerjaController::class, 'index'])->name('penganggaran.programKerja.view');
Route::get('/create-data-program-kerja', [ProgramKerjaController::class, 'create'])->name('penganggaran.programKerja.create');
Route::get('/program-kerja/{programKerja}/detail', [ProgramKerjaController::class, 'show'])->name('penganggaran.programKerja.detail');
Route::post('/program-kerja', [ProgramKerjaController::class, 'store'])->name('penganggaran.programKerja.store');
Route::get('/program-kerja/{programKerja}/edit', [ProgramKerjaController::class, 'edit'])->name('penganggaran.programKerja.edit');
Route::post('/program-kerja/{programKerja}/update', [ProgramKerjaController::class, 'update'])->name('penganggaran.programKerja.update');
Route::delete('/program-kerja/{programKerja}', [ProgramKerjaController::class, 'destroy'])->name('penganggaran.programKerja.destroy');

//Actions Manajemen Data Kegiatan
Route::get('/data-kegiatan', [KegiatanController::class, 'index'])->name('penganggaran.kegiatan.view');
Route::get('/create-data-kegiatan', [KegiatanController::class, 'create'])->name('penganggaran.kegiatan.create');
Route::get('/kegiatan/{kegiatan}/detail', [KegiatanController::class, 'show'])->name('penganggaran.kegiatan.detail');
Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('penganggaran.kegiatan.store');
Route::get('/kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('penganggaran.kegiatan.edit');
Route::post('/kegiatan/{kegiatan}/update', [KegiatanController::class, 'update'])->name('penganggaran.kegiatan.update');
Route::delete('/kegiatan/{kegiatan}', [KegiatanController::class, 'destroy'])->name('penganggaran.kegiatan.destroy');
Route::post('/kegiatan/{kegiatan}/pengajuan', [KegiatanController::class, 'pengajuan'])->name('penganggaran.kegiatan.pengajuan');

//Actions Manajemen Data Tor
Route::get('/data-tor', [TorController::class, 'index'])->name('anggaranTahunan.tor.view');
Route::get('/create-data-tor', [TorController::class, 'create'])->name('anggaranTahunan.tor.create');
Route::get('/tor/{tor}/detail', [TorController::class, 'show'])->name('anggaranTahunan.tor.detail');
Route::post('/tor', [TorController::class, 'store'])->name('anggaranTahunan.tor.store');
Route::get('/tor/{tor}/edit', [TorController::class, 'edit'])->name('anggaranTahunan.tor.edit');
Route::post('/tor/{tor}/update', [TorController::class, 'update'])->name('anggaranTahunan.tor.update');
Route::delete('/tor/{tor}', [TorController::class, 'destroy'])->name('anggaranTahunan.tor.destroy');

//Actions Manajemen Data Rab
Route::get('/data-rab', [RabController::class, 'index'])->name('anggaranTahunan.rab.view');
Route::get('/create-data-rab', [RabController::class, 'create'])->name('anggaranTahunan.rab.create');
Route::get('/rab/{rab}/detail', [RabController::class, 'show'])->name('anggaranTahunan.rab.detail');
Route::post('/rab', [RabController::class, 'store'])->name('anggaranTahunan.rab.store');
Route::get('/rab/{rab}/edit', [RabController::class, 'edit'])->name('anggaranTahunan.rab.edit');
Route::post('/rab/{rab}/update', [RabController::class, 'update'])->name('anggaranTahunan.rab.update');
Route::delete('/rab/{rab}', [RabController::class, 'destroy'])->name('anggaranTahunan.rab.destroy');
Route::post('/rab/{rab}/pengajuan', [RabController::class, 'pengajuan'])->name('anggaranTahunan.rab.pengajuan');

//Actions Validasi Pengajuan Anggaran
Route::get('/data-pengajuan-anggaran', [RabController::class, 'validasi_index'])->name('validasiAnggaran.view');
Route::get('/rab/{rab}/validasi-pengajuan', [RabController::class, 'validasi_pengajuan_tahunan'])->name('validasiAnggaran.validasi');
Route::post('/rab/{rab}/acc-validasi', [RabController::class, 'acc_validasi_pengajuan_tahunan'])->name('validasiAnggaran.acc');

//Actions Pesan Perbaikan
Route::get('/pesan-perbaikan', [PesanPerbaikanController::class, 'index'])->name('pesanPerbaikan.view');

});