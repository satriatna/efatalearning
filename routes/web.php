<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('guru/index', 'GuruController@index');
    Route::get('guru/tambah', 'GuruController@tambah');
    Route::post('guru/simpan', 'GuruController@simpan');
    Route::get('guru/hapus/{id}', 'GuruController@hapus');
    Route::get('guru/edit/{id}','GuruController@edit');  
    Route::put('guru/update/{id}','GuruController@update');   
    
    Route::get('murid/index', 'MuridController@index');
    Route::get('murid/tambah', 'MuridController@tambah');
    Route::post('Murid/simpan', 'MuridController@simpan');
    Route::get('murid/hapus/{id}', 'MuridController@hapus');
    Route::get('murid/edit/{id}','MuridController@edit');  
    Route::put('murid/update/{id}','MuridController@update');
    
    Route::get('kelas/index', 'KelasController@index');
    Route::get('kelas/tambah', 'KelasController@tambah');
    Route::post('kelas/simpan', 'KelasController@simpan');
    Route::get('kelas/hapus/{id}', 'KelasController@hapus');
    Route::get('kelas/edit/{id}','KelasController@edit');  
    Route::put('kelas/update/{id}','KelasController@update'); 
    
    Route::get('mapel/index', 'MapelController@index');
    Route::get('mapel/tambah', 'MapelController@tambah');
    Route::post('mapel/simpan', 'MapelController@simpan');
    Route::get('mapel/hapus/{id}', 'MapelController@hapus');
    Route::get('mapel/edit/{id}','MapelController@edit');  
    Route::put('mapel/update/{id}','MapelController@update'); 

    Route::get('jadwal/index', 'JadwalController@index');
    Route::get('jadwal/tambah', 'JadwalController@tambah');
    Route::post('jadwal/simpan', 'JadwalController@simpan');
    Route::get('jadwal/hapus/{id}', 'JadwalController@hapus');
    Route::get('jadwal/edit/{id}','JadwalController@edit');  
    Route::put('jadwal/update/{id}','JadwalController@update'); 

});
Route::prefix('guru')->middleware('auth')->group(function(){
    Route::get('guru/index', 'GuruController@index');
    Route::get('guru/tambah', 'GuruController@tambah');
    Route::post('guru/simpan', 'GuruController@simpan');
    Route::get('guru/hapus/{id}', 'GuruController@hapus');
    Route::get('guru/edit/{id}','GuruController@edit');  
    Route::put('guru/update/{id}','GuruController@update');   
    
    Route::get('soal/index', 'SoalController@index');
    Route::get('soal/tambah', 'SoalController@tambah');
    Route::post('soal/simpan', 'SoalController@simpan');
    Route::get('soal/hapus/{id}', 'SoalController@hapus');
    Route::get('soal/edit/{id}','SoalController@edit');  
    Route::get('soal/download/{id}','SoalController@download');  
    Route::put('soal/update/{id}','SoalController@update');   

    Route::get('materi/index', 'MateriController@index');
    Route::get('materi/tambah', 'MateriController@tambah');
    Route::post('materi/simpan', 'MateriController@simpan');
    Route::get('materi/hapus/{id}', 'MateriController@hapus');
    Route::get('materi/edit/{id}','MateriController@edit');  
    Route::put('materi/update/{id}','MateriController@update'); 
    Route::get('materi/download/{id}','MateriController@download');  

    Route::get('jawab2/index', 'Jawab2Controller@index');
    Route::get('jawab2/hapus/{id}', 'Jawab2Controller@hapus');

    Route::get('nilai/index', 'NilaiController@index');
    Route::get('nilai/tambah/{kelas}', 'NilaiController@tambah');
    Route::get('nilai/cetak/{id}', 'NilaiController@cetak');
    Route::post('nilai/simpan', 'NilaiController@simpan');
    Route::get('nilai/detail/{id}', 'NilaiController@detail');
    Route::get('nilai/hapus/{id}', 'NilaiController@hapus');
    Route::get('nilai/edit/{id}','NilaiController@edit');  
    Route::put('nilai/update/{id}','NilaiController@update'); 
    Route::get('cities/ambil_kategori_mapel_id', 'NilaiController@ambil_kategori_mapel_id')->name('ambil_kategori_mapel_id');
    
});
Route::prefix('murid')->middleware('auth')->group(function(){
    Route::get('materi2/index', 'Materi2Controller@index');

    Route::get('informasi/index', 'InformasiController@index');

    Route::get('jawab/index', 'JawabController@index');
    Route::get('jawab/tambah', 'JawabController@tambah');
    Route::post('jawab/simpan', 'JawabController@simpan');
    Route::get('jawab/hapus/{id}', 'JawabController@hapus');
    Route::get('jawab/edit/{id}','JawabController@edit');  
    Route::put('jawab/update/{id}','JawabController@update');  
    Route::get('jawab/download/{id}','JawabController@download');  
    
    Route::get('tugas/index', 'TugasController@index');
    Route::get('tugas/tambah', 'TugasController@tambah');
    Route::post('tugas/simpan', 'TugasController@simpan');
    Route::get('tugas/hapus/{id}', 'TugasController@hapus');
    Route::get('tugas/edit/{id}','TugasController@edit');  
    Route::put('tugas/update/{id}','TugasController@update');  

    Route::get('soal2/index', 'Soal2Controller@index');
    
    Route::get('nilai2/index', 'Nilai2Controller@index');
    
});
Route::get('/', function () {	
    return view('welcome');
});


Auth::routes();

Route::get('/daftar', 'DaftarController@daftar')->name('daftar');
Route::get('/home', 'HomeController@index')->name('home');
