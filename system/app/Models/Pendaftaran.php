<?php

namespace App\Models;

use App\Models\Jadwal;
use App\Models\Lokasi;
use App\Models\Layanan;
use App\Models\Kecamatan;
use App\Models\DaftarNopol;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table ='saber_daftar';
    protected $primaryKey = 'daftar_id';

    public $timestamps = false;

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'daftar_kecamatan');
    }
    public function nopol()
    {
        return $this->hasMany(DaftarNopol::class, 'nopol_daftar');
    }

    public function layanan()
    {
        return $this->hasOne(Layanan::class, 'layanan_daftar');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'daftar_lokasi');
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'daftar_jadwal');
    }
}
