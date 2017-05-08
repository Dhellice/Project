<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $guarded = [];

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
        'message', 'serie_id', 'user_id'
    ];
}
