<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB; 
use Response;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $verified = 1;
        $users = User::where('id', Auth::user()->id)->first();
        $locations = Location::where('verified', $verified)->get();
        return view('location.locationlist',['locations' => $locations, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addLocation()
    {
        $users = User::where('id', Auth::user()->id)->first();
        $lastlocation = DB::table('locations')->latest('locationid')->first();
        $lastlocationid = $lastlocation->locationid;
        $extractedNumLocationId = filter_var($lastlocationid, FILTER_SANITIZE_NUMBER_INT);
        $newNumLocationId = $extractedNumLocationId + 1;
        $stringNewNumLocationId = strval($newNumLocationId);
        return view('location.addlocation',['users' => $users, 'lastlocationid' => $lastlocationid, 'extractedNumLocationId' => $extractedNumLocationId, 'newNumLocationId' => $newNumLocationId, 'stringNewNumLocationId' => $stringNewNumLocationId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Lokasi = new Location;
        $Lokasi->locationid = $request->locationid;
        $Lokasi->lat = $request->lat;
        $Lokasi->lng = $request->lng;
        $Lokasi->alamat = $request->alamat;
        $Lokasi->verified = $request->verified;
        $Lokasi->addedby = $request->addedby;
        $Lokasi->save();

        return Response::json(['action' => 'save_tambahlokasi', $request], 201); // Status code here
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
