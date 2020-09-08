@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">Data Jawaban</div>
                <hr>
                <div class="card-body">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA </th>
                                <th>JUDUL</th>
                                <th>LINK JAWABAN</th>
                                <th>File Lampiran</th>
                                <th>PERINTAH</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obj as $item)
                            <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->judul }}</td>
                                    
                                    <td><a target="_blank" href="{{$item->jawaban}}">{{$item->jawaban}}</a>
                                    <td><a href="/murid/jawab/download/{{$item->id}}">{{ $item->file }}</a></td>
                                    
                                    
                                    <td> 
                                        <a href="{{ url('murid/jawab/hapus/'.$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin?')" ><i class="fa fa-trash-o"></i> Hapus </a>
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
