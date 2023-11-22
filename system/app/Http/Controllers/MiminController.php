<?php

namespace App\Http\Controllers;

use App\Models\DaftarNopol;
use App\Models\Kecamatan;
use App\Models\Lokasi;
use App\Models\Pendaftaran;
use DateTime;
use Illuminate\Http\Request;

class MiminController extends Controller
{
    function beranda()
    {
        return view('mimin.beranda');
    }

    function permohonan()
    {
        $data ['list_permohonan'] = Pendaftaran::where('daftar_status', 0)->get();
        // dd($data ['permohonan_count']);
        return view('mimin.permohonan', $data);
    }

    function permohonanDetail(Pendaftaran $daftar)
    {
        $data ['permohonan'] = $daftar;
        $data ['list_permohonan'] = Pendaftaran::where('daftar_status', 0)
            ->where('daftar_kecamatan', $daftar->daftar_kecamatan)
            ->get();
        $data ['permohonan_count'] = Pendaftaran::where('daftar_kecamatan', $daftar->daftar_kecamatan)
            ->where('daftar_status', 0)
            ->count();
        // dd($data ['permohonan_count']);
        return view('mimin.permohonan-detail', $data);
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
    
    function laporan()
    {
        //Persentase
        $totalData = DaftarNopol::count();
        $rd2 = DaftarNopol::where('nopol_jenis', 'Roda 2')->count();
        $rd4 = DaftarNopol::where('nopol_jenis', 'Roda 4')->count();
        $total_rd2 = ($rd2 / $totalData) *100;
        $total_rd4 = ($rd4 / $totalData) *100;

        //Diagram Permohonan
        $permohonan = Pendaftaran::select('daftar_id')->get();
        $totalDaftarId = $permohonan->sum('daftar_id');
        $totalDaftarId = Pendaftaran::count();
        
        $kecamatan = Pendaftaran::select('daftar_kecamatan')->get();
        $totalKecamatan = $kecamatan->sum('daftar_kecamatan');
        $totalKecamatan = Pendaftaran::count();
        
        $totalKecamatan = Pendaftaran::groupBy('daftar_kecamatan')
        ->selectRaw('daftar_kecamatan, COUNT(*) as count')
        ->pluck('count', 'daftar_kecamatan')
        ->toArray();

        $kecamatan = Kecamatan::all();
        
        return view('mimin.laporan', compact( 'kecamatan', 'totalKecamatan', 'permohonan', 'totalDaftarId', 'total_rd2','total_rd4'));
    }
}
