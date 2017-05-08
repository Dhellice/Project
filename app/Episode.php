<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public function saison()
    {
        return $this->belongsTo('App\Saison');
    }

    protected $fillable = [
        'name', 'resume', 'saison_id'
    ];
}
