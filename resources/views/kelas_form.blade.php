@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">TAMBAH KELAS</div>
                <hr>
                <div class="card-body">
                    {{ Form::model($obj, array('action' => $action, 'files' => true, 'method' => $method)) }}
                        <div class="form-group">
                            {{ Form::label('kelas', 'KELAS') }}
                            {{ Form::text('kelas',null,array('class'=>'form-control')) }}
                            <span class="text-danger">{{ $errors->first('kelas') }}</span>
                        </div>

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
                            {{ Form::label('guru', 'GURU') }}
                            <select name="guru" id="guru" class="form-control"> 
                                <option value="">~ Pilih Guru ~</option>
                                @foreach($guru as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('guru') }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary tombol">{{ $btn_submit }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection