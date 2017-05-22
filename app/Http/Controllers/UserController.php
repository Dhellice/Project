<?php

namespace App\Http\Controllers;

use App\Like;
use App\Serie;
use App\User;
use App\Ami;
use Illuminate\Http\Request;
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



}
