<?php

namespace App\Http\Controllers;

use Image;
use Auth;
use App\Like;
use App\Serie;
use App\User;
use App\Ami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Serie::all();
        $users = User::all();
        $likeables = Like::all();
        $amis = Ami::all();

        return view('users.index', ['users' => $users, 'likeables' => $likeables, 'series' => $series, 'amis' => $amis]);

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
        $likeables = Like::all();
        $series = Serie::all();

        if(!$user) {
            return redirect()->route('users.index');
        }

        return view('users.show', compact('user', 'likeables', 'series'));
    }

    public function update_avatar(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300, 300)->save( public_path('img/avatars/' . $filename ));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        $series = Serie::all();
        $users = User::all();
        $likeables = Like::all();
        $amis = Ami::all();
        return view('users.index', array('user' => Auth::user()), ['users' => $users, 'likeables' => $likeables, 'series' => $series, 'amis' => $amis] );
    }

}
