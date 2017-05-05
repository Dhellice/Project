<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public function saison()
    {
        return $this->hasMany('App\Saison');
    }
}
