<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ami extends Model
{

    protected $table = 'amis';

    protected $fillable = [
        'user_id',
        'ami_id',
    ];


    /**
     * Get all of the posts that are assigned this like.
     */
    public function users()
    {
        return $this->morphedByMany('App\User', 'users');
    }
}
