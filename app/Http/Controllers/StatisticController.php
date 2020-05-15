<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Device;
use App\Location;
use App\Statistic;
use App\Charts\StatisticsChart;
use Auth;

class StatisticController extends Controller
{
    public function index()
    {
        $users = User::where('id', Auth::user()->id)->first();
        $userStatistics = Statistic::where('deviceid', $users->deviceid)->get();
        $countUserStatistics = Statistic::where('deviceid', $users->deviceid)->count();

        $avgSpeed1500m = Statistic::where('deviceid', $users->deviceid)->avg('spd_1500m');
        $avgSpeed1000m = Statistic::where('deviceid', $users->deviceid)->avg('spd_1000m');
        $avgSpeed500m = Statistic::where('deviceid', $users->deviceid)->avg('spd_500m');
        $avgSpeed10m = Statistic::where('deviceid', $users->deviceid)->avg('spd_10m');

        $statisticsChart = new StatisticsChart;
        $statisticsChart->labels(['Jarak 1500 M', 'Jarak 1000 M', 'Jarak 500 M', 'Jarak 10 M']);
        $statisticsChart->dataset('Kecepatan dalam KM/J', 'bar', [$avgSpeed1500m, $avgSpeed1000m, $avgSpeed500m, $avgSpeed10m]);
        return view ('statistic.statistics', ['users' => $users, 'statisticsChart' => $statisticsChart]);
    }
}
