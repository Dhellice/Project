<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Serie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $series = Serie::all();
        $categorie = Categorie::find($id);

        if(!$categorie) {
            return redirect()->route('series.index');
        }

        return view('categories.show', compact('series', 'categorie'));
    }
}
