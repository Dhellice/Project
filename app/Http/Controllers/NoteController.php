<?php

namespace App\Http\Controllers;

use App\Note;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $existing_note = Note::whereSerieId($serie->id)->whereUserId(Auth::id())->first();
        if(Auth::check() && !$existing_note) {
        Note::create([
            'note' => request('note'),
            'serie_id' => $serie->id,
            'user_id' => Auth::user()->id,

        ]);
            return back()->with('success', "Vous avez noté la série");
        }

        elseif($existing_note){
            return back()->with('success', "Vous avez déjà noté la série");
        }

        else {
            return back()->with('success', "Vous devez être connecté pour noter la série");
        }

    }

}
