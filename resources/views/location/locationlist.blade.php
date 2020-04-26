@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Lokasi Daerah Rawan Kecelakaan</h4>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" href="#">Daftar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Peta</a>
        </li>
    </ul>

    <div class="card my-3">
        <div class="card-body">
            <div class="row px-3">
                @if($users->username == 'admin')
                <div class="col-sm-4">
                    <a class="btn btn-info btn-block text-white" href="{{ route('add-location') }}" role="button">Tambah Lokasi</a>
                </div>
                <div class="col-sm-4">
                    <a class="btn btn-info btn-block text-white" href="#" role="button">Daftar Permintaan Tambah Lokasi</a>
                </div>
                @endif
                <div class="col-sm-4">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-info btn-block text-white" data-toggle="modal" data-target="#modalTambahLokasi">
                        Tambah Lokasi
                    </button>
                </div>
                <div class="col-sm-4">

                </div>
            </div>
        </div>
    </div>
    

    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ID Lokasi</th>
                <th scope="col">Latitude</th>
                <th scope="col">Longitude</th>
                <th scope="col">Alamat</th>
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
                    <a class="text-white btn btn-success" role="button" href="/dashboard/location/by-list/{{$lokasi->locationid}}">Detail</a> &nbsp;
                    <a class="btn btn-light" role="button" href="https://www.google.com/maps/place/{{$lokasi->lat}},{{$lokasi->lng}}" target="_blank">Lihat</a> &nbsp;
                    @if($users->username == 'admin')
                    <a class="text-white btn btn-info" role="button" href="/dashboard/location/by-list/edit/{{$lokasi->locationid}}">Edit</a> &nbsp;
                    <a class="text-white btn btn-danger" role="button" href="/dashboard/location/by-list/delete/{{$lokasi->locationid}}">Delete</a> &nbsp;
                    @endif
                </td>
            </tr>
            @endforeach
            @if(!empty($errorMsg))
                <div class="alert alert-danger"> {{ $errorMsg }}</div>
            @endif
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="modalTambahLokasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Perhatian</h5>
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
                    <a href="{{ route('add-location') }}" role="button" class="btn btn-info btn-block text-white">Lanjutkan</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection