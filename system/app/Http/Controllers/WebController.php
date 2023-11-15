<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;

class WebController extends Controller
{
    function daftar(){
        $daftar = new Pendaftaran();
        $daftar->daftar_nama = request('daftar_nama');
        $daftar->daftar_nik = request('daftar_nik');
        $daftar->daftar_wa = request('daftar_wa');
        $daftar->daftar_alamat = request('daftar_alamat');
        $daftar->daftar_kecamatan = request('daftar_kecamatan');

        return redirect('detail-daftar');
    }
}
