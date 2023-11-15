<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarNopol extends Model
{
    use HasFactory;
    protected $table = 'saber_daftar_nopol';
    protected $primatyKey ='nopol_id';

    public $timestamps = false;
}
