<?php

namespace App\Models;

use App\Models\Lokasi;
use App\Models\Kecamatan;
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
        return $this->belongsTo(Kecamatan::class, 'daftar_kecamatan', 'kecamatan_id');
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class, 'daftar_lokasi');
    }
}
