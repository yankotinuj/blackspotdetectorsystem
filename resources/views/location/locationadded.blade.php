@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card text-white bg-info">
        <div class="card-header pt-4">
            <h4>Permintaan Tambah Lokasi</h4>
        </div>
        <div class="card-body bg-light text-body">  
            
            <table class="table table-striped table-dark">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Lokasi</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Ditambahkan Oleh</th>
                    <th scope="col">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach($locations as $lokasi)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$lokasi->locationid}}</td>
                    <td>{{$lokasi->alamat}}</td>
                    <td>{{$lokasi->addedby}}</td>
                    <td>
                        <a class="text-white btn btn-success" role="button" href="{{ route('location-added-by-user-detail',$lokasi->locationid) }}">Detail</a> &nbsp;
                        <a class="btn btn-light" role="button" href="https://www.google.com/maps/place/{{$lokasi->lat}},{{$lokasi->lng}}" target="_blank">Lihat</a> &nbsp;
                        <a class="text-white btn btn-info" role="button" href="/dashboard/location/by-list/edit/{{$lokasi->locationid}}">Verifikasi</a> &nbsp;
                        <a class="text-white btn btn-danger" role="button" href="/dashboard/location/by-list/delete/{{$lokasi->locationid}}">Delete</a> &nbsp;
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
@endsection