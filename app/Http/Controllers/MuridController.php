<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function index()
    {
        $obj = \App\User::where('level',2)->paginate(1000);
        $data['obj'] = $obj;
        return view ('murid_index',$data);
    }
    public function tambah()
    {
        $data['obj']            =  new \App\User();
        $data['action']         = 'MuridController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('murid_form',$data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate($request,
            [
                'nama' => 'required|unique:users',
            ]);

        \App\murid::create($request->all());
        return redirect('admin/murid/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\User::findOrFail($id);
        $obj->delete();
        return back()->with('pesan','Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\User::findOrFail($id);        
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('MuridController@update', $id);
        return view('murid_form',$data);        
    }
    public function update(Request $request, $id)
    {
         $User = \App\User::findOrFail($id);
        $validasi = $this->validate($request,[
        'nama' => 'required|unique:murids,nama,'.$id,
             
    ]); 
        $user->update($request->all());        
        return back()->with('pesan', 'Data diubah!');
    }   
}
