@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card text-white bg-info">
        <div class="card-header pt-4">
            <h4>Permintaan Tambah Lokasi</h4>
        </div>
        <div class="card-body bg-light text-body">  
            @if ($totallocationadded == 0)
                <div class="alert alert-primary" role="alert">
                    Tidak ada permintaan tambah lokasi.
                </div>
            @else
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
                            <a class="text-white btn btn-success" role="button" href="{{ route('location-added-by-user-detail',$lokasi->locationid) }}">Detail</a> &nbsp;
                            <a class="btn btn-light" role="button" href="https://www.google.com/maps/place/{{$lokasi->lat}},{{$lokasi->lng}}" target="_blank">Lihat</a> &nbsp;
                            <a class="text-white btn btn-info" role="button" href="{{ route('location-added-by-user-verify',$lokasi->locationid) }}">Verifikasi</a> &nbsp;
                            <a class="text-white btn btn-danger" role="button" href="{{ route('location-added-by-user-delete',$lokasi->locationid) }}">Delete</a> &nbsp;
                            <!--<button class="text-white btn btn-danger" onclick="deleteLocation()">Delete</button> &nbsp;-->
                        </td>
                    </tr>
                    @endforeach
                    @if(!empty($errorMsg))
                        <div class="alert alert-danger"> {{ $errorMsg }}</div>
                    @endif
                    </tbody>
                </table>

                <script>
                    /*function deleteLocation()
                    {
                        var x = document.getElementById("myRadio").value;
                        document.getElementById("demo").innerHTML = x;
                    }*/
                    /*function deleteLocation()
                    {
                        swal(
                        {
                            title: "Anda Yakin?",
                            text: "Lokasi ini akan dihapus secara permanen!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Hapus",
                            closeOnConfirm: false
                        },
                        function()
                        {
                            swal("Lokasi Dihapus!", "Lokasi ini tidak terdapat lagi di database.", "success");
                        },
                        );
                    }*/
                </script>
            @endif

        </div>
    </div>
                

            
</div>
@endsection