@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title ">Informasi</h3>
                            
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped" id="example">
                                <thead>
                                    <tr>
                                    <th>NO</th>
                                    <th>HARI</th>
                                    <th>JAM</th>
                                    <th>KELAS</th>
                                    <th>MATA PELAJARAN</th>
                                    <th>GURU</th>
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
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
