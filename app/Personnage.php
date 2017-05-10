<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personnage extends Model
{
    public function serie()
    {
        return $this->belongsTo('App\Serie');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'acteur', 'name', 'serie_id', 'image'
    ];
}
