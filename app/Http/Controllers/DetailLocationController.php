<?php

namespace App\Http\Controllers;

use App\DetailLocation;
use Illuminate\Http\Request;
use App\Location;


class DetailLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locationid)
    {
        $locations = Location::where('locationid', $locationid)->first();
        $detailLocations = DetailLocation::where('locationid', $locationid)->first();
        return view('location.detaillocation', ['locations' => $locations, 'detailLocations' => $detailLocations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailLocation  $detailLocation
     * @return \Illuminate\Http\Response
     */
    public function show(DetailLocation $detailLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailLocation  $detailLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailLocation $detailLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailLocation  $detailLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailLocation $detailLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailLocation  $detailLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailLocation $detailLocation)
    {
        //
    }
}
