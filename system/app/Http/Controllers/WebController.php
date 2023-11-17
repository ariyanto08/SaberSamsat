<?php

namespace App\Http\Controllers;

use App\Models\Kecamatan;
use App\Models\DaftarNopol;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class WebController extends Controller
{
    function index()
    {
        $data['kecamatan'] = Kecamatan::all();
        return view('beranda', $data);
    }

    function daftar(Request $request)
    {
        $daftar = new Pendaftaran;
        $daftar->daftar_nama = request('daftar_nama');
        $daftar->daftar_nik = request('daftar_nik');
        $daftar->daftar_wa = request('daftar_wa');
        $daftar->daftar_alamat = request('daftar_alamat');
        $daftar->daftar_kecamatan = request('daftar_kecamatan');
        $daftar->daftar_lokasi = request('daftar_lokasi');
        $daftar->save();

        $daftarId = $daftar->daftar_id;
        // dd($daftarId);

        for ($i = 0; $i < count($request->nopol_tengah); $i++) {
            $nopol = new DaftarNopol;
            $nopol->nopol_daftar = $daftarId;
            $nopol->nopol_tengah = $request->nopol_tengah[$i];
            $nopol->nopol_belakang = $request->nopol_belakang[$i];
            $nopol->save();
        }
        return redirect('daftar-berhasil/' . $daftarId);
    }
    function detail(Pendaftaran $daftar)
    {
        $data['daftar'] = $daftar;
        $data['nopol'] = DaftarNopol::where('nopol_daftar', $daftar->daftar_id)->first();
        return view('daftar-berhasil', $data);
    }
}
