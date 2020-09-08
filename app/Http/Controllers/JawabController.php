<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use Auth;
use Response;
class JawabController extends Controller
{
    public function index()
    {
        $obj = \App\jawab::join('soals','jawabs.judul','=','soals.id')
        ->select('jawabs.id','soals.judul','jawabs.jawaban','jawabs.file')->where('name',Auth::user()->id)->get();
        $data['obj'] = $obj;
        return view ('jawab_index',$data);
    }
    public function tambah()
    {
        $data['obj']            =  new \App\jawab();
        $data['judul'] = \App\soal::join('mapels','soals.mapel','=','mapels.id')
        ->join('kelas','soals.kelas','=','kelas.id')
        ->where('soals.kelas',Auth::user()->kelas)
        ->select('soals.id','soals.judul','soals.mapel','mapels.nama')->get();
        $data['action']         = 'JawabController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('jawab_form',$data);
    }
    public function simpan(Request $request)
    {
        $datetime = new DateTime;
        $cek_deadline = DB::table('soals')->where('id',$request->judul)->first();
        $now = date('Y-m-d');
        if($cek_deadline->deadline < $now){
            return redirect('/murid/jawab/index')->with('alert','Gagal mengirim tugas. Pengiriman tugas melebihi batas waktu deadline ( Telat ).');
        }else{
            if($request->file){
                
                $photo = date("YmdHis")."_".$request->file('file')->getClientOriginalName();
                $destination = 'database/jawaban/file';
                $request->file('file')->move($destination, $photo);
                DB::table('jawabs')->insert([
                    'name'=>$request->name,
                    'judul'=>$request->judul,
                    'jawaban'=>$request->jawaban,
                    'file'=>$photo,
                    'created_at'=>$datetime,
                    'updated_at'=>$datetime,
                ]);
            }else{
                DB::table('jawabs')->insert([
                    'name'=>$request->name,
                    'judul'=>$request->judul,
                    'jawaban'=>$request->jawaban,
                    'created_at'=>$datetime,
                    'updated_at'=>$datetime,
                ]);
            }
        }
        return redirect('murid/jawab/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\jawab::findOrFail($id);
        $obj->delete();
        return back()->with('pesan','Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\jawab::findOrFail($id);        
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('JawabController@update', $id);
        return view('jawab_form',$data);        
    }
    public function update(Request $request, $id)
    {
         $jawab = \App\jawab::findOrFail($id);
        $validasi = $this->validate($request,[
        'name' => 'required|unique:jawabs,name,'.$id,
             
    ]); 
        $jawab->update($request->all());        
        return back()->with('pesan', 'Data diubah!');
    }   
    public function download($id)
    {
        
        $data= \App\jawab::where('id',$id)->first();
        $file= public_path(). "/database/jawaban/file/". $data->file;

        return Response::download($file);
    }
}
