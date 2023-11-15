<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $table = 'saber_layanan';
    protected $primaryKey = 'layanan_id';

    public $timestamps = false;
}
