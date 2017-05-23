<style>

    label {
        color:lightblue;
    }

    label:hover {
        color:darkslateblue;
    }

</style>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        <li class="list-group-item"><h1>{{$episode->name}}</h1> </li> <br>
                            <h2> Note de l'épisode :</h2>
                            @if($nombre > 0)
                                @if(($somme / $nombre) > 4.5)
                                    ★★★★★
                                    ({{$somme / $nombre}})
                                @elseif(($somme / $nombre) > 3.5)
                                    ★★★★
                                    ({{$somme / $nombre}})
                                @elseif(($somme / $nombre) > 2.5)
                                    ★★★
                                    ({{$somme / $nombre}})
                                @elseif(($somme / $nombre) > 1.5)
                                    ★★
                                    ({{$somme / $nombre}})
                                @elseif(($somme / $nombre) > 0.5)
                                    ★
                                    ({{$somme / $nombre}})
                                @else
                                    Inférieur à 0.5
                                    ({{$somme / $nombre}})
                                @endif
                            @else
                                {{ "La moyenne de cet épisode n'est pas disponible" }}
                            @endif<br> <br>

                            <li class="list-group-item"><p>{{$episode->resume}}</p></li>
                            <hr>

                            @if(Auth::check())
                                <div class="rating" >
                                    <h3>Noter la série</h3>
                                    <form id="test" method="POST" action="/episodes/{{ $episode->id }}/notes" onchange="document.getElementById('test').submit();">
                                        {{csrf_field()}}
                                        <label for="1">★</label>
                                        <input name="note" type="radio" value="1" id="1" class="etoile" style="visibility:hidden">

                                        <label for="2" >★</label>
                                        <input name="note" type="radio" value="2" id="2" class="etoile" style="visibility:hidden">

                                        <label for="3">★</label>
                                        <input name="note" type="radio" value="3" id="3" class="etoile"  style="visibility:hidden">

                                        <label for="4">★</label>
                                        <input name="note" type="radio" value="4" id="4" class="etoile"  style="visibility:hidden">

                                        <label for="5">★</label>
                                        <input name="note" type="radio" value="5" id="5" class="etoile"  style="visibility:hidden">
                                    </form>
                                </div>
                            @endif

                            <a href="{{route('series.index')}}">Retour</a>
                            <a class="btn btn-primary" href="{{route('episodes.show', ['id' => $episode->id - 1])}}"> Épisode précédent </a>
                            <a class="btn btn-primary" href="{{route('episodes.show', ['id' => $episode->id + 1])}}"> Épisode suivant </a>
                        <hr>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
