<?php

namespace App\Http\Controllers;

use App\Models\DaftarNopol;
use App\Models\Jadwal;
use App\Models\Kecamatan;
use App\Models\Layanan;
use App\Models\Lokasi;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class MiminController extends Controller
{
    function beranda()
    {
        return view('mimin.beranda');
    }

    function permohonan()
    {               
        $data['list_kecamatan'] = Kecamatan::withCount('daftar')->with('lokasi')->whereHas('daftar', function ($query) {
            $query->where('daftar_status', 0);
        })->get();

        return view('mimin.permohonan', $data);
    }

    function permohonanDetail(Kecamatan $kecamatan)
    {
        $data ['kecamatan'] = $kecamatan;
        $data ['list_permohonan'] = Pendaftaran::where('daftar_status', 0)
            ->where('daftar_kecamatan', $kecamatan->kecamatan_id)
            ->get();
        $data ['permohonan_count'] = Pendaftaran::where('daftar_kecamatan', $kecamatan->kecamatan_id)
            ->where('daftar_status', 0)
            ->count();
        // dd($data ['permohonan_count']);
        return view('mimin.permohonan-detail', $data);
    }

    function permohonanProses(Kecamatan $kecamatan)
    {
        $data ['kecamatan'] = $kecamatan;
        $data ['lokasi'] = Lokasi::where('lokasi_kecamatan', $kecamatan->kecamatan_id)->first();

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
        return view('mimin.pelayanan');
    }

    function pelayananDetail()
    {
        return view('mimin.pelayanan-detail');
    }

    function pengaturan()
    {
        $data ['list_kecamatan'] = Kecamatan::orderby('kecamatan_id', 'asc')->get();
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
    
    function pengaturanLokasi(Kecamatan $kecamatan)
    {
        $data ['kecamatan'] = $kecamatan;
        $data ['list_lokasi_kecamatan'] = Lokasi::where('lokasi_kecamatan', $kecamatan->kecamatan_id)->get();
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

        return redirect('mimin/pengaturan-lokasi/'. $kecamatan_id);
    }
}
