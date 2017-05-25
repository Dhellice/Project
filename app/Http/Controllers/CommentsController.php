<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Serie;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Comment;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comments::paginate(5);

        return view('comments.index', ['comments' => $comments]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Serie $serie)
    {
        Comments::create([
            'message' => request('message'),
            'serie_id' => $serie->id,
            'user_id' => Auth::user()->id,

        ]);

        return back()->with('success', 'Commentaire envoyé');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comments::find($id);

        if(!$comment) {
            return redirect()->route('comments.index');
        }

        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comments::find($id);

        if(!$comment) {
            return redirect()->route('series.index');
        }

        return view('comments.edit', compact('comment'));
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
            'message' => 'required'
        ]);

        $comment = Comments::find($id);

        $comment->message = $request->message;
        $comment->save();

        return redirect()->route('series.index')->with('success', 'Commentaire modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comments::find($id);

        $comment->delete();

        return redirect()->route('series.index')->with('success', 'Commentaire supprimé');
    }
}
