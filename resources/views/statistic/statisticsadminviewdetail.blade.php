@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 pb-3">
            <div class="card">
                <h5 class="card-header">Statistik Pengguna : <b>{{ $user->deviceid }} ({{ $user->username }})</b></h5>
                <div class="card-body">
                    <h5 class="card-title">Riwayat Pengguna Melewati Daerah Rawan Kecelakaan<b></b></h5>
                        <div class="card">
                            <div class="card-body">
                                @foreach($selectedUserStatistics as $userStat)
                                    <h5 class="card-title"><b>{{ $userStat->locationid }}</b></h5>
                                    <h6 class="card-subtitle mb-2"><b>Waktu : {{ $userStat->created_at }}</b></h6>
                                    <p class="card-text">{{ $userStat->alamat }}.</p>
                                    <p class="card-text text-center"><b>Kecepatan Pengendara</b></p>
                                    <div class="row justify-content-center pb-3">
                                            
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title">1500 M</h6>
                                                    <h2 class="card-text text-center display-5"><b>{{ $userStat->spd_1500m }}</b></h2>
                                                    <p class="card-text text-center">KM/Jam</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title">1000 M</h6>
                                                    <h2 class="card-text text-center display-5"><b>{{ $userStat->spd_1000m }}</b></h2>
                                                    <p class="card-text text-center">KM/Jam</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row justify-content-center pb-3">

                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title">500 M</h6>
                                                    <h2 class="card-text text-center display-5"><b>{{ $userStat->spd_500m }}</b></h2>
                                                    <p class="card-text text-center">KM/Jam</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title">10 M</h6>
                                                    <h2 class="card-text text-center display-5"><b>{{ $userStat->spd_10m }}</b></h2>
                                                    <p class="card-text text-center">KM/Jam</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <a class="btn btn-success" role="button" href="{{ route('location-by-list-detail-admin',$userStat->locationid) }}">Lihat Lokasi</a>
                                    <a class="btn btn-danger" role="button" href="{{ url()->previous() }}">Kembali</a>
                                @endforeach
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 pb3">
            <div class="card">
                <h5 class="card-header">Grafik Statistik Pengguna : <b>{{ $user->deviceid }} ({{ $user->username }})</b></h5>
                <div class="card-body">

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
               
                    <canvas id="chartUserStatistics" height="230"></canvas>

                    <!--Untuk Menampilkan Grafik-->
                    <script>
                        var ctx = document.getElementById('chartUserStatistics').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'horizontalBar',
                            data: {
                                labels: ['Jarak 1500 M', 'Jarak 1000 M', 'Jarak 500 M', 'Jarak 10 M'],
                                datasets: [{
                                    label: 'Kecepatan dalam KM/J',
                                    backgroundColor: 'rgba(56, 193, 114, 0.5)',
                                    borderColor: 'rgba(56, 193, 114, 0.5)',
                                    borderWidth: 2,
                                    data: [{{ $userStat->spd_1500m }}, {{ $userStat->spd_1000m }}, {{ $userStat->spd_500m }}, {{ $userStat->spd_10m }}]
                                }]
                            },
                            options: {
                                title: {
                                display: true,
                                text: 'Kecepatan Pengguna : {{ $user->deviceid }} ({{ $user->username }}) Saat Melintasi {{ $userStat->locationid }}'
                                },
                                responsive: true,
                                scales: {
                                    xAxes: [{
                                        ticks: {
                                        beginAtZero: true
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

@endsection