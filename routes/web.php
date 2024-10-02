<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\LpjController;
use App\Http\Controllers\PendanaanController;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PesanPerbaikanController;
use App\Http\Controllers\ProgramKerjaController;
use App\Http\Controllers\RabController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TorController;
use App\Http\Controllers\UnitController;
use App\Models\Kegiatan;
use App\Models\Pendanaan;
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

//Actions Validasi Pengajuan Anggaran Tahunan
Route::get('/data-pengajuan-kegiatan', [KegiatanController::class, 'pengajuanIndex'])->name('pengajuan.anggaranTahunan.view');
Route::get('/data-pengajuan/{kegiatan}/detail', [KegiatanController::class, 'konfirmasiPengajuan'])->name('pengajuan.anggaranTahunan.detail');
Route::post('/data-pengajuan/{kegiatan}/ajukan', [KegiatanController::class, 'ajukan'])->name('pengajuan.anggaranTahunan.ajukan');

Route::get('/data-pengajuan-anggaran-tahunan', [KegiatanController::class, 'validasi_index'])->name('validasiAnggaran.view');
Route::get('/pengajuan-anggaran-tahunan/{kegiatan}/validasi-pengajuan', [KegiatanController::class, 'validasi_pengajuan_tahunan'])->name('validasiAnggaran.validasi');
Route::post('/pengajuan-anggaran-tahunan/{kegiatan}/acc-validasi', [KegiatanController::class, 'acc_validasi_pengajuan_tahunan'])->name('validasiAnggaran.acc');

//Actions Pesan Perbaikan
Route::get('/buat-pesan-perbaikan/{kegiatan_id}', [PesanPerbaikanController::class, 'create'])->name('pesanPerbaikan.create');
Route::post('/pesan-perbaikan', [PesanPerbaikanController::class, 'store'])->name('pesanPerbaikan.store');
Route::get('/pesan-perbaikan/{kegiatan_id}', [PesanPerbaikanController::class, 'show'])->name('pesanPerbaikan.view');

//Actions Pendanaan
Route::get('/data-pengajuan-pendanaan-kegiatan', [KegiatanController::class, 'pendanaan_kegiatan_index'])->name('pengajuan.pendanaanKegiatan.view');
Route::get('/data-pengajuan/{kegiatan}/pendanaan-kegiatan', [KegiatanController::class, 'konfirmasiPendanaan'])->name('pengajuan.pendanaanKegiatan.detail');
Route::post('/data-pengajuan/{kegiatan}/ajukan-pendanaan-kegiatan', [KegiatanController::class, 'pendanaan'])->name('pengajuan.pendanaanKegiatan.ajukan');

//Actions Didanai
Route::get('/data-pendanaan-kegiatan', [KegiatanController::class, 'give_pendanaan_index'])->name('pendanaan.givePendanaan.view');
Route::get('/data/{kegiatan}/pendanaan-kegiatan', [KegiatanController::class, 'give_konfirmasi_pendanaan'])->name('pendanaan.givePendanaan.detail');
Route::post('/data/{kegiatan}/berikan-pendanaan-kegiatan', [KegiatanController::class, 'give_pendanaan'])->name('pendanaan.givePendanaan.berikan');

//Actions Data Pendanaan
Route::get('/data-pendanaan', [PendanaanController::class, 'index'])->name('pendanaan.dataPendanaan.view');
Route::get('/create-data-pendanaan/{kegiatan_id}', [PendanaanController::class, 'create'])->name('pendanaan.dataPendanaan.create');
Route::post('/store-data-pendanaan', [PendanaanController::class, 'store'])->name('pendanaan.dataPendanaan.store');
Route::get('/data-pendanaan/{pendanaan}/detail', [PendanaanController::class, 'show'])->name('pendanaan.dataPendanaan.detail');

//Actions Data LPJ
Route::get('/data-lpj', [LpjController::class, 'index'])->name('lpjKegiatan.view');
Route::get('/create-data-lpj', [LpjController::class, 'create'])->name('lpjKegiatan.create');
Route::get('/lpj/{lpj}/detail', [LpjController::class, 'show'])->name('lpjKegiatan.detail');
Route::post('/lpj', [LpjController::class, 'store'])->name('lpjKegiatan.store');
Route::get('/lpj/{lpj}/edit', [LpjController::class, 'edit'])->name('lpjKegiatan.edit');
Route::post('/lpj/{lpj}/update', [LpjController::class, 'update'])->name('lpjKegiatan.update');
Route::delete('/lpj/{lpj}', [LpjController::class, 'destroy'])->name('lpjKegiatan.destroy');

});