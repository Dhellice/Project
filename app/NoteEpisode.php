<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteEpisode extends Model
{
    public function episode()
    {
        return $this->belongsTo('App\Episode');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'note', 'episode_id', 'user_id'
    ];
}
