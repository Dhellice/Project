<?php

namespace App\Http\Controllers;

use App\Like;
use App\Serie;
use App\User;
use App\Ami;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class AmiController extends Controller
{

    public function index()
    {
        //
        $users = User::paginate(14);

        return view('amis.index', ['users' => $users]);
    }

    public function amis($id)
    {   if(Auth::check()) {
        // here you can check if product exists or is valid or whatever
        $users = User::find($id);
        $this->handleAmi($id);
        return redirect()->route('user.index', ['id' => $users->id])->with('success', "Vous avez rajouté un ami");
    }
    else {
        return redirect()->route('user.index')->with('success', 'Vous devez être connecté pour ajouter un ami');
    }
    }

    public function handleAmi($id)
    {
        $users = User::find($id);
        $existing_ami = DB::table('amis')->whereAmiId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_ami)) {
            Ami::create([
                'user_id' => Auth::id(),
                'ami_id' => $id,
            ]);


        } else {
            return redirect()->route('user.index');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $users = User::all();
        $likeables = Like::all();
        $series = Serie::all();
        $ami = Ami::find($id);


        if(!$ami) {
            return redirect()->route('users.index');
        }

        return view('users.show', compact('users', 'likeables', 'series', 'ami'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ami = Ami::find($id);

        if(!$ami) {
            return redirect()->route('user.index');
        }

        return view('amis.edit', compact('ami'));
    }


    public function destroy($id)
    {
        $ami = Ami::find($id);

        $ami->delete();

        return redirect()->route('user.index')->with('success', 'Ami supprimé');
    }
}
