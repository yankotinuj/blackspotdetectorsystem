@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-white pt-4">
            <h4>Permintaan Tambah Lokasi</h4>
        </div>
        <div class="card-body">  
            @if ($totallocationadded == 0)
                <div class="alert alert-primary" role="alert">
                    Tidak ada permintaan tambah lokasi.
                </div>
                <a class="btn btn-danger" href="{{ route('location-by-list-admin') }}" role="button">Kembali</a>

            @else
            <div class="table-responsive">
                <table class="table table-striped table-hover">
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
                        <td id="locId">{{$lokasi->locationid}}</td>
                        <td id="locAddress">{{$lokasi->alamat}}</td>
                        <td id="locAddedBy">{{$lokasi->addedby}}</td>
                        <td>
                            <a class="btn btn-primary" role="button" href="{{ route('location-added-by-user-detail',$lokasi->locationid) }}">Detail</a> &nbsp;
                            <a class="btn btn-info text-white" role="button" href="https://www.google.com/maps/place/{{$lokasi->lat}},{{$lokasi->lng}}" target="_blank">Lihat</a> &nbsp;
                            <a id="verifyRequest{{$lokasi->locationid}}" class="btn btn-success" role="button" href="{{ route('location-added-by-user-verify',$lokasi->locationid) }}">Verifikasi</a> &nbsp;
                            <a id="deleteRequest{{$lokasi->locationid}}" class="btn btn-danger" role="button" onclick="deleteLocation();" href="{{ route('location-added-by-user-delete',$lokasi->locationid) }}">Delete</a>
                        
                            <script>
                                $(document).ready(function(){
                                    $("#deleteRequest{{$lokasi->locationid}}").on('click', function(e){
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
                                    $("#verifyRequest{{$lokasi->locationid}}").on('click', function(e){
                                        e.preventDefault();

                                        var href = $(this).attr('href');

                                        swal(
                                        {
                                            title: "Anda Yakin?",
                                            text: "Pastikan Lokasi akan diverifikasi!",
                                            icon: "warning",
                                            buttons: {
                                                cancel: "Batal",
                                                confirm: "Verifikasi Lokasi",
                                            },
                                            closeOnClickOutside: false,
                                            closeOnEsc: false,
                                        })
                                        .then((willDelete) => {
                                            if (willDelete)
                                            {
                                                swal("Lokasi Diverifikasi!", "Lokasi ini sudah terverifikasi dan ditampilkan di daftar lokasi daerah rawan kecelakaan.", "success");
                                                window.location.href = href;
                                            }
                                            else
                                            {
                                                swal("Aksi Dibatalkan!", "Lokasi ini batal diverifikasi.", "info");
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