@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">Edit KELAS</div>
                <hr>
                <div class="card-body">
                    {{ Form::model($obj, array('action' => $action, 'files' => true, 'method' => $method)) }}
                        <div class="form-group">
                            {{ Form::label('kelas', 'KELAS') }}
                            {{ Form::text('kelas',null,array('class'=>'form-control')) }}
                            <span class="text-danger">{{ $errors->first('kelas') }}</span>
                        </div>

                        <div class="form-group">
                        <div class="form-group">
                            {{ Form::label('mapel', 'MATA PELAJARAN') }}
                            <select name="mapel" id="mapel" class="form-control"> 
                                <option value="">~ Pilih Mapel ~</option>
                                @foreach($mapel as $value)
                                    @if($obj->mapel == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->nama}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->nama}}</option>
                                    @endif
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('mapel') }}</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('guru', 'GURU') }}
                            <select name="guru" id="guru" class="form-control"> 
                                <option value="">~ Pilih Guru ~</option>
                                @foreach($guru as $value)
                                    @if($obj->guru == $value->id)
                                    <option value="{{$value->id}}" selected>{{$value->name}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endif
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