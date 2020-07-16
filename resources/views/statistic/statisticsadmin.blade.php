@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5 pb-3">
            <div class="card">
                <h5 class="card-header">Statistik Pengguna</h5>
                <div class="card-body">
                    <h5 class="card-title">Pilih ID Perangkat untuk Melihat Statistik Pengguna<b></b></h5>
                    <form>
                        <div class="form-group">
                            <label for="selectdeviceid">Pilih ID Perangkat</label>
                            <select id="selectdeviceid" class="form-control">
                                <option value="#">ID Perangkat Pengguna</option>
                            @foreach ($devices as $device)
                                <option value="{{ route('statistics-admin-view',$device->deviceid) }}">
                                    {{ $device->deviceid }} ({{ $device->username }})
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <a id="viewStatistic" class="btn btn-success" role="button" href="#">Lihat Riwayat</a>

                        <script>
                            $("#selectdeviceid").change(function () {
                                console.log(this.value);
                                $("#viewStatistic").attr('href', this.value);
                            });
                        </script>
                    
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7 pb3">
            <div class="card">
                <h5 class="card-header">Grafik Statistik Pengguna</h5>
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
</div>

@endsection