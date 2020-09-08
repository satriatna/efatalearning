<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Jawab2Controller extends Controller
{
    public function index()
    {
        $obj = \App\jawab::join('soals','jawabs.judul','=','soals.id')->join('users','jawabs.name','=','users.id')
        ->select('jawabs.id','soals.judul','jawabs.jawaban','jawabs.file','users.name')->get();
        $data['obj'] = $obj;
        return view ('jawab2_index',$data);
    }
    public function hapus($id)
    {
        $obj = \App\jawab::findOrFail($id);
        $obj->delete();
        return back()->with('pesan','Data sudah dihapus!');
    }
}
