<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $obj = \App\jadwal::join('mapels','jadwals.mapel','=','mapels.id')->join('users','jadwals.guru','=','users.id')
        ->join('kelas','jadwals.kelas','=','kelas.id')
        ->select('jadwals.id','jadwals.hari','jadwals.jam','jadwals.kelas','mapels.nama','users.name')->get();
        $data['obj'] = $obj;
        return view ('jadwal_index',$data);
    }
    public function tambah()
    {
        $data['obj']            =  new \App\jadwal();
        $data['kelas']            = \App\kelas::all();
        $data['guru']            = \App\User::where('level',1)->get();
        $data['mapel']            = \App\mapel::all();
        $data['action']         = 'JadwalController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('jadwal_form',$data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate($request,
            [
                'hari' => 'required',
            ]);

        \App\jadwal::create($request->all());
        return redirect('admin/jadwal/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\jadwal::findOrFail($id);
        $obj->delete();
        return back()->with('pesan','Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\jadwal::findOrFail($id);        
        $data['kelas']     = \App\kelas::all();        
        $data['guru']     = \App\User::where('level',1)->get();        
        $data['mapel']     = \App\mapel::all();        
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('JadwalController@update', $id);
        return view('jadwal_edit',$data);        
    }
    public function update(Request $request, $id)
    {
         $jadwal = \App\jadwal::findOrFail($id);
        $validasi = $this->validate($request,[
        'hari' => 'required',
             
    ]); 
        $jadwal->update($request->all());
        return redirect('admin/jadwal/index')->with('pesan', 'Data sudah disimpan!');
    }   
}
