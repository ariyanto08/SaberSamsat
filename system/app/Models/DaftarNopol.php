<?php

namespace App\Models;

use App\Models\Layanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarNopol extends Model
{
    use HasFactory;
    protected $table = 'saber_daftar_nopol';
    protected $primatyKey ='nopol_id';

    public $timestamps = false;

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_nopol');
    }
}
