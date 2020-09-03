@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-white pt-4">
            <h4>Tambah Lokasi</h4>
            <h5>ID Lokasi : <b>DRK{{$stringNewNumLocationId}}</b></5>
        </div>
        <div class="card-body">  
            <form id="tambahlokasi" method="post" action="javascript:void(0)" onsubmit="onSubmitClicked()">

                <div class="form-group">
                    <div class="row">
                        <label for="latitude" class="col-4 col-form-label">Latitude Lokasi</label>
                        <div class="col-8">
                            <input class="form-control" type="number" step="any" placeholder="Lihat LAT pada Perangkat" id="lat" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="longitude" class="col-4 col-form-label">Longitude Lokasi</label>
                            <div class="col-8">
                                <input class="form-control" type="number" step="any" placeholder="Lihat LNG pada Perangkat" id="lng" required>
                            </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="alamat" class="col-4 col-form-label">Alamat Lokasi</label>
                            <div class="col-8">
                                <input class="form-control" type="text" placeholder="Alamat Lokasi" id="alamat" required>
                            </div>
                    </div>
                </div>

                <div class="form-check pb-2">
                    <input type="checkbox" class="form-check-input" id="confirmationCheck" required>
                    <label class="form-check-label" for="confirmationCheck">Dengan mencetang checkbox ini, Saya bertanggung jawab dengan data yang di submit.</label>
                </div>
                
                <button type="submit" id="submitForm" class="btn btn-success">Simpan</button> &nbsp;
                <a class="btn btn-primary" href="{{ url()->previous() }}" role="button">Kembali</a> &nbsp;
                <button type="reset" class="btn btn-danger">Reset</button>

                <script>
                    const options = {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    };
                    async function onSubmitClicked()
                    {
                        $("#submitForm").html('Menyimpan');
                        axios.post('{{ route("save-location") }}', {
                            locationid: 'DRK{{$stringNewNumLocationId}}',
                            lat: jQuery('#lat').val(),
                            lng: jQuery('#lng').val(),
                            alamat: jQuery('#alamat').val(),
                            verified: 0,
                            addedby: '{{$users->username}}',
                            kejadian: 0,
                            meninggaldunia: 0,
                            lukaberat: 0,
                            lukaringan: 0,
                            koefisien: 0
                        }, options)
                        .then(function (response)
                        { 
                            console.log(response);
                            $("#submitForm").html('Simpan');
                            Command: swal("Sukses Menyimpan!", "Lokasi Berhasil Ditambahkan. Lokasi yang Anda tambahkan perlu diverifikasi oleh Admin untuk ditampilkan di daftar daerah rawan kecelakaan.", "success");
                            setTimeout(function()
                            {
                                window.location.replace("{{ route('location-by-list') }}"); //Pindah ke halaman sebelumnya
                            },3000); // 4000 -> ms = 4 Detik
                        })
                        .catch(function (error)
                        {
                            console.log(error);
                            $("#submitForm").html('Simpan');
                            Command: swal("Gagal Menyimpan!", "Lokasi Gagal Ditambahkan atau Form Belum Lengkap Diisi", "error");
                        });
                    }
                </script>

            </form>
        </div>
    </div>
                

            
</div>
@endsection