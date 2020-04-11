<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = 'devices';
    protected $fillable = [
        'id','deviceid','devicename','deviceversion','devicecode','devicemicrocontroller','deviceurl'
    ];
    //public function device(){
    //    return $this->hasOne('App\cabang','id_cabang','id_cabang');
    //}
}
