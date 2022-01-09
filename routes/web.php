<?php

use App\Http\Controllers\BencanaController;
use App\Http\Controllers\KategoriBencanaController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\PelaporanController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\KategoriBencana;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('user', UserController::class);
Route::resource('provinsi', ProvinsiController::class);
Route::resource('kota', KotaController::class);
Route::resource('kecamatan', KecamatanController::class);
Route::resource('kategori', KategoriBencanaController::class);
Route::resource('bencana', BencanaController::class);
Route::resource('pelaporan', PelaporanController::class);
Route::resource('role', RoleController::class);
Route::get('/pelaporan/validasi/{id}', [PelaporanController::class, 'validasi'])->name('pelaporan.verifikasi');
Route::post('/pelaporan/addKorban', [PelaporanController::class, 'addKorban'])->name('pelaporan.addKorban');
Route::get('/pelaporan/{id}/deleteKorban', [PelaporanController::class, 'deleteKorban'])->name('pelaporan.deleteKorban');