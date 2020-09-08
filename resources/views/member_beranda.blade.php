@extends('layouts.murid')
@section('content')
        <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header">DASHBOARD</div>
                <div class="card-body">
                        SELAMAT DATANG {{ \Auth::guard('member')->user()->nama }}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('admin/guru/index', []) }}">Data Guru</a>
                        </li>
                </div>
            </div>
        </div>
@endsection
