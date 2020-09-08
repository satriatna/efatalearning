<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $obj = \App\mapel::all();
        $data['obj'] = $obj;
        return view ('mapel_index',$data);
    }
    public function tambah()
    {
        $data['obj']            =  new \App\mapel();
        $data['action']         = 'MapelController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('mapel_form',$data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate($request,
            [
                'nama' => 'required',
            ]);

        \App\mapel::create($request->all());
        return redirect('admin/mapel/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\mapel::findOrFail($id);
        $obj->delete();
        return back()->with('pesan','Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\mapel::findOrFail($id);        
        $data['mapel']     = \App\mapel::all();        
        $data['guru']     = \App\user::where('level',1);        
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('MapelController@update', $id);
        return view('mapel_edit',$data);        
    }
    public function update(Request $request, $id)
    {
         $mapel = \App\mapel::findOrFail($id);
        $validasi = $this->validate($request,[
        'nama' => 'required',
             
    ]); 
        $mapel->update($request->all());        
        return back()->with('pesan', 'Data diubah!');
    }   
}
