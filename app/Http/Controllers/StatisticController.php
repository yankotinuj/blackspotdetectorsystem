<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Device;
use App\Location;
use App\Statistic;
use App\Charts\StatisticsChart;
use Auth;
use DB;

class StatisticController extends Controller
{
    public function index()
    {
        $userStatistics = DB::table('statistics')->select('statistics.*','locations.*')->join('locations','statistics.locationid','=','locations.locationid')
        ->where('statistics.deviceid','=',Auth::user()->deviceid)->orderBy('statistics.created_at','desc')->get();
        
        $countUserStatistics = Statistic::where('deviceid', Auth::user()->deviceid)->count();

        $avgSpeed1500m = Statistic::where('deviceid', Auth::user()->deviceid)->avg('spd_1500m');
        $avgSpeed1000m = Statistic::where('deviceid', Auth::user()->deviceid)->avg('spd_1000m');
        $avgSpeed500m = Statistic::where('deviceid', Auth::user()->deviceid)->avg('spd_500m');
        $avgSpeed10m = Statistic::where('deviceid', Auth::user()->deviceid)->avg('spd_10m');

        $statisticsChart = new StatisticsChart;
        $statisticsChart->title('Rata-rata Kecepatan Berkendara Anda');
        $statisticsChart->labels(['Jarak 1500 M', 'Jarak 1000 M', 'Jarak 500 M', 'Jarak 10 M']);
        $statisticsChart->dataset('Kecepatan dalam KM/J', 'bar', [$avgSpeed1500m, $avgSpeed1000m, $avgSpeed500m, $avgSpeed10m])
                        ->color("rgba(52, 144, 220, 0.5)")
                        ->backgroundcolor("rgba(52, 144, 220, 0.5)");

        return view ('statistic.statistics', ['statisticsChart' => $statisticsChart, 'userStatistics' => $userStatistics, 'countUserStatistics' => $countUserStatistics]);
    }
}
