<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $obj = \App\User::where('level',1)->paginate(1000);
        $data['obj'] = $obj;
        return view ('guru_index',$data);
    }
    public function tambah()
    {
        $data['obj']            =  new \App\User();
        $data['action']         = 'GuruController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('guru_form',$data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate($request,
            [
                'name' => 'required|unique:users',
            ]);

        \App\User::create($request->all());
        return redirect('admin/guru/index')->with('pesan', 'Data sudah disimpan!');
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
        $data['action']     = array('GuruController@update', $id);
        return view('guru_form',$data);        
    }
    public function update(Request $request, $id)
    {
         $user = \App\User::findOrFail($id);
        $validasi = $this->validate($request,[
        'nama' => 'required|unique:users,nama,'.$id,
             
    ]); 
        $user->update($request->all());        
        return back()->with('pesan', 'Data diubah!');
    } 
    
  
}
