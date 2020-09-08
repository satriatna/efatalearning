@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">Nilai</div>
                <hr>
                <div class="card-body">
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>MATA PELAJARAN</th>
                                <th>JUDUL</th>
                                <th>NILAI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obj as $item)
                            <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>
                                    {{ DB::table('soals')->where('judul', $item->judul)->join('mapels','soals.mapel','=','mapels.id')->first()->nama}}
                                    {{ $item->name }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->nilai}}</td>
                                    
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
