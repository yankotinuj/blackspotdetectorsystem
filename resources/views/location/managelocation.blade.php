@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-white pt-4">
            <h4>Kelola Lokasi</h4>
        </div>
        <div class="card-body">  
            @if ($totallocation == 0)
                <div class="alert alert-primary" role="alert">
                    Tidak ada daftar lokasi.
                </div>
                <a class="btn btn-danger" href="{{ route('location-by-list-admin') }}" role="button">Kembali</a>

            @else
            <div class="table-responsive">
                <table class="table table-striped table-hover">
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
                            <a class="btn btn-success" role="button" href="{{ route('location-manage-detail',$lokasi->locationid) }}">Detail</a> &nbsp;
                            <a class="btn btn-primary" role="button" href="https://www.google.com/maps/place/{{$lokasi->lat}},{{$lokasi->lng}}" target="_blank">Lihat</a> &nbsp;
                            <a class="btn btn-info text-white" role="button" href="{{ route('location-manage-edit',$lokasi->locationid) }}">Edit</a> &nbsp;
                            <a id="deleteLocation{{$lokasi->locationid}}" class="btn btn-danger" role="button" href="{{ route('location-manage-delete',$lokasi->locationid) }}">Delete</a> &nbsp;
                        
                            <script>
                                $(document).ready(function(){
                                    $("#deleteLocation{{$lokasi->locationid}}").on('click', function(e){
                                        e.preventDefault();

                                        var href = $(this).attr('href');

                                        swal(
                                        {
                                            title: "Anda Yakin?",
                                            text: "Lokasi ini akan dihapus secara permanen!",
                                            icon: "warning",
                                            dangerMode: true,
                                            buttons: {
                                                cancel: "Batal",
                                                confirm: "Hapus Lokasi",
                                            },
                                            closeOnClickOutside: false,
                                            closeOnEsc: false,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete)
                                            {
                                                swal("Lokasi Dihapus!", "Lokasi ini tidak terdapat lagi di database.", "success");
                                                window.location.href = href;
                                            }
                                            else
                                            {
                                                swal("Aksi Dibatalkan!", "Lokasi ini batal dihapuskan.", "info");
                                            }
                                        });
                                    });
                                });
                            </script>
                        
                        </td>
                    </tr>
                    @endforeach
                    @if(!empty($errorMsg))
                        <div class="alert alert-danger"> {{ $errorMsg }}</div>
                    @endif
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>        
</div>
@endsection