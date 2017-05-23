<?php

namespace App\Http\Controllers;

use App\Episode;
use App\NoteEpisode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteEpisodeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Episode $episode)
    {
        if(Auth::check()) {
            NoteEpisode::create([
                'note' => request('note'),
                'episode_id' => $episode->id,
                'user_id' => Auth::user()->id,

            ]);
            return back()->with('success', "Vous avez noté l'épisode");
        }

        else {
            return back()->with('success', "Vous devez être connecté pour noter l'épisode");
        }
    }

}
