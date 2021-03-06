@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pb-3">
        
        <div class="col-md-6 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Quick Info</b></h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Username : <b>{{$users->username}}</b></li>
                        <li class="list-group-item">ID Device : <b>{{$users->deviceid}}</b></li>
                        <li class="list-group-item">Perangkat : <b>{{$device->devicename}} {{$device->deviceversion}}</b></li>
                    </ul>
                </div>
                
            </div>
        </div>
        
        <div class="col-md-6 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Daerah Rawan Kecelakaan</b></h5>
                    <h1 class="card-text text-center display-3"><b>{{ $totallocationadded }}</b></h2>
                    <p class="card-text text-center">Lokasi daerah rawan kecelakaan yang tersebar.</p>
                    <a class="btn btn-primary" role="button" href="{{ route('location-by-list') }}" class="card-link">Lihat Lebih Lanjut</a>
                </div>
            </div>
        </div>
        
    </div>
    <div class="row justify-content-center">
        
        <div class="col-md-6 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Jumlah Melewati Lokasi Daerah Rawan Kecelakaan</b></h5>
                    <h1 class="card-text text-center display-3"><b>{{ $countUserStatistics }}</b></h2>
                    <p class="card-text text-center">Anda telah melewati sebanyak {{ $countUserStatistics }} lokasi daerah rawan kecelakaan dengan kendaraan Anda.</p>
                    <a class="btn btn-primary" role="button" href="{{ route('statistics') }}" class="card-link">Lihat Lebih Lanjut</a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Rata-rata Kecepatan Berkendara</b></h5>
                    <!--Bagian Card Untuk Rata-rata kecepatan-->
                        <div class="row justify-content-center pb-3">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">1500 M</h6>
                                        <h1 class="card-text text-center display-5"><b>{{ $avgSpeed1500m }}</b></h2>
                                        <p class="card-text text-center">KM/Jam</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">1000 M</h6>
                                        <h1 class="card-text text-center display-5"><b>{{ $avgSpeed1000m }}</b></h2>
                                        <p class="card-text text-center">KM/Jam</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">500 M</h6>
                                        <h1 class="card-text text-center display-5"><b>{{ $avgSpeed500m }}</b></h2>
                                        <p class="card-text text-center">KM/Jam</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="card-title">10 M</h6>
                                        <h1 class="card-text text-center display-5"><b>{{ $avgSpeed10m }}</b></h2>
                                        <p class="card-text text-center">KM/Jam</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!--Akhir Bagian Card Untuk Rata-rata kecepatan-->
                    <p class="card-text text-center">Kecepatan diatas merupakan kecepatan rata-rata Anda yang sudah dibulatkan ketika sedang melewati daerah rawan kecelakaan.</p>
                    <a class="btn btn-primary" role="button" href="{{ route('statistics') }}" class="card-link">Lihat Lebih Lanjut</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
