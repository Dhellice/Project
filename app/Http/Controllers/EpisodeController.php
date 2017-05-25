<?php

namespace App\Http\Controllers;

use App\Episode;
use App\NoteEpisode;
use App\Saison;
use App\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $episodes = Episode::paginate(5);

        return view('episodes.index', ['episodes' => $episodes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('episodes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Saison $saison)
    {
        Episode::create([
            'name' => request('name'),
            'resume' => request('resume'),
            'saison_id' => request('saison_id'),

        ]);

        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notes = NoteEpisode::all();
        $episode = Episode::find($id);
        $somme =  DB::table('note_episodes')->where('note_episodes.episode_id', '=', $id)->sum('note_episodes.note');
        $nombre = DB::table('note_episodes')->where('note_episodes.episode_id', '=', $id)->count();
        $saisons = DB::table('saisons')->where('saisons.id', '=', $episode->saison_id)->get();
        $series = Serie::all();

        if(!$episode) {
            return redirect()->route('series.index');
        }

        return view('episodes.show', compact('episode', 'notes', 'somme', 'nombre', 'series', 'saisons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $episode = Episode::find($id);

        if(!$episode) {
            return redirect()->route('series.index');
        }

        return view('episodes.edit', compact('episode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'resume' => 'required',
            'saison_id' => 'required'
        ]);

        $episode = Episode::find($id);

        $episode->name = $request->name;
        $episode->resume = $request->resume;
        $episode->saison_id = $request->saison_id;
        $episode->save();

        return redirect()->route('series.index')->with('success', 'Episode modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $episode = Episode::find($id);

        $episode->delete();

        return redirect()->route('series.index')->with('success', 'Episode supprimé');
    }
}
