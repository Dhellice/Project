<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{


    public function likeSerie($id)
    {
        $existing_like = Like::withTrashed()->whereLikeableId($id)->whereUserId(Auth::id())->first();
        $series = Serie::find($id);

        if(Auth::check() && !$existing_like) {
            // here you can check if product exists or is valid or whatever
            $this->handleLike('App\Serie', $id);
            return redirect()->route('series.show', ['id' => $series->id])->with('success', "Vous avez liké la serie");
        }

        elseif($existing_like){
            return redirect()->route('series.show', ['id' => $series->id])->with('success', 'Vous avez déjà aimé la série');
        }

        else {
            return redirect()->route('series.show', ['id' => $series->id])->with('success', 'Vous devez être connecté pour aimer une série');
        }
    }

    public function handleLike($type, $id)
    {
                $series = Serie::find($id);
                $existing_like = Like::withTrashed()->whereLikeableType($type)->whereLikeableId($id)->whereUserId(Auth::id())->first();

                if (is_null($existing_like)) {
                    Like::create([
                        'user_id' => Auth::id(),
                        'likeable_id' => $id,
                        'likeable_type' => $type,
                    ]);


                } else {
                    return redirect()->route('series.index');
                }
    }
}