<?php

namespace App\Models;

use App\Models\Lokasi;
use App\Models\Kecamatan;
use App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'saber_jadwal';
    protected $primaryKey = 'jadwal_id';

    public $timestamps = false;

    function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'jadwal_kecamatan');
    }

    function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'jadwal_lokasi');
    }

    function daftar()
    {
        return $this->hasMany(Pendaftaran::class, 'daftar_jadwal');
    }

    function layanan()
    {
        return $this->hasMany(Layanan::class, 'layanan_jadwal');
    }
}
