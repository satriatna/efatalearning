<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarController extends Controller
{
    public function daftar()
    {
        $kelas = \App\kelas::all();
        return view('auth.daftar',compact('kelas'));
    }
}
