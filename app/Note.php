<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
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
        'note', 'serie_id', 'user_id'
    ];
}
