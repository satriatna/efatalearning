@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">Data Materi</div>
                <hr>
                <div class="card-body">
                        
                    <table class="table" id="example">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>MATA PELAJARAN</th>
                                <th>JUDUL</th>
                                <th>KELAS</th>
                                <th>LINK</th>
                                <th>FILE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obj as $item)
                            <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td><a target="_blank" href="{{$item->link}}">{{$item->link}}</a>
                                    <td><a href="/guru/materi/download/{{$item->id}}">{{ $item->file }}</a></td>
                                    
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
