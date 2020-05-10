<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Location;
use App\Device;

class Statistic extends Model
{
    protected $table = 'statistics';
    protected $fillable = [
        'id','deviceid','locationid','spd_1500m','spd_1000m','spd_500m','spd_10m'
    ];
}
