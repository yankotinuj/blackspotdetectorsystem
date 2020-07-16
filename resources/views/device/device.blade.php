@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Perangkat yang digunakan</h4>
    <div class="card">
        <div class="card-body">
            <div class="row px-3">
                <div class="col-sm-4">
                    <div class="row">
                        <h6>ID Perangkat</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$devices->deviceid}}</b></h5>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Nama Perangkat</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$devices->devicename}}</b></h5>
                    </div>
                </div>
            </div>

            <div class="row px-3 pt-3">
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Versi Perangkat</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$devices->deviceversion}}</b></h5>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Kode Perangkat</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$devices->devicecode}}</b></h5>
                    </div>
                </div>
            </div>

            <div class="row px-3 pt-3">
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Mikrokontroler Perangkat</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$devices->devicemicrocontroller}}</b></h5>
                    </div>
                </div>
                <div class="col-sm-4">
                <div class="row">
                        <h6>Detail Perangkat</h6>
                    </div>
                    <div class="row">
                        <h5><b><a href="{{$devices->deviceurl}}" target="_blank">Kunjungi Link</a></b></h5>
                    </div>
                </div>
            </div>

            <div class="row px-3 pt-3">
                <div class="col-sm-4">
                    <div class="row">
                    <a class="btn btn-danger" href="{{ url()->previous() }}" role="button">Kembali</a>
                    </div>
                </div>
                <div class="col-sm-4">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection