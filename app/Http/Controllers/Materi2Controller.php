<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class Materi2Controller extends Controller
{
    public function index()
    {
        $obj = \App\materi::where('kelas',Auth::user()->kelas)
        ->join('mapels','materis.mapel','=','mapels.id')->get();
        $data['obj'] = $obj;
        return view ('materi2_index',$data);
    }
}
