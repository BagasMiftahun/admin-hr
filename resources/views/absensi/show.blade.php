@extends('absensi.layout')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 margin-tb">
            <div style="text-align: center;">
                <h4>Show Absensi</h4>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('absensi-index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row" style="margin-top: 20px;text-align: center;">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong><br>
                {{ $absensi->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
            <div class="form-group">
                <strong>Waktu:</strong><br>
                {{ $absensi->waktu }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
            <div class="form-group">
                <strong>Jabatan:</strong><br>
                {{ $absensi->jabatan }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" style="margin-top: 20px;">
            <div class="form-group">
                <strong>QR:</strong><br>
                <img src="/images/{{ $absensi->qr }}" width="200px">
            </div>
        </div>
    </div>
@endsection
