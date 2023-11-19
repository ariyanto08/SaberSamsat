<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Layanan;
use App\Models\Kecamatan;
use App\Models\DaftarNopol;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    function index()
    {
        $data['kecamatan'] = Kecamatan::all();
        $data['layanan_count'] = Layanan::where('layanan_status',1)->count();
        $data['layanan'] = Layanan::where('layanan_status', 1)->count();
        $data['list_kecamatan'] = Kecamatan::with('layanan')->whereHas('layanan', function ($query) {
            $query->where('layanan_status', 0);
        })->with('jadwal')
        ->with('lokasi')->get();
        // dd($data['list_kecamatan']);
        return view('beranda', $data);
    }

    function kontak(Request $request)
    {
        $kontak = new Kontak;
        $kontak->kontak_nama = request('kontak_nama');
        $kontak->kontak_email = request('kontak_email');
        $kontak->kontak_judul = request('kontak_judul');
        $kontak->kontak_pesan = request('kontak_pesan');
        $kontak->save();

        return redirect('beranda');
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
        $data['list_nopol'] = DaftarNopol::where('nopol_daftar', $daftar->daftar_id)->get();
        return view('daftar-berhasil', $data);
    }
}
