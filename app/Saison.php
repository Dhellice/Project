<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saison extends Model
{
    public function episode()
    {
        return $this->hasMany('App\Episode');
    }
    public function serie()
    {
        return $this->belongsTo('App\Serie');
    }
}
