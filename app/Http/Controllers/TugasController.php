<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class TugasController extends Controller
{
    public function index()
    {
        $obj = \App\soal::join('mapels','soals.mapel','=','mapels.id')
        ->join('kelas','soals.kelas','=','kelas.id')
        ->where('soals.kelas',Auth::user()->kelas)
        ->select('soals.id','soals.mapel','soals.judul','kelas.kelas','soals.deadline','soals.file','soals.link','mapels.nama')->get();
        $data['obj'] = $obj;
        return view ('tugas_index',$data);
    }
}
