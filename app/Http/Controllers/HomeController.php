<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('home');
    }

    public function welcome(Request $request)
    {
        // On réinitialise le session au moment
        // où l'utilisateur revient à la page welcome
        Auth::logout();
        Session::flush();
        return view('welcome');
    }
}
