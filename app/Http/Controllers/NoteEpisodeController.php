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
        $existing_note = NoteEpisode::whereEpisodeId($episode->id)->whereUserId(Auth::id())->first();
        if(Auth::check() && !$existing_note) {
            NoteEpisode::create([
                'note' => request('note'),
                'episode_id' => $episode->id,
                'user_id' => Auth::user()->id,

            ]);
            return back()->with('success', "Vous avez noté l'épisode");
        }

        elseif($existing_note){
            return back()->with('success', "Vous avez déjà noté l'épisode");
        }

        else {
            return back()->with('success', "Vous devez être connecté pour noter l'épisode");
        }
    }

}
