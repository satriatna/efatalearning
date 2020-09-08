<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Auth;
class NilaiController extends Controller
{
    public function index()
    {
        $obj = \App\kelas::where('guru',Auth::user()->id)->get();
        $data['obj'] = $obj;
        return view ('nilai_index',$data);
    }
    public function detail($id)
    {
        $data['kelas'] = $id;
        $data['nama_kelas'] = \App\kelas::where('id',$id)->first();
        $obj = \App\User::where('kelas',$id)->get();
        
        if(count($obj) == 0){
            $data['nilai'] = [];
        }else{
            foreach($obj as $val)
            {
                $kotak [] = $val->id;
            }
            $data['nilai'] = \App\nilai::whereIn('murid',$kotak)
            ->join('users','nilais.murid','=','users.id')
            ->select('nilais.id','nilais.judul','nilais.nilai','users.name')->get();
        }
        return view ('nilai_detail',$data);
    }
    public function tambah($kls)
    {
        $data['obj']            =  new \App\nilai();
        $data['nama_kelas'] = \App\kelas::where('id',$kls)->first();
        $data['murid'] = \App\User::where('kelas',$kls)->get();
        $data['kelas']            =   \App\kelas::all();
        $data['action']         = 'NilaiController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('nilai_form',$data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate($request,
            [
                'nilai' => 'required',

            ]);

        \App\nilai::create($request->all());
        return redirect('guru/nilai/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\nilai::findOrFail($id);
        $obj->delete();
        return back()->with('pesan','Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\nilai::findOrFail($id);        
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('NilaiController@update', $id);
        return view('nilai_form',$data);        
    }
    public function update(Request $request, $id)
    {
         $nilai = \App\nilai::findOrFail($id);
        $validasi = $this->validate($request,[
        'name' => 'required'.$id,
             
    ]); 
        $nilai->update($request->all());        
        return back()->with('pesan', 'Data diubah!');
    }   
    public function cetak($id)
    {
        $nama_kelas = \App\kelas::where('id',$id)->first();
        $obj = \App\User::where('kelas',$id)->get();
        
        if(count($obj) == 0){
            $data = [];
        }else{
            foreach($obj as $val)
            {
                $kotak [] = $val->id;
            }
            $data = \App\nilai::whereIn('murid',$kotak)
            ->join('users','nilais.murid','=','users.id')
            ->select('nilais.id','nilais.judul','nilais.nilai','users.name')->get();
        }
        
        $pdf = PDF::loadview('/nilai_cetak',compact('data','nama_kelas'));
        return $pdf->stream();
    }
}
