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
        Note::create([
            'note' => request('note'),
            'serie_id' => $serie->id,
            'user_id' => Auth::user()->id,

        ]);

        return back();
    }

}
