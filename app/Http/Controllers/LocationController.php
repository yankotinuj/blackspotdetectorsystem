<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\DB; 
use Response;
use App\DetailLocation;

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
        $totallocationadded = Location::where('verified', 0)->count();
        $users = User::where('id', Auth::user()->id)->first();
        $locations = Location::where('verified', $verified)->get();
        return view('location.locationlist',['locations' => $locations, 'users' => $users, 'totallocationadded' => $totallocationadded]);
    }

    public function indexManageLocation()
    {
        if (Auth::user()->username == 'admin')
        {
            $locations = Location::where('verified', 1)->get();
            $totallocation = Location::where('verified', 1)->count();
            return view('location.managelocation',['locations' => $locations, 'totallocation' => $totallocation]);
        }
        else
        {
            alert()->error('Anda tidak memiliki hak akses!', 'Aksi Dilarang!')->persistent("Close");
            return back();
        }
    }

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

        $Detail = New DetailLocation;
        $Detail->locationid = $request->locationid;
        $Detail->kejadian = $request->kejadian;
        $Detail->meninggaldunia = $request->meninggaldunia;
        $Detail->lukaberat = $request->lukaberat;
        $Detail->lukaringan = $request->lukaringan;
        $Detail->koefisien = $request->koefisien;
        $Detail->save();

        return Response::json(['action' => 'save_tambahlokasi', $request], 201); // Status code here
    }

    public function addedlocation()
    {
        $verified = 0;
        $users = User::where('id', Auth::user()->id)->first();
        $locations = Location::where('verified', $verified)->get();
        $totallocationadded = Location::where('verified', 0)->count();
        return view('location.locationadded',['locations' => $locations, 'users' => $users, 'totallocationadded' => $totallocationadded]);
    }

    public function editLocation($locationid)
    {
        if (Auth::user()->username == 'admin')
        {
            $location = Location::where('locationid', $locationid)->first();
            return view('location.editlocation',['location' => $location]);
        }
        else
        {
            alert()->error('Anda tidak memiliki hak akses!', 'Aksi Dilarang!')->persistent("Close");
            return back();
        }
    }

    public function updateLocation(Request $request, $locationid)
    {
            $location = Location::where('locationid', $locationid)
            ->update([
                'lat' => $request->lat,
                'lng' => $request->lng,
                'alamat' => $request->alamat
            ]);
            return back();
    }

    public function delete($locationid)
    {
        if (Auth::user()->username == 'admin')
        {
            DB::table('locations')->where('locationid', $locationid)->delete();
            DB::table('detail_locations')->where('locationid', $locationid)->delete();
            sleep(2);
            return back();
        }
        else
        {
            alert()->error('Anda tidak memiliki hak akses!', 'Aksi Dilarang!')->persistent("Close");
            return back();
        }
    }

    public function verifyLocation($locationid)
    {
        if (Auth::user()->username == 'admin'){
            $addedLocation = Location::where('verified', 0)->where('locationid', $locationid)
            ->update(['verified' => 1]);
            sleep(2);
            return back();
        }
        else
        {
            alert()->error('Anda tidak memiliki hak akses!', 'Aksi Dilarang!')->persistent("Close");;
            return back();
        }
    }
}
