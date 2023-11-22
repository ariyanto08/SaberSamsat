<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DaftarNopol extends Model
{
    use HasFactory;
    protected $table = 'saber_api_daftar_nopol';
    protected $primatyKey ='nopol_id';

    public $timestamps = false;

}
