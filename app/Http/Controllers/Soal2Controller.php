<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Soal2Controller extends Controller
{
    public function index()
    {
        $obj = \App\soal::all();
        $data['obj'] = $obj;
        return view ('soal2_index',$data);
    }
}
