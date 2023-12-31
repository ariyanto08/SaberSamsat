<?php

namespace App\Models;

use App\Models\Layanan;
use App\Models\Kecamatan;
use App\Models\Pendaftaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lokasi extends Model
{
    use HasFactory;
    protected $table = 'saber_lokasi';
    protected $primaryKey = 'lokasi_id';

    public $timestamps = false;

    function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'lokasi_kecamatan');
    }

    function daftar()
    {
        return $this->hasMany(Pendaftaran::class, 'daftar_lokasi');
    }

    function layanan()
    {
        return $this->hasMany(Layanan::class, 'layanan_lokasi');
    }
}
