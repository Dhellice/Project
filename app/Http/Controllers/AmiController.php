<?php

namespace App\Http\Controllers;

use App\User;
use App\Ami;
use Illuminate\Support\Facades\Auth;

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
        $existing_ami = Ami::withTrashed()->whereAmiId($id)->whereUserId(Auth::id())->first();

        if (is_null($existing_ami)) {
            Ami::create([
                'user_id' => Auth::id(),
                'ami_id' => $id,
            ]);


        } else {
            return redirect()->route('user.index');
        }
    }
}
