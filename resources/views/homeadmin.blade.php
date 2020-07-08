@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pb-3"> 
        
        <div class="col-md-6 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Pengguna Blackspot Detector System</b></h5>
                    <h1 class="card-text text-center display-3"><b>{{ $countUsers }}</b></h2>
                    <p class="card-text text-center">Terdapat {{ $countUsers }} akun yang menggunakan Blackspot Detector System.</p>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#usersBlackspotDetectorSystem">
                        Tampilkan
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-6 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Perangkat Blackspot Detector System</b></h5>
                    <h1 class="card-text text-center display-3"><b>{{ $countDevices }}</b></h2>
                    <p class="card-text text-center">Terdapat {{ $countDevices }} perangkat Blackspot Detector System yang pengguna.</p>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#devicesBlackspotDetectorSystem">
                        Tampilkan
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal Pengguna Blackspot Detector System -->
        <div class="modal fade" id="usersBlackspotDetectorSystem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Daftar Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if ($countUsers == 0)
                            <div class="alert alert-primary" role="alert">
                                Tidak ada pengguna Blackspot Detector System.
                            </div>
                        @else
                            @foreach ($users as $pengguna)
                                <div class="row">
                                    <div class="col-md pb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{ $pengguna->name }}</b></h5>
                                                <h6 class="card-subtitle mb-2"><b>Username : {{ $pengguna->username }}</b></h6>
                                                <h6 class="card-subtitle mb-2"><b>Device ID : {{ $pengguna->deviceid }}</b></h6>
                                                <a class="btn btn-success" role="button" href="{{ route('viewuserprofile',$pengguna->username) }}">Lihat Pengguna</a>
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
        <!---------------------------------------------->

        <!-- Modal Perangkat Blackspot Detector System -->
        <div class="modal fade" id="devicesBlackspotDetectorSystem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Daftar Perangkat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if ($countDevices == 0)
                            <div class="alert alert-primary" role="alert">
                                Tidak ada perangkat Blackspot Detector System yang digunakan oleh pengguna.
                            </div>
                        @else
                            @foreach ($devices as $perangkat)
                                <div class="row">
                                    <div class="col-md pb-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title"><b>{{ $perangkat->deviceid }}</b></h5>
                                                <h6 class="card-subtitle mb-2"><b>Mikrokontroler : {{ $perangkat->devicename }} {{ $perangkat->deviceversion }}</b></h6>
                                                <h6 class="card-subtitle mb-2"><b>Microchip : {{ $perangkat->devicemicrocontroller }}</b></h6>
                                                <h6 class="card-subtitle mb-2"><b>Pengguna : {{ $perangkat->username }}</b></h6>
                                                <a class="btn btn-success" role="button" href="{{ route('viewdevice',$pengguna->deviceid) }}">Lihat Device</a>
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
        <!----------------------------------------------->

    </div>

    <div class="row justify-content-center pb-3">
        
        <div class="col-md-6 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Daerah Rawan Kecelakaan</b></h5>
                    <h1 class="card-text text-center display-3"><b>{{ $totallocation }}</b></h2>
                    <p class="card-text text-center">Lokasi daerah rawan kecelakaan yang tersebar.</p>
                    <!-- Bagian Untuk Memisahkan Lokasi yang terverifikasi dan belum terverifikasi -->
                    <div class="row justify-content-center pb-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title text-center"><b>Lokasi Terverifikasi</b></h6>
                                    <h1 class="card-text text-center display-5"><b>{{ $totallocationverified }}</b></h2>
                                    <a class="btn btn-success" role="button" href="{{ route('location-by-list') }}" class="card-link">Lihat Lokasi</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title text-center"><b>Lokasi Belum Diverifikasi</b></h6>
                                    <h1 class="card-text text-center display-5"><b>{{ $totallocationnotverified }}</b></h2>
                                    @if ($totallocationnotverified !== 0)
                                        <a class="btn btn-success" role="button" href="{{ route('location-added-by-user') }}" class="card-link">Lihat Lokasi</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 pb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><b>Statistik Pengguna</b></h5>
                    <h1 class="card-text text-center display-3"><b>{{ $countStatistics }}</b></h2>
                    <p class="card-text text-center">Jumlah semua pengguna melewati daerah rawan kecelakaan.</p>
                    <!-- Bagian Untuk Memisahkan Lokasi yang terverifikasi dan belum terverifikasi -->
                    <div class="row justify-content-center pb-3">
                        <div class="col-md">
                            <div class="card">
                                <div class="card-body">
                                    
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
               
                                    <canvas id="chartUserStatistics" height="300"></canvas>

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
                                                    data: [{{ $avgSpeed1500m }}, {{ $avgSpeed1000m }}, {{ $avgSpeed500m }}, {{ $avgSpeed10m }}]
                                                }]
                                            },
                                            options: {
                                                title: {
                                                display: true,
                                                text: 'Rata-rata Kecepatan Berkendara Pengguna'
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
                    <a class="btn btn-success" role="button" href="{{ route('statistics-admin') }}" class="card-link">Lihat Statistik</a>
                </div>
            </div>
        </div>
        
    </div>
    
</div>
@endsection
