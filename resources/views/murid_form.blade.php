@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">TAMBAH MURID</div>
                <div class="card-body">
                    {{ Form::model($obj, array('action' => $action, 'files' => true, 'method' => $method)) }}
                        <div class="form-group">
                            {{ Form::label('name', 'NAMA MURID') }}
                            {{ Form::text('name',null,['class' => 'form-control']) }}
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'EMAIL ') }}
                            {{ Form::text('email',null,['class' => 'form-control']) }}
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('level', 'LEVEL ') }}
                            <select name ="level" class="form-control" >
                                <option value="Admin">admin</option>
                                <option value="Guru">guru</option>
                                <option value="Murid">murid</option>
                            </select>
                            <span class="text-danger">{{ $errors->first('level') }}</span>
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'PASSWORD ') }}
                            {{ Form::text('password',null,['class' => 'form-control']) }}
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ $btn_submit }}</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection