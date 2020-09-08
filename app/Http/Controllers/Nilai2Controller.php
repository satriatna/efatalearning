<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class Nilai2Controller extends Controller
{
    public function index()
    {
        $obj = \App\nilai::where('murid',Auth::user()->id)->get();
        $data['obj'] = $obj;
        return view ('nilai2_index',$data);
    }
}
