@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-white bg-info">
        <div class="card-header pt-4">
            <h4>Tambah Lokasi</h4>
            <h5>{{$lastlocationid}}</h5>
            <h5>{{$extractedNumLocationId}}</h5>
            <h5>{{$newNumLocationId}}</h5>
        </div>
        <div class="card-body bg-light text-body">  
            <form id="tambahlokasi" method="POST" action="javascript:void(0)">

                <div class="form-group">
                    <div class="row">
                        <label for="latitude" class="col-4 col-form-label">Latitude Lokasi</label>
                            <div class="col-8">
                                <input class="form-control" type="number" placeholder="Latitude Lokasi" id="latitude" required>
                            </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-4">

                        </div>
                        <div class="col-2">
                            <button type="button" onclick="#" id="getLat" class="btn btn-info text-white">Get Latitude</button>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <label for="longitude" class="col-4 col-form-label">Longitude Lokasi</label>
                            <div class="col-8">
                                <input class="form-control" type="number" placeholder="Longitude Lokasi" id="longitude" required>
                            </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-4">

                        </div>
                        <div class="col-2">
                            <button type="button" onclick="#" id="getLng" class="btn btn-info text-white">Get Longitude</button>
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
                
                <button type="submit" onclick="#" id="submitForm" class="btn btn-success">Submit</button> &nbsp;
                <a class="btn btn-info text-white" href="{{ route('location-by-list') }}" role="button">Kembali</a> &nbsp;
                <button type="reset" class="btn btn-danger">Reset</button>

            </form>
        </div>
    </div>
                

            
</div>
@endsection