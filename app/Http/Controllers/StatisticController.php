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
        if (Auth::check())
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
        else
        {
            return redirect('login');
        }
    }

    public function indexAdmin()
    {
        if (Auth::check())
        {
            if (Auth::user()->username == 'admin')
            {
                $devices = DB::table('devices')->select('devices.deviceid','users.username')->join('users','devices.deviceid','=','users.deviceid')
                ->where('users.username','!=','admin')->get();
                $avgSpeed1500m = Statistic::avg('spd_1500m');
                $avgSpeed1000m = Statistic::avg('spd_1000m');
                $avgSpeed500m = Statistic::avg('spd_500m');
                $avgSpeed10m = Statistic::avg('spd_10m');

                return view ('statistic.statisticsadmin', ['devices' => $devices, 'avgSpeed1500m' => $avgSpeed1500m, 'avgSpeed1000m' => $avgSpeed1000m, 'avgSpeed500m' => $avgSpeed500m,
                'avgSpeed10m' => $avgSpeed10m]);
            }
            else
            {
                alert()->error('Anda tidak memiliki hak akses!', 'Aksi Dilarang!')->persistent("Close");
                return back();
            }
        }
        else
        {
            return redirect('login');
        }
    }

    public function indexAdminView($deviceid)
    {
        if (Auth::check())
        {    
            if (Auth::user()->username == 'admin')
            {
                $user = User::where('deviceid', $deviceid)->first();
                $userStatistics = DB::table('statistics')->select('statistics.*','locations.alamat')->join('locations','statistics.locationid','=','locations.locationid')
                ->where('statistics.deviceid','=',$user->deviceid)->orderBy('statistics.created_at','desc')->get();

                $countUserStatistics = Statistic::where('deviceid', $user->deviceid)->count();
                $avgSpeed1500m = Statistic::where('deviceid',$user->deviceid)->avg('spd_1500m');
                $avgSpeed1000m = Statistic::where('deviceid',$user->deviceid)->avg('spd_1000m');
                $avgSpeed500m = Statistic::where('deviceid',$user->deviceid)->avg('spd_500m');
                $avgSpeed10m = Statistic::where('deviceid',$user->deviceid)->avg('spd_10m');

                return view ('statistic.statisticsadminview', ['user' => $user, 'userStatistics' => $userStatistics, 'countUserStatistics' => $countUserStatistics, 'avgSpeed1500m' => $avgSpeed1500m, 'avgSpeed1000m' => $avgSpeed1000m, 'avgSpeed500m' => $avgSpeed500m,
                'avgSpeed10m' => $avgSpeed10m]);
            }
            else
            {
                alert()->error('Anda tidak memiliki hak akses!', 'Aksi Dilarang!')->persistent("Close");
                return back();
            }
        }
        else
        {
            return redirect('login');
        }
    }
    public function indexAdminViewDetail($deviceid, $locationid)
    {
        if (Auth::check())
        {
            if (Auth::user()->username == 'admin')
            {
                $user = User::where('deviceid', $deviceid)->first();
                $userStatistics = DB::table('statistics')->select('statistics.*','locations.alamat')->join('locations','statistics.locationid','=','locations.locationid')
                ->where('statistics.deviceid','=',$user->deviceid)->orderBy('statistics.created_at','desc')->get();
                $selectedUserStatistics = DB::table('statistics')->select('statistics.*','locations.alamat')->join('locations','statistics.locationid','=','locations.locationid')
                ->where('statistics.locationid','=',$locationid)->get();

                $avgSpeed1500m = Statistic::where('deviceid',$user->deviceid)->avg('spd_1500m');
                $avgSpeed1000m = Statistic::where('deviceid',$user->deviceid)->avg('spd_1000m');
                $avgSpeed500m = Statistic::where('deviceid',$user->deviceid)->avg('spd_500m');
                $avgSpeed10m = Statistic::where('deviceid',$user->deviceid)->avg('spd_10m');

                return view ('statistic.statisticsadminviewdetail', ['user' => $user, 'userStatistics' => $userStatistics, 'selectedUserStatistics' => $selectedUserStatistics, 'avgSpeed1500m' => $avgSpeed1500m, 'avgSpeed1000m' => $avgSpeed1000m, 'avgSpeed500m' => $avgSpeed500m,
                'avgSpeed10m' => $avgSpeed10m]);
            }
            else
            {
                alert()->error('Anda tidak memiliki hak akses!', 'Aksi Dilarang!')->persistent("Close");
                return back();
            }
        }
        else
        {
            return redirect('login');
        }
    }
}
