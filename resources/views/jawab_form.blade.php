@extends('layouts.app')
@section('content')
<div class ="main">
    <div class ="main-content">
        <div class ="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-body">
                        <div class="card-header">KIRIM JAWABAN</div>
                        <hr>
                        <div class="card-body">
                            {{ Form::model($obj, array('action' => $action, 'files' => true, 'method' => $method)) }}
                            <div class="form-group">
                                {{ Form::label('name', 'NAMA MURID') }}
                                <input type="hidden" name="name" value="{{auth::user()->id}}" class="form-control">
                                <input type="text" name="nama_lengkap" value="{{auth::user()->name}}" class="form-control" readonly>
                                <span class="text-danger">{{ $errors->first('guru') }}</span>
                            </div>
        
                            <div class="form-group">
                                {{ Form::label('judul', 'JUDUL') }}
                                <select name="judul" id="judul" class="form-control" required> 
                                    <option value="">~ Pilih Judul ~</option>
                                    @foreach($judul as $value)
                                        <option value="{{$value->id}}"> {{$value->nama}} | {{$value->judul}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('judul') }}</span>
                            </div>
                                <div class="form-group">
                                    {{ Form::label('file', 'FILE TUGAS') }}
                                    <span class="text-sm text-danger">| optional</span>
                                    
                                    {{ Form::file('file',null,['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                </div>

                                <div class="form-group">
                                    {{ Form::label('jawaban', 'LINK JAWABAN') }} | optional</span>
                                    {{ Form::text('jawaban',null,['class' => 'form-control']) }}
                                    <span class="text-danger">{{ $errors->first('jawaban') }} </span>
                                    
                                </div>
                                
        
                                
        
                                
                                <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection