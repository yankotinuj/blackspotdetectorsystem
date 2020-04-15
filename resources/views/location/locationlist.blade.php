@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Lokasi Daerah Rawan Kecelakaan</h4>

    <ul class="nav nav-tabs pb-3">
        <li class="nav-item">
            <a class="nav-link active" href="#">Daftar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Peta</a>
        </li>
    </ul>

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
                    <a class="nav-link text-white btn btn-success" href="/dashboard/location/by-list/{{$lokasi->locationid}}">Detail</a> &nbsp;
                    <a class="nav-link text-white btn btn-info" href="https://www.google.com/maps/place/{{$lokasi->lat}},{{$lokasi->lng}}" target="_blank">Lihat di Google Maps</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection