<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public function saison()
    {
        return $this->hasMany('App\Saison');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'resume'
    ];
}
