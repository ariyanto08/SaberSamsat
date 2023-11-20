<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use App\Models\Layanan;
use App\Models\ApiNopol;
use App\Models\Kecamatan;
use App\Models\DaftarNopol;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    function index()
    {
        $data['kecamatan'] = Kecamatan::all();
        $data['layanan_count'] = Layanan::where('layanan_status', 1)->count();
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

        return redirect('/');
    }

    function daftar(Request $request)
    {
        Validator::extend('exists_in_api_nopol', function ($attribute, $value, $parameters, $validator) {
            // Parameters akan berisi data untuk nopol_tengah dan nopol_belakang
            [$nopolTengah, $nopolBelakang] = $parameters;

            // Proses logika untuk memeriksa keberadaan di model ApiNopol
            $existsInApiNopol = ApiNopol::where('nopol_tengah', $nopolTengah)
                ->where('nopol_belakang', $nopolBelakang)
                ->exists();

            return $existsInApiNopol;
        });

        $validator = Validator::make($request->all(), [
            'daftar_nama' => 'required',
            'daftar_nik' => 'required',
            'daftar_wa' => 'required',
            'daftar_alamat' => 'required',
            'daftar_kecamatan' => 'required',
            'daftar_lokasi' => 'required',
            'nopol_tengah.*' => [
                'required',
                Rule::exists('saber_api_daftar_nopol', 'nopol_tengah')->where(function ($query) use ($request) {
                    $query->whereIn('nopol_tengah', $request->nopol_tengah);
                }),
            ],
            'nopol_belakang.*' => [
                'required',
                Rule::exists('saber_api_daftar_nopol', 'nopol_belakang')->where(function ($query) use ($request) {
                    $query->whereIn('nopol_belakang', $request->nopol_belakang);
                }),
            ],
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Nopol tidak terdaftar')->withInput();
        }

        // Validation passed, continue with saving the data
        $daftar = new Pendaftaran;
        $daftar->daftar_nama = request('daftar_nama');
        $daftar->daftar_nik = request('daftar_nik');
        $daftar->daftar_wa = request('daftar_wa');
        $daftar->daftar_alamat = request('daftar_alamat');
        $daftar->daftar_kecamatan = request('daftar_kecamatan');
        $daftar->daftar_lokasi = request('daftar_lokasi');
        $daftar->save();

        $daftarId = $daftar->daftar_id;

        for ($i = 0; $i < count($request->nopol_tengah); $i++) {
            // Check if the combination of nopol_tengah and nopol_belakang exists
            $nopolExists = ApiNopol::where('nopol_tengah', $request->nopol_tengah[$i])
                ->where('nopol_belakang', $request->nopol_belakang[$i])
                ->first();

            if (!$nopolExists) {
                // If nopol_tengah and nopol_belakang do not exist, show an error message and redirect back
                return redirect()->back()->with('error', 'Nopol ' . $request->nopol_tengah[$i] . ' ' . $request->nopol_belakang[$i] . ' tidak terdaftar')->withInput();
            }

            // Retrieve additional data from the existing nopol record
            $nopolJenis = $nopolExists->nopol_jenis;
            $nopolMerk = $nopolExists->nopol_merk;
            $nopolType = $nopolExists->nopol_type;
            $nopolTahun = $nopolExists->nopol_tahun;
            $nopolCc = $nopolExists->nopol_cc;
            $nopolPlat = $nopolExists->nopol_plat;
            $nopolBbm = $nopolExists->nopol_bbm;
            $nopolPkbPokok = $nopolExists->nopol_pkb_pokok;
            $nopolPkbDenda = $nopolExists->nopol_pkb_denda;
            $nopolSwdPokok = $nopolExists->nopol_swdkllj_pokok;
            $nopolSwdDenda = $nopolExists->nopol_swdkllj_denda;
            $nopolTotalDenda = $nopolExists->nopol_total_denda;
            $nopolTotalPokok = $nopolExists->nopol_total_pokok;
            $nopolGrandtotal = $nopolExists->nopol_grandtotal;

            // Save the nopol data
            $nopol = new DaftarNopol;
            $nopol->nopol_daftar = $daftarId;
            $nopol->nopol_tengah = $request->nopol_tengah[$i];
            $nopol->nopol_belakang = $request->nopol_belakang[$i];
            $nopol->nopol_jenis = $nopolJenis;
            $nopol->nopol_merk = $nopolMerk;
            $nopol->nopol_type = $nopolType;
            $nopol->nopol_tahun = $nopolTahun;
            $nopol->nopol_cc = $nopolCc;
            $nopol->nopol_plat = $nopolPlat;
            $nopol->nopol_bbm = $nopolBbm;
            $nopol->nopol_pkb_pokok = $nopolPkbPokok;
            $nopol->nopol_pkb_denda = $nopolPkbDenda;
            $nopol->nopol_swdkllj_pokok = $nopolSwdPokok;
            $nopol->nopol_swdkllj_denda = $nopolSwdDenda;
            $nopol->nopol_total_pokok = $nopolTotalPokok;
            $nopol->nopol_total_denda = $nopolTotalDenda;
            $nopol->nopol_grandtotal = $nopolGrandtotal;
            $nopol->save();
        }
        return redirect('daftar-berhasil/' . $daftarId);
    }
    function detail(Pendaftaran $daftar)
    {
        $currentKecamatanId = $daftar->kecamatan->kecamatan_id;
        $kecamatan = Kecamatan::withCount('daftar')->get();
        $sortedKecamatan = $kecamatan->sortByDesc('daftar_count');
        $data['urutan_daftar'] = $sortedKecamatan->search(function ($kecamatan) use ($currentKecamatanId) {
            return $kecamatan->kecamatan_id == $currentKecamatanId;
        }) + 1;
        $data['daftar'] = $daftar;
        $data['list_nopol'] = DaftarNopol::where('nopol_daftar', $daftar->daftar_id)->get();
        return view('daftar-berhasil', $data);
    }
}
