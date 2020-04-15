@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Detail Lokasi Daerah Rawan Kecelakaan</h4>
    <h5><b>ID Lokasi : {{$detailLocations->locationid}}</b></h5>
    <div class="card">
        <div class="card-body">
            <div class="row px-3">
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Alamat</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$locations->alamat}}</b></h5>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Jumlah Kejadian</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$detailLocations->kejadian}}</b></h5>
                    </div>
                </div>
            </div>

            <div class="row px-3 pt-3">
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Jumlah Meninggal Dunia</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$detailLocations->meninggaldunia}}</b></h5>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Jumlah Luka Berat</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$detailLocations->lukaberat}}</b></h5>
                    </div>
                </div>
            </div>

            <div class="row px-3 pt-3">
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Jumlah Luka Ringan</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$detailLocations->lukaringan}}</b></h5>
                    </div>
                </div>
                <div class="col-sm-4">
                <div class="row">
                        <h6>Koefisien</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$detailLocations->koefisien}}</b></h5>
                    </div>
                </div>
            </div>

            <div class="row px-3 pt-3">
                <div class="col-sm-4">
                    <div class="row">
                        <a class="btn btn-danger text-white" href="{{ route('location-by-list') }}" role="button">Kembali</a> &nbsp;
                        <a class="btn btn-info text-white" href="https://www.google.com/maps/place/{{$locations->lat}},{{$locations->lng}}" target="_blank" role="button">Lihat di Google Maps</a>
                    </div>
                </div>
                <div class="col-sm-4">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection