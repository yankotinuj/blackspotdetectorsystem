@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-5">
            <div class="card my-3">
                <h5 class="card-header">Statistik Saya</h5>
                <div class="card-body">
                    <h5 class="card-title">ID Perangkat : <b>{{$users->deviceid}}</b></h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-7">
            <div class="card my-3">
                <h5 class="card-header">Grafik Statistik</h5>
                <div class="card-body">
                    {!! $statisticsChart->container() !!}
                </div>
            </div>
        </div>
    </div>   
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $statisticsChart->script() !!}
@endsection