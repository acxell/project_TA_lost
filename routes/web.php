<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\penggunaController;
use App\Http\Controllers\PermissionController;
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



Route::get('/', [loginController::class, 'getView'])->name('login')->middleware('guest');
Route::post('/login', [loginController::class, 'login'])->name('login.store');
Route::post('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [dashboardController::class, 'getView'])->name('dashboard')->middleware('auth');

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

//Actions Manajemen Data Unit
Route::get('/data-unit', [UnitController::class, 'index'])->name('unit.view');
Route::get('/create-data-unit', [UnitController::class, 'create'])->name('unit.create');
Route::get('/unit/{unit}/detail', [UnitController::class, 'show'])->name('unit.detail');
Route::post('/unit', [UnitController::class, 'store'])->name('unit.store');
Route::get('/unit/{unit}/edit', [UnitController::class, 'edit'])->name('unit.edit');
Route::post('/unit/{unit}/update', [UnitController::class, 'update'])->name('unit.update');
Route::delete('/unit/{unit}', [UnitController::class, 'destroy'])->name('unit.destroy');