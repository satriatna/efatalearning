@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
        @if ($alert = Session::get('alert'))
              <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $alert }}</strong>
              </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">Data Tugas</div>
                <hr>
                <div class="card-body">
                        <a href="{{ url('murid/jawab/tambah', []) }}" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i>
                        &nbsp;&nbsp;Upload Tugas</a>
                        <hr>
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
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
                                    <td>{{ $item->judul }}</td>
                                    
                                    <td><a target="_blank" href="{{$item->jawaban}}">{{$item->jawaban}}</a>
                                    <td><a href="/murid/jawab/download/{{$item->id}}">{{ $item->file }}</a></td>
                                    
                                    <td> 
                                        <a href="{{ url('murid/jawab/hapus/'.$item->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin?')" ><i class="fa fa-trash-o"></i>  Hapus </a>
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
</div>

@endsection
