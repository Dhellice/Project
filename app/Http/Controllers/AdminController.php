<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Serie;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.index');
    }


    //////////////////// SERIES //////////////


    public function showseries()
    {
        $series = Serie::paginate(15);
        return view('admin.series', ['series' => $series]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createseries()
    {

        return view('admin.createseries');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeseries(Request $request)
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
            'image' => $request->image,
        ]);

        return redirect()->route('admin.series')->with('success', 'Série créé');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editseries($id)
    {
        $serie = Serie::find($id);

        if(!$serie) {
            return redirect()->route('admin.index');
        }

        return view('admin.editseries', compact('serie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateseries(Request $request, $id)
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

        return redirect()->route('admin.series')->with('success', 'Série modifiée');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyseries($id)
    {
        $serie = Serie::find($id);

        $serie->delete();

        return redirect()->route('admin.series')->with('success', 'Série supprimée');
    }


 //////////////////// COMMENTAIRES //////////////

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showcomments()
    {
        $comments = Comments::paginate(5);
        $users = User::all();

        return view('admin.comments', ['comments' => $comments, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function editcomments($id)
    {
        $comment = Comments::find($id);

        if(!$comment) {
            return redirect()->route('admin.index');
        }

        return view('admin.editcomments', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function updatecomments(Request $request, $id)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);

        $comment = Comments::find($id);

        $comment->message = $request->message;
        $comment->save();

        return redirect()->route('admin.comments')->with('success', 'Commentaire modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroycomments($id)
    {
        $comment = Comments::find($id);

        $comment->delete();

        return redirect()->route('admin.comments')->with('success', 'Commentaire supprimé');
    }


    //////////////////// MEMBRES //////////////



    public function showusers()
    {
        $users = User::paginate(15);
        return view('admin.users', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function editusers($id)
    {
        $user = User::find($id);

        if(!$user) {
            return redirect()->route('admin.index');
        }

        return view('admin.editusers', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function updateusers(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Utilisateur modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroyusers($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé');
    }
}
