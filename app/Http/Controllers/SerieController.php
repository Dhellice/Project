<?php

namespace App\Http\Controllers;

use App\serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $series = Serie::paginate(14);

        return view('series.index', ['series' => $series]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'resume' => 'required'
        ],
            [
                'content.required' => 'Content obligatoire'
            ]);

        Serie::create([
            'name' => $request->name,
            'resume' => $request->resume,
        ]);

        return redirect()->route('series.index')->with('success', 'Série créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serie = Serie::find($id);

        if(!$serie) {
            return redirect()->route('series.index');
        }

        return view('series.show', compact('serie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $serie = Serie::find($id);

        if(!$serie) {
            return redirect()->route('series.index');
        }

        return view('series.edit', compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'resume' => 'required'
        ],
            [
                'content.required' => 'Content obligatoire'
            ]);

        $serie = Serie::find($id);

        $serie->name = $request->name;
        $serie->resume = $request->resume;
        $serie->save();

        return redirect()->route('series.show', [$serie->id])->with('success', 'Série modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie = Serie::find($id);

        $serie->delete();

        return redirect()->route('series.index')->with('success', 'Série supprimée');
    }
}
