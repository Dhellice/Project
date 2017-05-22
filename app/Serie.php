<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public function saison()
    {
        return $this->hasMany('App\Saison');
    }

    public function personnage()
    {
        return $this->hasMany('App\Personnage');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
    public function likes()
    {
        return $this->morphToMany('App\User', 'likeable')->whereDeletedAt(null);
    }

    public function note()
    {
        return $this->hasMany('App\Note');
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
