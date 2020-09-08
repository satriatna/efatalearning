<?php

namespace App\Http\Controllers;

use App\jadwal,nilai;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index()
    {
        $obj = \App\jadwal::join('mapels','jadwals.mapel','=','mapels.id')->join('users','jadwals.guru','=','users.id')
        ->join('kelas','jadwals.kelas','=','kelas.id')
        ->select('jadwals.id','jadwals.hari','jadwals.jam','jadwals.kelas','mapels.nama','users.name')->get();
        $data['obj'] = $obj;
        return view ('informasi_index',$data);
    }
    
}
