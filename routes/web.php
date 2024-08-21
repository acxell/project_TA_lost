<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\penggunaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [loginController::class, 'getView'])->name('master.login');

Route::get('/dashboard', [dashboardController::class, 'getView'])->name('dashboard.dashboard');

//Actions Manajemen Data Pengguna
Route::get('/data-pengguna', [penggunaController::class, 'index'])->name('pengguna.view');
Route::get('/pengguna/{pengguna}/detail', [penggunaController::class, 'show'])->name('pengguna.detail');
Route::get('/create-data-pengguna', [penggunaController::class, 'create'])->name('pengguna.create');
Route::post('/pengguna', [penggunaController::class, 'store'])->name('pengguna.store');
Route::get('/pengguna/{pengguna}/edit', [penggunaController::class, 'edit'])->name('pengguna.edit');
Route::post('/pengguna/{pengguna}/update', [penggunaController::class, 'update'])->name('pengguna.update');
Route::delete('/pengguna/{pengguna}', [penggunaController::class, 'destroy'])->name('pengguna.destroy');