@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">TAMBAH MATERI</div>
                <div class="card-body">
                    {{ Form::model($obj, array('action' => $action, 'files' => true, 'method' => $method)) }}
                        <div class="form-group">
                        <div class="form-group">
                            {{ Form::label('mapel', 'MATA PELAJARAN') }}
                            <select name="mapel" id="mapel" class="form-control"> 
                                <option value="">~ Pilih Mapel ~</option>
                                @foreach($mapel as $value)
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('mapel') }}</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('judul', 'JUDUL') }}
                            {{ Form::text('judul',null,['class' => 'form-control']) }}
                            <span class="text-danger">{{ $errors->first('judul') }}</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('kelas', 'KELAS') }}
                        <select name="kelas" id="kelas" class="form-control"> 
                            <option value="">~ Pilih Kelas ~</option>
                            @foreach($kelas as $value)
                                <option value="{{$value->id}}">{{$value->kelas}}</option>
                            @endforeach
                        </select>
                            <span class="text-danger">{{ $errors->first('kelas') }}</span>
                        </div>
                        <div class="form-group">
                            {{ Form::label('file', 'FILE TUGAS') }}
                            <span class="text-sm text-danger">| optional</span>
                            
                            {{ Form::file('file',null,['class' => 'form-control']) }}
                            <span class="text-danger">{{ $errors->first('file') }}</span>
                        </div>
                        <div class="form-group">
                            {{ Form::label('link', 'LINK TUGAS') }}
                            <span class="text-sm text-danger">| optional</span>
                            {{ Form::text('link',null,['class' => 'form-control']) }}
                            <span class="text-danger">{{ $errors->first('link') }}</span>
                        </div>

                        <button type="submit" class="btn btn-primary tombol">{{ $btn_submit }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection