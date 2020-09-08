@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">Data Jadwal</div>
                <hr>
                <div class="card-body">
                        <a href="{{ url('admin/jadwal/tambah', []) }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> &nbsp;&nbsp; Tambah Jadwal</a>
                <hr>
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>HARI </th>
                                <th>JAM</th>
                                <th>KELAS</th>
                                <th>MATA PELAJARAN</th>
                                <th>GURU</th>
                                <th>PERINTAH</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obj as $item)
                            <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->hari }}</td>
                                    <td>{{ $item->jam }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->name}}</td>
                                    
                                    <td>  <a href="{{ url('admin/jadwal/edit/'.$item->id) }}" class="btn btn-info btn-sm" ><i class="fa fa-edit"></i> Edit</a>
                                        <a href="{{ url('admin/jadwal/hapus/'.$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin?')" ><i class="fa fa-trash-o"></i> Hapus </a>
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
