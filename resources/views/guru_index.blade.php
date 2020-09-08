@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                
                <div class="card-header">Data Guru</div>
                <hr>
                <div class="card-body">
                    <a href="{{ url('admin/guru/tambah', []) }}" class="btn btn-primary btn-sm" ><i class="fa fa-plus-square"></i> &nbsp;&nbsp;Tambah Guru</a>
                        
                <hr>
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAMA GURU</th>
                                <th>EMAIL</th>
                                <th>PERINTAH</th>
                            </tr>
                        </thead>
                        <tbody>   
                            @foreach ($obj as $item)
                            <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>  
                                        <a href="{{ url('admin/guru/hapus/'.$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin?')" ><i class="fa fa-trash-o"></i> Hapus </a>
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
