@extends('layouts.app')

@section('content')
<div class="container">
    <h4>User Profile</h4>
    <div class="card">
        <div class="card-body">
            <div class="row px-3">
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Nama Pengguna</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$users->name}}</b></h5>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Email Pengguna</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$users->email}}</b></h5>
                    </div>
                </div>
            </div>

            <div class="row px-3 pt-3">
                <div class="col-sm-4">
                    <div class="row">
                        <h6>Nama Username</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$users->username}}</b></h5>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="row">
                        <h6>ID Device Pengguna</h6>
                    </div>
                    <div class="row">
                        <h5><b>{{$users->deviceid}}</b></h5>
                    </div>
                </div>
            </div>

            <div class="row px-3 pt-3">
                <div class="col-sm-4">
                    <div class="row">
                    <a class="btn btn-info" href="{{ route('home') }}" role="button">Kembali</a>
                    </div>
                </div>
                <div class="col-sm-4">

                </div>
            </div>


        </div>
    </div>
</div>
@endsection