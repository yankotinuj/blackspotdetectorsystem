<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GMaps;
use App\Location;

class MapsController extends Controller
{
    public function index()
    {
        $locations = Location::where('verified', 1)->get();

        $config = array();
        $config['center'] = "-7.417010, 109.244718";
        $config['zoom'] = '11';
        $config['map_height'] = '500px';
        $config['scrollwheel'] = true;
        $config['sensor'] = true;

        $markers = array();

        foreach ($locations as $location)
        {
            $markers['position'] = "$location->lat, $location->lng";
            $markers['animation'] = "DROP";
            $markers['infowindow_content'] = "$location->alamat";
            $markers['clickable'] = true;
            GMaps::add_marker($markers);
        }
        /*
        $markers['position'] = "-7.424966, 109.230250";
        $markers['animation'] = "DROP";
        $markers['infowindow_content'] = "Coba dulu yaaa!";
        $markers['clickable'] = true;
        GMaps::add_marker($markers);
        */


        GMaps::initialize($config);

        $map = GMaps::create_map();

        return view('location.locationbymaps', ['map' => $map]);
    }
}
