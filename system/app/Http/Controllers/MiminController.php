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
use Illuminate\Support\Facades\DB;

class MiminController extends Controller
{
    function beranda()
    {
        $data['grandtotal_pajak'] = DaftarNopol::whereIn('nopol_id', function ($query) {
            $query->select('layanan_nopol')->from('saber_layanan')->where('layanan_status', 1);
        })->sum('nopol_grandtotal');
        $data['mobil_count'] = DaftarNopol::where('nopol_jenis', 'Roda 4')->whereHas('layanan_count', function ($query) {
            $query->where('layanan_status', 0);
        })->count();
        $data['motor_count'] = DaftarNopol::where('nopol_jenis', 'Roda 2')->whereHas('layanan_count', function ($query) {
            $query->where('layanan_status', 0);
        })->count();
        $data['permohonan_count'] = DaftarNopol::whereIn('nopol_daftar', function ($query) {
            $query->select('daftar_id')->from('saber_daftar')->where('daftar_status', 0);
        })->count();
        // dd( $data['permohonan_count']);
        $data['layanan_count'] = Layanan::where('layanan_status', 1)->count();
        $data['antrian_layanan_count'] = Layanan::where('layanan_status', 0)->count();
        return view('mimin.beranda', $data);
    }

    function permohonan()
    {
        $data['list_kecamatan'] = Kecamatan::withCount(['daftar as jumlah_nopol' => function ($query) {
            $query->where('daftar_status', 0)->join('saber_daftar_nopol', 'saber_daftar.daftar_id', '=', 'saber_daftar_nopol.nopol_daftar');
        }])->with('lokasi')->whereHas('daftar', function ($query) {
            $query->where('daftar_status', 0);
        })->get();


        // dd($data['list_kecamatan']);
        return view('mimin.permohonan', $data);
    }

    function permohonanDetail(Kecamatan $kecamatan)
    {
        $data['kecamatan'] = $kecamatan;
        $data['kecamatanlist'] = Kecamatan::all();
        $data['list_permohonan'] = Pendaftaran::where('daftar_status', 0)
            ->with('nopol')->with('lokasi')
            ->where('daftar_kecamatan', $kecamatan->kecamatan_id)
            ->get();
        $data['permohonan_count'] = DaftarNopol::whereIn('nopol_daftar', function ($query) use ($kecamatan) {
            $query->select('daftar_id')->from('saber_daftar')->where('daftar_status', 0)->where('daftar_kecamatan', $kecamatan->kecamatan_id);
        })->count();
        // dd($data ['list_permohonan']);
        return view('mimin.permohonan-detail', $data);
    }

    function permohonanEdit()
    {
    }

    function permohonanProses(Kecamatan $kecamatan)
    {
        $data['kecamatan'] = $kecamatan;
        $data['lokasi'] = Lokasi::where('lokasi_kecamatan', $kecamatan->kecamatan_id)->first();

        return view('mimin.permohonan-proses', $data);
    }

    // public function prosesPermohonan(Request $request)
    // {
    //     // dd(request()->all());
    //     $jadwal = new Jadwal;
    //     $jadwal->jadwal_kecamatan = request('jadwal_kecamatan');
    //     $jadwal->jadwal_lokasi = request('jadwal_lokasi');
    //     $jadwal->jadwal_penanggungjawab = request('jadwal_penanggungjawab');
    //     $jadwal->jadwal_mulai = request('jadwal_mulai');
    //     $jadwal->jadwal_selesai = request('jadwal_selesai');
    //     $jadwal->jadwal_waktu = request('jadwal_waktu');
    //     $jadwal->save();

    //     $list_pemohon = Pendaftaran::where('daftar_status', 0)->where('daftar_kecamatan', $jadwal->jadwal_kecamatan)->get();

    //     foreach ($list_pemohon as $pemohon) {
    //         $pemohon->daftar_status = 1;
    //         $pemohon->daftar_jadwal = $jadwal->jadwal_id;
    //         $pemohon->save();
    //     }

    //     foreach ($list_pemohon as $pemohon) {
    //         $layanan = new Layanan;
    //         $layanan->layanan_kecamatan = $pemohon->daftar_kecamatan;
    //         $layanan->layanan_lokasi = $pemohon->daftar_lokasi;
    //         $layanan->layanan_daftar = $pemohon->daftar_id;
    //         $layanan->layanan_jadwal = $pemohon->daftar_jadwal;
    //         $nopol = DaftarNopol::where('nopol_daftar', $pemohon->daftar_id)->first();
    //         $layanan->layanan_nopol = $nopol->nopol_id;
    //         $layanan->save();
    //     }

    //     return redirect('mimin/permohonan');
    // }

    public function prosesPermohonan(Request $request)
    {
        $jadwal = new Jadwal;
        $jadwal->jadwal_kecamatan = request('jadwal_kecamatan');
        $jadwal->jadwal_lokasi = request('jadwal_lokasi');
        $jadwal->jadwal_penanggungjawab = request('jadwal_penanggungjawab');
        $jadwal->jadwal_mulai = request('jadwal_mulai');
        $jadwal->jadwal_selesai = request('jadwal_selesai');
        $jadwal->jadwal_waktu = request('jadwal_waktu');
        $jadwal->save();

        $list_pemohon = Pendaftaran::where('daftar_status', 0)
            ->where('daftar_kecamatan', $jadwal->jadwal_kecamatan)
            ->get();

        foreach ($list_pemohon as $pemohon) {
            $pemohon->daftar_status = 1;
            $pemohon->daftar_jadwal = $jadwal->jadwal_id;
            $pemohon->save();

            $nopolList = DaftarNopol::where('nopol_daftar', $pemohon->daftar_id)->get();

            foreach ($nopolList as $nopol) {
                $layanan = new Layanan;
                $layanan->layanan_kecamatan = $pemohon->daftar_kecamatan;
                $layanan->layanan_lokasi = $pemohon->daftar_lokasi;
                $layanan->layanan_daftar = $pemohon->daftar_id;
                $layanan->layanan_jadwal = $pemohon->daftar_jadwal;
                $layanan->layanan_nopol = $nopol->nopol_id;
                $layanan->save();
            }
        }

        return redirect('mimin/permohonan');
    }


    function pelayanan()
    {
        $data['list_jadwal'] = Jadwal::with('kecamatan')->with('lokasi')->with('layanan')
            ->withCount(['layanan as jumlah_nopol' => function ($query) {
                $query->where('layanan_status', 0);
            }])->orderBy('jadwal_id', 'asc')->get();

        // dd($data['list_jadwal']);
        return view('mimin.pelayanan', $data);
    }

    function pelayananDetail(Jadwal $jadwal)
    {
        $data['jadwal'] = $jadwal;
        $data['list_pelayanan'] = Layanan::with('daftar')->with('nopol')
            ->where('layanan_jadwal', $jadwal->jadwal_id)->get();
        // dd($data['list_pelayanan']);
        $data['layanan_count'] = DaftarNopol::whereIn('nopol_id', function ($query) use ($jadwal) {
            $query->select('layanan_nopol')->from('saber_layanan')->where('layanan_status', 0)->where('layanan_jadwal', $jadwal->jadwal_id);
        })->count();

        $data['pelayanan_count'] = Layanan::where('layanan_jadwal', $jadwal->jadwal_id)
            ->where('layanan_status', 1)
            ->count();

        $data['grandtotal_pajak'] = DaftarNopol::whereIn('nopol_id', function ($query) {
            $query->select('layanan_nopol')->from('saber_layanan')->where('layanan_status', 1);
        })->sum('nopol_grandtotal');

        return view('mimin.pelayanan-detail', $data);
    }

    function pelayananTutup(Jadwal $jadwal)
    {
        $jadwal->jadwal_status = 1;
        $jadwal->save();

        $list_layanan = Layanan::where('layanan_jadwal', $jadwal->jadwal_id)->get();
        // $jadwal = $layanan->layanan_jadwal;

        foreach ($list_layanan as $layanan) {
            $layanan->layanan_status = 2;
            $layanan->save();
        }

        // dd($layanan);
        return redirect('mimin/pelayanan');
    }

    function update(Layanan $layanan)
    {

        $layanan->layanan_status = 1;
        $layanan->save();
        // dd($layanan);
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

    function deleteLokasi(Lokasi $lokasi)
    {
        $lokasi->delete();

        return redirect()->back();
    }

    function pesan()
    {
        $data['list_pesan'] = Kontak::orderby('kontak_id', 'asc')->get();

        return view('mimin.pesan', $data);
    }

    function aksiPesan(Kontak $kontak)
    {
        $kontak->kontak_status = 1;
        $kontak->save();

        return redirect()->back();
    }

    function laporan()
    {
        //Persentase
        $totalDataMotor = DaftarNopol::where('nopol_jenis', 'Roda 2')->whereIn('nopol_id', function ($query) {
            $query->select('layanan_nopol')->from('saber_layanan');
        })->count();
        $totalDataMobil = DaftarNopol::where('nopol_jenis', 'Roda 4')->whereIn('nopol_id', function ($query) {
            $query->select('layanan_nopol')->from('saber_layanan');
        })->count();
        $rd2 = DaftarNopol::where('nopol_jenis', 'Roda 2')->whereIn('nopol_id', function ($query) {
            $query->select('layanan_nopol')->from('saber_layanan')->where('layanan_status', 1);
        })->count();
        $rd4 = DaftarNopol::where('nopol_jenis', 'Roda 4')->whereIn('nopol_id', function ($query) {
            $query->select('layanan_nopol')->from('saber_layanan')->where('layanan_status', 1);
        })->count();
        $total_rd2 = ($rd2 / $totalDataMotor) * 100;
        $total_rd4 = ($rd4 / $totalDataMobil) * 100;

        //Diagram Permohonan
        $permohonan = Layanan::where('layanan_status', 0)->count();
        //Reaslisai
        $realisasi = Layanan::where('layanan_status', 1)->count();

        //chart batang
        $data = Layanan::select('saber_kecamatan.kecamatan_nama as kecamatan_nama')
            ->whereIn('layanan_kecamatan', function ($query) {
                $query->select('kecamatan_id')
                    ->from('saber_kecamatan');
            })
            ->selectRaw('(SELECT COUNT(*) FROM saber_layanan WHERE saber_layanan.layanan_kecamatan = saber_kecamatan.kecamatan_id AND saber_layanan.layanan_status = 0) as total_permohonan')
            ->selectRaw('(SELECT COUNT(*) FROM saber_layanan WHERE saber_layanan.layanan_kecamatan = saber_kecamatan.kecamatan_id AND saber_layanan.layanan_status = 1) as total_realisasi')
            ->join('saber_kecamatan', 'saber_kecamatan.kecamatan_id', '=', 'saber_layanan.layanan_kecamatan')
            ->groupBy('layanan_kecamatan', 'saber_kecamatan.kecamatan_nama')
            ->get();

        $categories = $data->pluck('kecamatan_nama')->toArray();
        $permohonanData = $data->pluck('total_permohonan')->toArray();
        $realisasiData = $data->pluck('total_realisasi')->toArray();
        // dd($realisasiData);
        return view('mimin.laporan',
        compact('categories',
         'permohonanData',
          'realisasiData',
           'total_rd2',
            'total_rd4',
            'permohonan',
            'realisasi'
        ));
    }
}
