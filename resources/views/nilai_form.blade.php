@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                <div class="card-header">MASUKKAN NILAI ( Kelas {{$nama_kelas->kelas}}  ) </div>
                <hr>
                <div class="card-body">
                    {{ Form::model($obj, array('action' => $action, 'files' => true, 'method' => $method)) }}
                        <div class="form-group">
                            {{ Form::label('murid', 'NAMA MURID') }}
                            <select name="murid" id="murid" class="form-control" required>
                                <option value="">~ Pilih Murid ~</option>
                                @foreach($murid as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </select>
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    </div>

                    <div class="form-group">
                        {{ Form::label('judul', 'JUDUL TUGAS') }}
{!! Form::select('judul', \App\soal::pluck('judul','judul'), null, ['class' => 'form-control']) !!}
                        <span class="text-danger">{{ $errors->first('judul') }}</span>
                    </div>

                        <div class="form-group">
                            {{ Form::label('nilai', 'NILAI') }}
                            {{ Form::text('nilai',null,['class' => 'form-control']) }}
                            <span class="text-danger">{{ $errors->first('nilai') }}</span>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm tombol">{{ $btn_submit }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection