<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\MiminController;
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

Route::get('/',[WebController::class,'index']);
Route::post('detail-pendaftaran',[WebController::class,'cari_id']);
Route::post('kontak',[WebController::class,'kontak']);
Route::post('daftar-berhasil',[WebController::class,'daftar']);
Route::get('daftar-berhasil/{daftar}',[WebController::class,'detail']);

//login
Route::get('mimin/login',[AuthController::class,'showLogin'])->name('login');
Route::post('mimin/login',[AuthController::class,'prosesLogin']);
Route::get('logout',[AuthController::class,'logout']);


Route::prefix('mimin')->middleware('auth')->group(function () {
   Route::get('beranda', [MiminController::class, 'beranda']);
   Route::get('permohonan', [MiminController::class, 'permohonan']);
   Route::get('permohonan-detail/{kecamatan}', [MiminController::class, 'permohonanDetail']);
   Route::get('permohonan-proses/{kecamatan}', [MiminController::class, 'permohonanProses']);
   Route::post('permohonan-proses', [MiminController::class, 'prosesPermohonan']);
   Route::get('pelayanan', [MiminController::class, 'pelayanan']);
   Route::get('pelayanan-detail/{kecamatan}', [MiminController::class, 'pelayananDetail']);
   Route::post('pelayanan-detail/{layanan}', [MiminController::class, 'update']);
   Route::get('pengaturan', [MiminController::class, 'pengaturan']);
   Route::put('pengaturan/{kecamatan}', [MiminController::class, 'editKecamatan']);
   Route::post('tambah-kecamatan', [MiminController::class, 'tambahKecamatan']);
   Route::get('pengaturan-lokasi/{kecamatan}', [MiminController::class, 'pengaturanLokasi']);
   Route::post('tambah-lokasi/{kecamatan}', [MiminController::class, 'tambahLokasi']);
   Route::get('pesan',[MiminController::class,'pesan']);
   Route::post('pesan/{kontak}',[MiminController::class,'aksiPesan']);
});
