<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class KecamatanResource extends Controller
{
    function getLokasi($lokasi_kecamatan){
        return Lokasi::where('lokasi_kecamatan', $lokasi_kecamatan)->get()->toJson();
    }
}
