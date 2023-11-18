<?php

namespace App\Models;

use App\Models\Jadwal;
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
    public function nopol()
    {
        return $this->hasMany(DaftarNopol::class, 'nopol_id');
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class,'layanan_jadwal');
    }
    function getStatusStringAttribute(){
        return ($this->layanan_status == 0) ? "Proses" : "Selesai";
    }
}
