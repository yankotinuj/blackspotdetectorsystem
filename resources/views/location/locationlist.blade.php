@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Lokasi Daerah Rawan Kecelakaan</h4>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#">Daftar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('location-by-maps') }}">Peta</a>
        </li>
    </ul>

    <div class="card my-3">
        <div class="card-body">
            <div class="row px-3">
                @if(Auth::user()->username == 'admin')
                <div class="col-sm-4 pb-2 pt-2">
                    <a class="btn btn-primary btn-block" href="{{ route('add-location') }}" role="button">Tambah Lokasi</a>
                </div>
                <div class="col-sm-4 pb-2 pt-2">
                    <a class="btn btn-primary btn-block" href="{{ route('location-added-by-user') }}" role="button">
                        Permintaan Tambah Lokasi <span class="badge badge-danger">{{$totallocationadded}}</span>
                    </a>
                </div>
                <div class="col-sm-4 pb-2 pt-2">
                    <a class="btn btn-primary btn-block" href="{{ route('location-manage') }}" role="button">
                        Kelola Lokasi
                    </a>
                </div>
                @else
                <div class="col-sm-4 pb-2 pt-2">
                    <a id ="addLocation" class="btn btn-primary btn-block" href="{{ route('add-location') }}">Tambah Lokasi</a>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Daftar Lokasi</h4>
            <div class="table-responsive">
                <table class="card-table table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Lokasi</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Longitude</th>
                            <th style="width: 50%" scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($locations as $lokasi)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$lokasi->locationid}}</td>
                            <td>{{$lokasi->lat}}</td>
                            <td>{{$lokasi->lng}}</td>
                            <td>{{$lokasi->alamat}}</td>
                            <td>
                            @if(Auth::user()->username == 'admin')
                                <a class="btn btn-success" role="button" href="{{ route('location-manage-detail',$lokasi->locationid) }}">Detail</a> &nbsp;
                            @else
                                <a class="btn btn-success" role="button" href="{{ route('location-by-list-detail',$lokasi->locationid) }}">Detail</a> &nbsp;
                            @endif 
                                <a class="btn btn-primary" role="button" href="https://www.google.com/maps/place/{{$lokasi->lat}},{{$lokasi->lng}}" target="_blank">Lihat</a>
                            </td>
                        </tr>
                        @endforeach
                        @if(!empty($errorMsg))
                            <div class="alert alert-danger"> {{ $errorMsg }}</div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#addLocation").on('click', function(e){
                e.preventDefault();

                var href = $(this).attr('href');

                swal(
                    {
                        title: "Perhatian!",
                        text: "Bijaklah dalam menambahkan lokasi daerah rawan kecelakaan. Pastikan lokasi yang akan ditambahkan benar-benar merupakan daerah rawan kecelakaan yang memang belum tersimpan pada Aplikasi Blackspot Detector System.",
                        icon: "warning",
                        buttons: {
                                    cancel: "Kembali",
                                    confirm: "Lanjutkan",
                                },
                        closeOnClickOutside: false,
                        closeOnEsc: false,
                })
                .then((willGoToAddLocationPage) => {
                    if (willGoToAddLocationPage)
                    {
                        window.location.href = href;
                    }
                    else
                    {
                        swal("Aksi Dibatalkan!", "Anda batal untuk menambahkan lokasi baru.", "info");
                    }
                });
            });
        });
    </script>

    <!-- Modal -->
    <!--
    <div class="modal fade" id="modalTambahLokasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><b>Perhatian</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Bijaklah dalam menambahkan lokasi daerah rawan kecelakaan. Pastikan lokasi yang akan ditambahkan benar-benar merupakan daerah rawan kecelakaan yang memang belum tersimpan pada Aplikasi Blackspot Detector System.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
                    <a href="{{ route('add-location') }}" role="button" class="btn btn-primary btn-block">Lanjutkan</a>
                </div>
            </div>
        </div>
    </div>
    -->

</div>
@endsection