<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';
    protected $fillable = [
        'id','locationid','lat','lng','alamat','verified','addedby'
    ];
}
