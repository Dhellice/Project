<?php

namespace App\Http\Controllers;

use App\Note;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Serie $serie)
    {

        if(Auth::check()) {
        Note::create([
            'note' => request('note'),
            'serie_id' => $serie->id,
            'user_id' => Auth::user()->id,

        ]);
            return back()->with('success', "Vous avez noté l'épisode");
        }

        else {
            return back()->with('success', "Vous devez être connecté pour noter l'épisode");
        }

    }

}
