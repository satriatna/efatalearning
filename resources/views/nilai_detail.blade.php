@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">Data Nilai ( Kelas {{$nama_kelas->kelas}} ) </div>
                <hr>
                <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="/guru/nilai/tambah/{{$kelas}}" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Tambah Nilai</a>
                        <a href="/guru/nilai/cetak/{{$nama_kelas->id}}" class="btn btn-primary btn-sm"><i class="fa fa-download"></i>&nbsp;&nbsp; Cetak Nilai</a>
                    </div>
                </div>
                <hr>
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA MURID</th>
                                <th>JUDUL</th>
                                <th>NILAI</th>
                                <th>PERINTAH</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nilai as $item)
                            <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->nilai}}</td>
                                    <td> 
                                        <a href="{{ url('guru/nilai/hapus/'.$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin?')" ><i class="fa fa-trash-o"></i> Hapus </a>
                                    </td>
                                    
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
