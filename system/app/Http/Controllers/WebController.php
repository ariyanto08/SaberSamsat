<?php

namespace App\Http\Controllers;

use App\Models\DaftarNopol;
use App\Models\Pendaftaran;

class WebController extends Controller
{
    function index()
    {
        return view('beranda');
    }
    function daftar()
    {

        $daftar = new Pendaftaran();
        $daftar->daftar_nama = request('daftar_nama');
        $daftar->daftar_nik = request('daftar_nik');
        $daftar->daftar_wa = request('daftar_wa');
        $daftar->daftar_alamat = request('daftar_alamat');
        $daftar->daftar_kecamatan = request('daftar_kecamatan');
        $daftar->save();

        $daftarId = $daftar->daftar_id;
        // dd($daftarId);

        $nopol = new DaftarNopol();
        $nopol->nopol_daftar = $daftarId;
        $nopol->nopol_tengah = request('tengah');
        $nopol->nopol_belakang = request('belakang');
        $nopol->save();

        return redirect()->route('detail-daftar');
    }
    function detail(Pendaftaran $daftar)
    {
        $data['daftar'] = $daftar;
        $data['nopol'] = DaftarNopol::where('nopol_daftar',$daftar->daftar_id)->first();
        return view('detail-daftar',$data);
    }
}
