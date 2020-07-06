<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use App\Statistic;
use App\User;
use App\Device;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('id', Auth::user()->id)->first();
        $device = Device::where('deviceid', Auth::user()->deviceid)->first();
        $totallocationadded = Location::where('verified', 1)->count();
        $countUserStatistics = Statistic::where('deviceid', $users->deviceid)->count();

        $avgSpeed1500m = Statistic::where('deviceid', $users->deviceid)->avg('spd_1500m');
        $avgSpeed1000m = Statistic::where('deviceid', $users->deviceid)->avg('spd_1000m');
        $avgSpeed500m = Statistic::where('deviceid', $users->deviceid)->avg('spd_500m');
        $avgSpeed10m = Statistic::where('deviceid', $users->deviceid)->avg('spd_10m');

        return view('home', ['users' => $users, 'device' => $device, 'totallocationadded' => $totallocationadded,
        'countUserStatistics' => $countUserStatistics, 'avgSpeed1500m' => round($avgSpeed1500m),
        'avgSpeed1000m' => round($avgSpeed1000m), 'avgSpeed500m' => round($avgSpeed500m),
        'avgSpeed10m' => round($avgSpeed10m)]);
    }
}
