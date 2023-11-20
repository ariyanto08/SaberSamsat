<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiNopol extends Model
{
    use HasFactory;
    protected $table ='saber_api_daftar_nopol';
    protected $primaryKey ='nopol_id';
}
