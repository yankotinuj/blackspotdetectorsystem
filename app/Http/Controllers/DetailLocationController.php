<?php

namespace App\Http\Controllers;

use App\DetailLocation;
use Illuminate\Http\Request;
use App\Location;
use Response;
use Illuminate\Support\Facades\DB;
use Auth;
use App\User;

class DetailLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locationid)
    {
        $users = User::where('id', Auth::user()->id)->first();
        $locations = Location::where('locationid', $locationid)->first();
        $detailLocations = DetailLocation::where('locationid', $locationid)->first();
        return view('location.detaillocation', ['users' => $users, 'locations' => $locations, 'detailLocations' => $detailLocations]);
    }

    public function adddetail($locationid)
    {
        if (Auth::user()->username == 'admin')
        {
            $locations = Location::where('locationid', $locationid)->first();
            $detailLocations = DetailLocation::where('locationid', $locationid)->first();
            return view('location.locationaddeddetail', ['locations' => $locations, 'detailLocations' => $detailLocations]);
        }
        else
        {
            alert()->error('Anda tidak memiliki hak akses!', 'Aksi Dilarang!')->persistent("Close");
            return back();
        }
    }
    /*public function adddetail()
    {
        return view('location.locationaddeddetail');
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailLocation  $detailLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locationid)
    {
            $Detail = DB::table('detail_locations')->where('locationid', $locationid)
            ->update([
            'kejadian' => $request->kejadian,
            'meninggaldunia' => $request->meninggaldunia,
            'lukaberat' => $request->lukaberat,
            'lukaringan' => $request->lukaringan,
            'koefisien' => $request->koefisien
            ]);
            return back();
    }
}
