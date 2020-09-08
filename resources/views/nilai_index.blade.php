@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">Data Kelas</div>
                <div class="card-body">
                <hr>
                    <table class="table" id="example">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Kelas</th>
                                <th>Pilih Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($obj as $item)
                            <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td scope="row">{{ $item->kelas }}</td>
                                    <td> 
                                        <a href="{{ url('guru/nilai/detail/'.$item->id) }}" class="btn btn-primary btn-sm"> Pilih Kelas </a>
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
