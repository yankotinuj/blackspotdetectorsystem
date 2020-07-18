@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 pb-3">
            <div class="card">
                <h5 class="card-header">Statistik Saya</h5>
                <div class="card-body">
                    <h5 class="card-title">ID Perangkat : <b>{{ Auth::user()->deviceid }}</b></h5>
                    <h5 class="card-title">Username : <b>{{ Auth::user()->username }}</b></h5>
                    <h1 class="card-text text-center display-3"><b>{{ $countUserStatistics }}</b></h2>
                    <p class="card-text">Anda telah melewati sebanyak {{ $countUserStatistics }} lokasi daerah rawan kecelakaan dengan kendaraan Anda.</p>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#StatisticsHistory">Lihat Riwayat</button> &nbsp;
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#StatisticsView">Lihat Statistik</button>
                </div>
            </div>
        </div>
        <div class="col-md-7 pb3">
            <div class="card">
                <h5 class="card-header">Grafik Statistik</h5>
                <div class="card-body">
                    {!! $statisticsChart->container() !!}
                </div>
            </div>
        </div>
    </div>   
</div>

<!-- Modal Lihat Riwayat -->
<div class="modal fade" id="StatisticsHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Riwayat Berkendara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
            @if ($countUserStatistics == 0)
                <div class="alert alert-primary" role="alert">
                    Tidak ada riwayat perjalanan melewati daerah rawan kecelakaan.
                </div>
            @else
                @foreach ($userStatistics as $statisticHistory)
                    <div class="row">
                        <div class="col-md pb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><b>{{ $statisticHistory->locationid }}</b></h5>
                                    <h6 class="card-subtitle mb-2"><b>Waktu : {{ $statisticHistory->created_at }}</b></h6>
                                    <p class="card-text">{{ $statisticHistory->alamat }}.</p>
                                    <a class="btn btn-success" role="button" href="{{ route('location-by-list-detail',$statisticHistory->locationid) }}">Lihat Lokasi</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if(!empty($errorMsg))
                    <div class="alert alert-danger"> {{ $errorMsg }}</div>
                @endif
            @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Lihat Statistik -->
<div class="modal fade" id="StatisticsView" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Riwayat Berkendara</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
            @if ($countUserStatistics == 0)
                <div class="alert alert-primary" role="alert">
                    Tidak ada statistik perjalanan melewati daerah rawan kecelakaan.
                </div>
            @else
                @foreach ($userStatistics as $statisticHistory)

                <style>
                    .card-header .fa {
                    transition: .3s transform ease-in-out;
                    }
                    .card-header .collapsed .fa {
                    transform: rotate(90deg);
                    }
                </style>

                    <div class="row">
                        <div class="col-md pb-3">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h5 class="card-title"><b>
                                        <a data-toggle="collapse" href="#collapse-statisticHistory{{ $statisticHistory->id }}" aria-expanded="true" aria-controls="collapse-statisticHistory{{ $statisticHistory->id }}" class="collapsed d-block">
                                        <i class="fa fa-chevron-down pull-right" aria-hidden="true"></i>
                                        {{ $statisticHistory->locationid }}
                                        </a>
                                    </b></h5>
                                    <h6 class="card-subtitle"><b>Waktu : {{ $statisticHistory->created_at }}</b></h6>
                                </div>
                                <!-- Collapse Untuk Data Statistik -->
                                <div id="collapse-statisticHistory{{ $statisticHistory->id }}" class="collapse" aria-labelledby="heading-example">
                                    <div class="card-body">
                                        <p class="card-text mt-2">{{ $statisticHistory->alamat }}.</p>
                                        <h6 class="card-subtitle mb-2 text-center"><b>Kecepatan Anda</b></h6>

                                        <!--Bagian Card Untuk Rata-rata kecepatan-->
                                        <div class="row justify-content-center pb-3">
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="card-title">1500 M</h6>
                                                        <h1 class="card-text text-center display-5"><b>{{ $statisticHistory->spd_1500m }}</b></h2>
                                                        <p class="card-text text-center">KM/Jam</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="card-title">1000 M</h6>
                                                        <h1 class="card-text text-center display-5"><b>{{ $statisticHistory->spd_1000m }}</b></h2>
                                                        <p class="card-text text-center">KM/Jam</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="card-title">500 M</h6>
                                                        <h1 class="card-text text-center display-5"><b>{{ $statisticHistory->spd_500m }}</b></h2>
                                                        <p class="card-text text-center">KM/Jam</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h6 class="card-title">10 M</h6>
                                                        <h1 class="card-text text-center display-5"><b>{{ $statisticHistory->spd_10m }}</b></h2>
                                                        <p class="card-text text-center">KM/Jam</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Akhir Bagian Card Untuk Rata-rata kecepatan-->
                                        
                                        <a class="btn btn-success" role="button" data-toggle="collapse" href="#collapse-showChart{{ $statisticHistory->id }}" aria-expanded="true" aria-controls="collapse-showChart{{ $statisticHistory->id }}">Tampilkan Grafik</a>                            
                                    </div>
                                    <div id="collapse-showChart{{ $statisticHistory->id }}" class="collapse" aria-labelledby="heading-example">
                                        <div class="card-footer">
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
                                            
                                            <canvas id="showChart{{ $statisticHistory->id }}" height="250"></canvas>

                                            <!--Untuk Menampilkan Grafik-->
                                            <script>
                                                var ctx = document.getElementById('showChart{{ $statisticHistory->id }}').getContext('2d');
                                                var chart = new Chart(ctx, {
                                                    type: 'horizontalBar',
                                                    data: {
                                                        labels: ['Jarak 1500 M', 'Jarak 1000 M', 'Jarak 500 M', 'Jarak 10 M'],
                                                        datasets: [{
                                                            label: 'Kecepatan dalam KM/J',
                                                            backgroundColor: 'rgba(52, 144, 220, 0.5)',
                                                            borderColor: 'rgba(52, 144, 220, 0.5)',
                                                            borderWidth: 2,
                                                            data: [{{ $statisticHistory->spd_1500m }}, {{ $statisticHistory->spd_1000m }}, {{ $statisticHistory->spd_500m }}, {{ $statisticHistory->spd_10m }}]
                                                        }]
                                                    },
                                                    options: {
                                                        title: {
                                                        display: true,
                                                        text: 'Kecepatan Berkendara Anda Saat Melewati Lokasi ID : {{ $statisticHistory->locationid }}'
                                                        },
                                                        responsive: true,
                                                        scales: {
                                                            xAxes: [{
                                                                ticks: {
                                                                beginAtZero: true,
                                                                maxRotation: 90,
                                                                minRotation: 80
                                                                }
                                                            }]
                                                        }
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if(!empty($errorMsg))
                    <div class="alert alert-danger"> {{ $errorMsg }}</div>
                @endif
            @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
{!! $statisticsChart->script() !!}
@endsection