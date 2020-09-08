@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">Data Latihan</div>
                <hr>
                <div class="card-body">
                        
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>MATA PELAJARAN</th>
                                <th>JUDUL</th>
                                <th>KELAS</th>
                                <th>PERINTAH</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obj as $item)
                            <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->mapel }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td><a href="{{ url($item->file) }}">DOWNLOAD</a>
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
