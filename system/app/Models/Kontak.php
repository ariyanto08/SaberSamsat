<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;
    protected $table = 'saber_kontak';
    protected $primaryKey = 'kontak_id';

    public $timestamps = false;
}
