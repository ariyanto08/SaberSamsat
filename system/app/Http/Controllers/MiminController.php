<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Jadwal;
use App\Models\Lokasi;
use App\Models\Layanan;
use App\Models\Kecamatan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MiminController extends Controller
{
    function beranda()
    {
        return view('mimin.beranda');
    }

    function permohonan()
    {
        // $kecamatan =Kecamatan::select('kecamatan_id')->first();
        // $p = Pendaftaran::where('daftar_status', 0)->get();
        $data ['list_permohonan'] = Pendaftaran::all();
        // dd($kecamatan);
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

    function permohonanProses(){
        return view('mimin.permohonan-proses');
    }

    public function simpanPermohonan(Request $request)
    {
        // dd($request->daftar_id);

        $request->validate([
            'penanggung_jawab' => 'required',
            'waktu_pelaksana' => 'required',
        ]);

        // $jadwal = new Jadwal();
        // $jadwal->jadwal_kecamatan = $request->
        // Simpan data ke tabel jadwal
        $jadwal = Jadwal::create([
            'penanggung_jawab' => $request->penanggung_jawab,
            'waktu_pelaksana' => $request->waktu_pelaksana,
            'id_permohonan' => $request->id_permohonan,
        ]);

        // Ambil data dari tabel permohonan
        $permohonan = Pendaftaran::findOrFail($request->id_permohonan);

        // Simpan data ke tabel layanan
        Layanan::create([
            'id_jadwal' => $jadwal->id,
            'kecamatan' => $permohonan->kecamatan,
            'lokasi' => $permohonan->lokasi,
            'nopol' => $permohonan->nopol,
            'id_permohonan' => $request->id_permohonan,
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('nama_rute')->with('success', 'Data berhasil disimpan.');
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
