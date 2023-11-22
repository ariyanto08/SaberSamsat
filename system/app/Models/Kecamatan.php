<?php

namespace App\Models;

use App\Models\Jadwal;
use App\Models\Lokasi;
use App\Models\Layanan;
use App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'saber_kecamatan';
    protected $primaryKey = 'kecamatan_id';

    public $timestamps = false;

    function lokasi()
    {
        return $this->hasMany(Lokasi::class, 'lokasi_kecamatan');
    }

    function jadwal()
    {
        return $this->hasMany(Jadwal::class, 'jadwal_kecamatan');
    }

    function daftar()
    {
        return $this->hasMany(Pendaftaran::class, 'daftar_kecamatan');
    }

    function layanan()
    {
        return $this->hasMany(Layanan::class, 'layanan_kecamatan');
    }
}
