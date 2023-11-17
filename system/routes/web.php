<?php


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
Route::post('/',[WebController::class,'daftar']);
Route::get('daftar-berhasil/{daftar}',[WebController::class,'detail']);

Route::prefix('mimin')->group(function () {
   Route::get('beranda', [MiminController::class, 'beranda']);
   Route::get('permohonan', [MiminController::class, 'permohonan']);
   Route::get('permohonan-detail/{daftar}', [MiminController::class, 'permohonanDetail']);
   Route::get('permohonan-proses/{daftar}', [MiminController::class, 'permohonanProses']);
   Route::post('permohonan-proses', [MiminController::class, 'simpanPermohonan']);
   Route::get('pelayanan', [MiminController::class, 'pelayanan']);
   Route::get('pelayanan-detail', [MiminController::class, 'pelayananDetail']);
   Route::get('pengaturan', [MiminController::class, 'pengaturan']);
   Route::post('tambah-kecamatan', [MiminController::class, 'tambahKecamatan']);
   Route::get('pengaturan-lokasi/{kecamatan}', [MiminController::class, 'pengaturanLokasi']);
   Route::post('tambah-lokasi/{kecamatan}', [MiminController::class, 'tambahLokasi']);
});
