@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-white pt-4">
            <h4>Edit Lokasi</h4>
            <h5>ID Lokasi : <b>{{ $location->locationid }}</b></5>
        </div>
        <div class="card-body">  
            <form id="tambahlokasi" method="post" action="javascript:void(0)">

                <div class="form-group">
                    <div class="row">
                        <label for="latitude" class="col-4 col-form-label">Latitude Lokasi</label>
                        <div class="col-8">
                            <input class="form-control" type="number" step="any" value="{{ $location->lat }}" id="lat" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="longitude" class="col-4 col-form-label">Longitude Lokasi</label>
                            <div class="col-8">
                                <input class="form-control" type="number" step="any" value="{{ $location->lng }}" id="lng" required>
                            </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="alamat" class="col-4 col-form-label">Alamat Lokasi</label>
                            <div class="col-8">
                                <input class="form-control" type="text" value="{{ $location->alamat }}" id="alamat" required>
                            </div>
                    </div>
                </div>
                
                <button type="submit" onclick="onSubmitClicked();" id="submitForm" class="btn btn-success">Simpan</button> &nbsp;
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
                        $("#submitForm").html('Menyimpan...');
                        axios.post('{{ route("location-manage-update", $location->locationid) }}', {
                            lat: jQuery('#lat').val(),
                            lng: jQuery('#lng').val(),
                            alamat: jQuery('#alamat').val(),
                        }, options)
                        .then(function (response)
                        { 
                            console.log(response);
                            $("#submitForm").html('Simpan');
                            Command: swal("Sukses Menyimpan", "Edit Lokasi Berhasil!", "success");
                        })
                        .catch(function (error)
                        {
                            console.log(error);
                            $("#submitForm").html('Simpan');
                            Command: swal("Gagal Menyimpan", "Edit Lokasi Gagal!", "error");
                        });
                    }
                </script>

            </form>
        </div>

</div>
@endsection