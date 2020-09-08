<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use DateTime;
use Response;
class MateriController extends Controller
{
    public function index()
    {
        $obj = \App\materi::join('mapels','materis.mapel','=','mapels.id')
        ->join('kelas','materis.kelas','=','kelas.id')
        ->select('materis.id','materis.mapel','materis.judul','kelas.kelas','materis.file','materis.link','mapels.nama')->get();
        $data['obj'] = $obj;
        return view ('materi_index',$data);
    }
    public function tambah()
    {
        $data['obj']            =  new \App\materi();
        $data['action']         = 'MateriController@simpan';
        $data['kelas']            =  \App\kelas::where('guru',Auth::user()->id)->get();
        $data['mapel']            =  \App\mapel::all();
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('materi_form',$data);
    }
    public function simpan(Request $request)
    {
        $validasi = $this->validate($request,
            [
                'mapel' => 'required',
            ]);
            $datetime = new DateTime;
            if($request->file){
                
                $photo = date("YmdHis")."_".$request->file('file')->getClientOriginalName();
                $destination = 'database/materi/file';
                $request->file('file')->move($destination, $photo);
                // $imageget = Setting::where('code','COMP_IMG')->first();
                // File::delete('database/soal/file' . $imageget->value);
                // Setting::where('code','COMP_IMG')->update(array('value' => $photo));

                DB::table('materis')->insert([
                    'mapel'=>$request->mapel,
                    'judul'=>$request->judul,
                    'kelas'=>$request->kelas,
                    'file'=>$photo,
                    'link'=>$request->link,
                    'created_at'=>$datetime,
                    'updated_at'=>$datetime,
                ]);
            }else{
                DB::table('materis')->insert([
                    'mapel'=>$request->mapel,
                    'judul'=>$request->judul,
                    'kelas'=>$request->kelas,
                    'link'=>$request->link,
                    'created_at'=>$datetime,
                    'updated_at'=>$datetime,
                ]);
            }
        return redirect('guru/materi/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\materi::findOrFail($id);
        $obj->delete();
        return back()->with('pesan','Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\materi::findOrFail($id);            
        $data['mapel']     = \App\mapel::all();        
        $data['kelas']     = \App\kelas::all(); 
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('MateriController@update', $id);
        return view('materi_edit',$data);        
    }
    public function update(Request $request, $id)
    {
        
        $datetime = new DateTime;
         if($request->file){
            
        $photo = date("YmdHis")."_".$request->file('file')->getClientOriginalName();
        $destination = 'database/materi/file';
        $request->file('file')->move($destination, $photo);
        // $imageget = Setting::where('code','COMP_IMG')->first();
        // File::delete('database/soal/file' . $imageget->value);
        // Setting::where('code','COMP_IMG')->update(array('value' => $photo));

        DB::table('materis')->where('id',$id)->update([
            'mapel'=>$request->mapel,
            'judul'=>$request->judul,
            'kelas'=>$request->kelas,
            'file'=>$photo,
            'link'=>$request->link,
            'created_at'=>$datetime,
            'updated_at'=>$datetime,
        ]);
    }else{
        DB::table('materis')->where('id',$id)->update([
            'mapel'=>$request->mapel,
            'judul'=>$request->judul,
            'kelas'=>$request->kelas,
            'link'=>$request->link,
            'created_at'=>$datetime,
            'updated_at'=>$datetime,
        ]);
    }
        return redirect('guru/materi/index')->with('pesan', 'Data diubah!');
    }   
    public function download($id)
    {
        
        $data= \App\materi::where('id',$id)->first();
        $file= public_path(). "/database/materi/file/". $data->file;

        return Response::download($file);
    }
}
