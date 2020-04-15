<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailLocation extends Model
{
    protected $table = 'detail_locations';
    protected $fillable = [
        'id','locationid','kejadian','meninggaldunia','lukaberat','lukaringan','koefisien'
    ];
}
