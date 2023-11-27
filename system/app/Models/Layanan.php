<?php

namespace App\Models;

use App\Models\Jadwal;
use App\Models\Lokasi;
use App\Models\Kecamatan;
use App\Models\DaftarNopol;
use App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'saber_layanan';
    protected $primaryKey = 'layanan_id';

    public $timestamps = false;

    public function daftar()
    {
        return $this->belongsTo(Pendaftaran::class,'layanan_daftar');
    }
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class,'layanan_kecamatan');
    }
    public function nopol()
    {
        return $this->hasOne(DaftarNopol::class, 'nopol_id', 'layanan_nopol');
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class,'layanan_jadwal');
    }
    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class,'layanan_lokasi');
    }
    function getStatusStringAttribute(){
        return ($this->layanan_status == 0) ? "Proses" : "Selesai";
    }
}
