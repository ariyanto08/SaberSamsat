<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function showLogin()
    {
        return view('login');
    }
    function prosesLogin()
    {
        // if(Auth::attempt(['akun_user'=> request('akun_user'), 'akun_pass' => request('akun_pass')])){
        //     $user = Auth::user();
        //     if($user->akun_level == 0) return redirect('mimin/beranda');
        //     if($user->akun_level == 1) return redirect('mimin/pelayanan');
        // } else{
        //     return back();
        // }
        if (Auth::attempt(['nip' => request('nip'), 'password' => request('password')])) {
            $user = Auth::user();
            if($user->level == 1) return redirect('mimin/beranda');
            // if($user->level == 2) return redirect('mimin/pelayanan');
        } else {
            return back();
        }
    }
    function logout(){
        Auth::logout();
        return redirect('mimin/login');
    }
}
