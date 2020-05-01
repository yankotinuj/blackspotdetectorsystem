@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card text-white bg-info">
        <div class="card-header pt-4">
            <h4>Kelola Lokasi</h4>
        </div>
        <div class="card-body bg-light text-body">  
                <table class="table table-striped table-dark table-hover">
                    <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID Lokasi</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($locations as $lokasi)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td id="locId">{{$lokasi->locationid}}</td>
                        <td id="locLat">{{$lokasi->lat}}</td>
                        <td id="locLng">{{$lokasi->lng}}</td>
                        <td>
                            <a class="text-white btn btn-success" role="button" href="{{ route('location-manage-detail',$lokasi->locationid) }}">Detail</a> &nbsp;
                            <a class="btn btn-light" role="button" href="https://www.google.com/maps/place/{{$lokasi->lat}},{{$lokasi->lng}}" target="_blank">Lihat</a> &nbsp;
                            <a class="text-white btn btn-info" role="button" href="{{ route('location-manage-edit',$lokasi->locationid) }}">Edit</a> &nbsp;
                            <a class="text-white btn btn-danger" role="button" href="{{ route('location-manage-delete',$lokasi->locationid) }}">Delete</a> &nbsp;
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