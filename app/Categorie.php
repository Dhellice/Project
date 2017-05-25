<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //
    public function serie()
    {
        return $this->hasMany('App\Serie');
    }


    protected $fillable = [
        'name'
    ];
}
