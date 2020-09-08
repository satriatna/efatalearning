<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use DateTime;
use Response;
class SoalController extends Controller
{
    public function index()
    {
        $obj = \App\soal::join('mapels','soals.mapel','=','mapels.id')
        ->join('kelas','soals.kelas','=','kelas.id')
        ->select('soals.id','soals.mapel','soals.judul','kelas.kelas','soals.deadline','soals.file','soals.link','mapels.nama')->get();
        $data['obj'] = $obj;
        return view ('soal_index',$data);
    }
    public function tambah()
    {
        $data['obj']            =  new \App\soal();
        $data['kelas']            =  \App\kelas::where('guru',Auth::user()->id)->get();
        $data['mapel']            =  \App\mapel::all();
        $data['action']         = 'SoalController@simpan';
        $data['btn_submit']     = 'SIMPAN';
        $data['method']         = "POST";
        return view('soal_form',$data);
    }
    public function simpan(Request $request)
    {
        $this->validate($request,
            [
                'judul' => 'unique:soals',
            ]);
        $datetime = new DateTime;
            if($request->file){
                
                $photo = date("YmdHis")."_".$request->file('file')->getClientOriginalName();
                $destination = 'database/soal/file';
                $request->file('file')->move($destination, $photo);
                // $imageget = Setting::where('code','COMP_IMG')->first();
                // File::delete('database/soal/file' . $imageget->value);
                // Setting::where('code','COMP_IMG')->update(array('value' => $photo));

                DB::table('soals')->insert([
                    'mapel'=>$request->mapel,
                    'judul'=>$request->judul,
                    'kelas'=>$request->kelas,
                    'file'=>$photo,
                    'link'=>$request->link,
                    'created_at'=>$datetime,
                    'updated_at'=>$datetime,
                    'deadline'=>$request->deadline,
                ]);
            }else{
                DB::table('soals')->insert([
                    'mapel'=>$request->mapel,
                    'judul'=>$request->judul,
                    'kelas'=>$request->kelas,
                    'link'=>$request->link,
                    'created_at'=>$datetime,
                    'updated_at'=>$datetime,
                    'deadline'=>$request->deadline,
                ]);
            }
        return redirect('guru/soal/index')->with('pesan', 'Data sudah disimpan!');
    }
    public function hapus($id)
    {
        $obj = \App\soal::findOrFail($id);
        $obj->delete();
        return back()->with('pesan','Data sudah dihapus!');
    }
    public function edit($id)
    {
        $data['obj']     = \App\soal::findOrFail($id);        
        $data['mapel']     = \App\mapel::all();        
        $data['kelas']     = \App\kelas::all();        
        $data['method']     = "PUT";
        $data['btn_submit'] = "UPDATE";
        $data['action']     = array('SoalController@update', $id);
        return view('soal_edit',$data);        
    }
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'judul'=> ['required','unique:soals,judul,'.$id],
        ]);
        $datetime = new DateTime;
        if($request->file){
            
            $photo = date("YmdHis")."_".$request->file('file')->getClientOriginalName();
            $destination = 'database/soal/file';
            $request->file('file')->move($destination, $photo);
            // $imageget = Setting::where('code','COMP_IMG')->first();
            // File::delete('database/soal/file' . $imageget->value);
            // Setting::where('code','COMP_IMG')->update(array('value' => $photo));

            DB::table('soals')->where('id',$id)->update([
                'mapel'=>$request->mapel,
                'judul'=>$request->judul,
                'kelas'=>$request->kelas,
                'file'=>$photo,
                'link'=>$request->link,
                'created_at'=>$datetime,
                'updated_at'=>$datetime,
                'deadline'=>$request->deadline,
            ]);
        }else{
            DB::table('soals')->where('id',$id)->update([
                'mapel'=>$request->mapel,
                'judul'=>$request->judul,
                'kelas'=>$request->kelas,
                'link'=>$request->link,
                'created_at'=>$datetime,
                'updated_at'=>$datetime,
                'deadline'=>$request->deadline,
            ]);
        }
        return redirect('guru/soal/index')->with('pesan', 'Data diubah!');
    }   
    public function download($id)
    {
        
        $data= \App\soal::where('id',$id)->first();
        $file= public_path(). "/database/soal/file/". $data->file;

        return Response::download($file);
    }
}
