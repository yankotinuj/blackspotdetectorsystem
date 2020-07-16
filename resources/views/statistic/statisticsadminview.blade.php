@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 pb-3">
            <div class="card">
                <h5 class="card-header">Statistik Pengguna : <b>{{ $user->deviceid }} ({{ $user->username }})</b></h5>
                <div class="card-body">
                    <h5 class="card-title">Riwayat Pengguna Melewati Daerah Rawan Kecelakaan<b></b></h5>
                    @if ($countUserStatistics == 0)
                        <div class="alert alert-primary" role="alert">
                            Tidak ada riwayat perjalanan melewati daerah rawan kecelakaan.
                        </div>
                    @else
                        <form>
                            <div class="form-group">
                                <label for="selectLocID">Pilih ID Lokasi</label>
                                <select id="selectLocID" class="form-control">
                                    <option value="#">ID Lokasi</option>
                                @foreach ($userStatistics as $stat)
                                    <option value="{{ route('statistics-admin-view-detail',[$user->deviceid,$stat->locationid]) }}">
                                        {{ $stat->locationid }} ({{ $stat->created_at }})
                                    </option>
                                @endforeach
                                </select>
                            </div>
                            <a id="viewStatistic" href="#" class="btn btn-success" role="button">
                            Lihat Riwayat
                            </a> &nbsp;
                            <a class="btn btn-danger" href="{{ route('statistics-admin') }}" role="button">Kembali</a>

                            <script>
                                $("#selectLocID").change(function () {
                                    console.log(this.value);
                                    $("#viewStatistic").attr('href', this.value);
                                });
                            </script>
                        
                        </form>
                    @endif
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
                                    data: [{{ $avgSpeed1500m }}, {{ $avgSpeed1000m }}, {{ $avgSpeed500m }}, {{ $avgSpeed10m }}]
                                }]
                            },
                            options: {
                                title: {
                                display: true,
                                text: 'Rata-rata Kecepatan Pengguna : {{ $user->deviceid }} ({{ $user->username }})'
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