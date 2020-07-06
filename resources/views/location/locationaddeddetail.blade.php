@extends('layouts.app')

@section('content')
<div class="container">
    <h4>Detail Lokasi Daerah Rawan Kecelakaan</h4>
    @if ($locations->verified == 0)
        <h5><b>ID Lokasi : {{$detailLocations->locationid}}</b></h5>
        <h5><b>Ditambahkan oleh : {{$locations->addedby}}</b></h5>
        <h5><b>Status : Belum di Verifikasi</b></h5>
    @else
        <h5><b>ID Lokasi : {{$detailLocations->locationid}}</b></h5>
    @endif
    <form id="tambahdetaillokasi" method="post" action="javascript:void(0)">
        <div class="card">
            <div class="card-body">
                <div class="row px-3">
                    <div class="col-sm-4">
                        <div class="row">
                            <h6>Alamat</h6>
                        </div>
                        <div class="row">
                            <h5><b>{{$locations->alamat}}</b></h5>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <h6>Jumlah Kejadian</h6>
                        </div>
                        <div class="row">
                            <input class="form-control" type="number" placeholder="Jumlah Kejadian" id="kejadian" name="kejadian" value="{{$detailLocations->kejadian}}" required>
                        </div>
                    </div>
                </div>

                <div class="row px-3 pt-3">
                    <div class="col-sm-4">
                        <div class="row">
                            <h6>Jumlah Meninggal Dunia</h6>
                        </div>
                        <div class="row">
                            <input class="form-control" type="number" placeholder="Jumlah Meninggal Dunia" id="meninggaldunia" name="meninggaldunia" value="{{$detailLocations->meninggaldunia}}" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <h6>Jumlah Luka Berat</h6>
                        </div>
                        <div class="row">
                            <input class="form-control" type="number" placeholder="Jumlah Luka Berat" id="lukaberat" name="lukaberat" value="{{$detailLocations->lukaberat}}" required>
                        </div>
                    </div>
                </div>

                <div class="row px-3 pt-3">
                    <div class="col-sm-4">
                        <div class="row">
                            <h6>Jumlah Luka Ringan</h6>
                        </div>
                        <div class="row">
                            <input class="form-control" type="number" placeholder="Jumlah Luka Ringan" id="lukaringan" name="lukaringan" value="{{$detailLocations->lukaringan}}" required>
                        </div>
                    </div>
                    <div class="col-sm-4">
                    <div class="row">
                            <h6>Koefisien</h6>
                        </div>
                        <div class="row">
                            <input class="form-control" type="number" placeholder="Koefisien" id="koefisien" name="koefisien" value="{{$detailLocations->koefisien}}" required>
                        </div>
                    </div>
                </div>

                <div class="row px-3 pt-3">
                    <div class="col-sm-4">
                        <div class="row">
                            <button type="submit" onclick="onSubmitClicked();" id="submitForm" class="btn btn-success">Simpan</button> &nbsp;
                            <a class="btn btn-danger" href="{{ url()->previous() }}" role="button">Kembali</a>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        
                    </div>
                </div>
            </div>
        </div>

        <script>
            const options = {
                headers:
                {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            };
            async function onSubmitClicked()
            {
                $("#submitForm").html('Menyimpan...');
                axios.post('{{ route("location-added-by-user-detail-add-update",$locations->locationid) }}', {
                    kejadian: jQuery('#kejadian').val(),
                    meninggaldunia: jQuery('#meninggaldunia').val(),
                    lukaberat: jQuery('#lukaberat').val(),
                    lukaringan: jQuery('#lukaringan').val(),
                    koefisien: jQuery('#koefisien').val()
                }, options)
                .then(function (response)
                { 
                    console.log(response);
                    $("#submitForm").html('Simpan');
                    Command: swal("Sukses Menyimpan", "Detail Lokasi Berhasil Ditambahkan.", "success");
                    setTimeout(function()
                    {
                        window.location.replace("{{ route('location-added-by-user-detail',$locations->locationid) }}"); //Pindah ke halaman sebelumnya
                    },3000); // 3000 -> ms = 3 Detik
                })
                .catch(function (error)
                {
                    console.log(error);
                    $("#submitForm").html('Simpan');
                    Command: swal("Gagal Menyimpan", "Detail Lokasi Gagal Ditambahkan atau Form Belum Lengkap Diisi", "error");
                });
            }
        </script>

    </form>
</div>
@endsection