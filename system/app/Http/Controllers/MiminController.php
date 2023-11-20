<?php

namespace App\Http\Controllers;

use App\Models\DaftarNopol;
use App\Models\Jadwal;
use App\Models\Kecamatan;
use App\Models\Layanan;
use App\Models\Lokasi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kontak;

class MiminController extends Controller
{
    function beranda()
    {
        // $data['mobil_count'] = Layanan::withCount(['nopol' =>function($query){
        //     $query->where('nopol_jenis','Roda 4')->get();
        // }]);
        // dd($data['mobil_count']);
        $data['layanan_count'] = Layanan::where('layanan_status',1)->count();
        $data['antrian_layanan_count'] = Layanan::where('layanan_status',0)->count();
        return view('mimin.beranda',$data);
    }

    function permohonan()
    {
        $data['list_kecamatan'] = Kecamatan::withCount(['daftar' => function ($query) {
            $query->where('daftar_status', 0);
        }])->with('lokasi')->whereHas('daftar', function ($query) {
            $query->where('daftar_status', 0);
        })->get();

        return view('mimin.permohonan', $data);
    }

    function permohonanDetail(Kecamatan $kecamatan)
    {
        $data['kecamatan'] = $kecamatan;
        $data['list_permohonan'] = Pendaftaran::where('daftar_status', 0)
            ->with('nopol')
            ->where('daftar_kecamatan', $kecamatan->kecamatan_id)
            ->get();
        $data['permohonan_count'] = Pendaftaran::where('daftar_kecamatan', $kecamatan->kecamatan_id)
            ->where('daftar_status', 0)
            ->count();
        // dd($data ['permohonan_count']);
        return view('mimin.permohonan-detail', $data);
    }

    function permohonanProses(Kecamatan $kecamatan)
    {
        $data['kecamatan'] = $kecamatan;
        $data['lokasi'] = Lokasi::where('lokasi_kecamatan', $kecamatan->kecamatan_id)->first();

        return view('mimin.permohonan-proses', $data);
    }

    public function prosesPermohonan(Request $request)
    {
        // dd(request()->all());
        $jadwal = new Jadwal;
        $jadwal->jadwal_kecamatan = request('jadwal_kecamatan');
        $jadwal->jadwal_lokasi = request('jadwal_lokasi');
        $jadwal->jadwal_penanggungjawab = request('jadwal_penanggungjawab');
        $jadwal->jadwal_mulai = request('jadwal_mulai');
        $jadwal->jadwal_selesai = request('jadwal_selesai');
        $jadwal->jadwal_waktu = request('jadwal_waktu');
        $jadwal->save();

        $list_pemohon = Pendaftaran::where('daftar_status', 0)->where('daftar_kecamatan', $jadwal->jadwal_kecamatan)->get();

        foreach ($list_pemohon as $pemohon) {
            $pemohon->daftar_status = 1;
            $pemohon->daftar_jadwal = $jadwal->jadwal_id;
            $pemohon->save();
        }

        foreach ($list_pemohon as $pemohon) {
            $layanan = new Layanan;
            $layanan->layanan_kecamatan = $pemohon->daftar_kecamatan;
            $layanan->layanan_lokasi = $pemohon->daftar_lokasi;
            $layanan->layanan_daftar = $pemohon->daftar_id;
            $layanan->layanan_jadwal = $pemohon->daftar_jadwal;
            $nopol = DaftarNopol::where('nopol_daftar', $pemohon->daftar_id)->first();
            $layanan->layanan_nopol = $nopol->nopol_daftar;
            $layanan->save();
        }

        return redirect('mimin/permohonan');
    }

    function pelayanan()
    {
        $data['list_kecamatan'] = Kecamatan::withCount(['daftar' => function ($query) {
            $query->where('daftar_status', 1);
        }])->with('lokasi')->with('layanan')->whereHas('daftar', function ($query) {
            $query->where('daftar_status', 1);
        })->get();
        return view('mimin.pelayanan', $data);
    }

    function pelayananDetail(Kecamatan $kecamatan)
    {
        $data['kecamatan'] = $kecamatan;
        $data['list_pelayanan'] = Layanan::with('daftar.nopol')
        ->where('layanan_kecamatan', $kecamatan->kecamatan_id)->get();
        $data['layanan_count'] = Layanan::where('layanan_kecamatan', $kecamatan->kecamatan_id)
            ->where('layanan_status', 0)
            ->count();
        $data['pelayanan_count'] = Layanan::where('layanan_kecamatan', $kecamatan->kecamatan_id)
            ->where('layanan_status', 1)
            ->count();

        return view('mimin.pelayanan-detail', $data);
    }

    function update(Layanan $layanan)
    {
        $layanan->layanan_status = 1;
        $layanan->save();

        return redirect()->back();
    }

    function pengaturan()
    {
        $data['list_kecamatan'] = Kecamatan::orderby('kecamatan_id', 'asc')->get();
        return view('mimin.pengaturan', $data);
    }

    function tambahKecamatan()
    {
        $kecamatan = new Kecamatan();
        $kecamatan->kecamatan_nama = request('kecamatan_nama');
        $kecamatan->kecamatan_target = request('kecamatan_target');
        $kecamatan->kecamatan_target_pendapatan = request('kecamatan_target_pendapatan');
        $kecamatan->save();
        // dd(request()->all());

        return redirect('mimin/pengaturan');
    }

    function editKecamatan(Kecamatan $kecamatan)
    {
        $kecamatan->kecamatan_nama = request('kecamatan_nama');
        $kecamatan->kecamatan_target = request('kecamatan_target');
        $kecamatan->kecamatan_target_pendapatan = request('kecamatan_target_pendapatan');
        $kecamatan->save();

        return redirect('mimin/pengaturan');
    }

    function pengaturanLokasi(Kecamatan $kecamatan)
    {
        $data['kecamatan'] = $kecamatan;
        $data['list_lokasi_kecamatan'] = Lokasi::where('lokasi_kecamatan', $kecamatan->kecamatan_id)->get();
        // dd($data ['list_lokasi_kecamatan']);

        return view('mimin.pengaturan-lokasi', $data);
    }

    function tambahLokasi($kecamatan_id)
    {
        // dd($kecamatan_id);
        $lokasi = new Lokasi();
        $lokasi->lokasi_kecamatan = request('lokasi_kecamatan');
        $lokasi->lokasi_nama = request('lokasi_nama');
        $lokasi->lokasi_created = date('Y-m-d H:i:s');
        $lokasi->save();

        return redirect('mimin/pengaturan-lokasi/' . $kecamatan_id);
    }

    function pesan()
    {
        $data['list_pesan'] = Kontak::orderby('kontak_id', 'asc')->get();

        return view('mimin.pesan',$data);
    }

    function aksiPesan(Kontak $kontak)
    {
        $kontak->kontak_status = 1;
        $kontak->save();

        return redirect()->back();
    }
}
