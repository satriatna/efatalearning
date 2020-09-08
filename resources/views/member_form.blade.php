@extends('layouts.front')
@section('content')
        <div class="col-md-9 mt-4">
            <div class="card">
                <div class="card-header">PENDAFTARAN MEMBER</div>
                <div class="card-body">
    {{ Form::model($member, array('action' => $action, 'files' => true, 'method' => $method)) }}
    <div class="form-group">
        {{ Form::label('nama', 'Nama Lengkap') }}
        {{ Form::text('nama',null,['class'=>'form-control','placeholder' => 'Nama Lengkap','autofocus']) }}
        <span class="text-danger">{{ $errors->first('nama') }}</span>
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {!! Form::email('email',null, ['class' => 'form-control','required']) !!}
        <span class="text-danger">{{ $errors->first('email') }}</span>
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {!! Form::password('password', ['class' => 'form-control','required']) !!}
        <span class="text-danger">{{ $errors->first('passwordc') }}</span>
    </div>    
    <div class="form-group">
        {{ Form::label('password_confirmation', 'Konfirmasi Password') }}
        {!! Form::password('password_confirmation', ['class' => 'form-control','required']) !!}
        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
    </div> 
    <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection
