@extends('layouts.map')
@section('content')
<div class="container">
    <h4>Lokasi Daerah Rawan Kecelakaan</h4>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('location-by-list') }}">Daftar</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Peta</a>
        </li>
    </ul>

    <div class="card my-3">
        <div class="card-header bg-white pt-4">
            <h4>Peta Lokasi</h4>
        </div>
        <div class="card-body">
            {!! $map['html'] !!}
        </div>
    </div>
    
</div>
@endsection