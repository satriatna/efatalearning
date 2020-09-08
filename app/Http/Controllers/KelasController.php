<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $obj = \App\kelas::join('mapels','kelas.mapel','=','mapels.id')->join('users','kelas.guru','=','users.id')
        ->select('kelas.id','kelas.kelas','users.name','mapels.nama')->get();
        $data['obj'] = $obj;
        return view ('kelas_index',$data);
    }
    public function tambah()
    {
        $data['obj']            =  new \App\kelas();
        $data['guru']            =  \App\User::where('level',1)->get();
        $data['mapel']            =  \App\mapel::all();
        $data['action']         = 'KelasController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('kelas_form',$data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate($request,
            [
                'kelas' => 'required',
            ]);

        \App\kelas::create($request->all());
        return redirect('admin/kelas/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\kelas::findOrFail($id);
        $obj->delete();
        return back()->with('pesan','Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\kelas::findOrFail($id);        
        $data['mapel']     = \App\mapel::all();
        $data['guru']     = \App\User::where('level',1)->get();
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('KelasController@update', $id);
        return view('kelas_edit',$data);        
    }
    public function update(Request $request, $id)
    {
        
        $kelas = \App\kelas::findOrFail($id);
        $validasi = $this->validate($request,[
        'kelas' => 'required',
    ]); 
        $kelas->update($request->all());        
        return back()->with('pesan', 'Data diubah!');
    }   
}
