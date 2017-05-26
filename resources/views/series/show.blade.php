<style>
    .image_serie {
        width:80%;
        margin: 0 auto;
    }
    .title{
        font-size: 50px;
        text-align: center;
    }
    .perso{
        display: inline-block;
        margin-top: 10px;
        text-align: center;
        margin-left: auto;
        margin-right: auto;
    }
    .image_perso{
        margin-left: auto;
        margin-right: auto;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
    #noms{
        width: 170px;
        font-size: 10px;
    }

    .menuderoulant {
        padding:0;
        margin:0;
        list-style:none;
    }

    .menuderoulant1{
        position: relative;
        background:#EFEFEF;
        border-radius: 6px;
        margin-bottom:2px;
        box-shadow: 3px 3px 3px #999;
        border:solid 1px #333A40
    }

    .menuderoulant2 {
        position: absolute;
        left:-999em;
    }

    .menuderoulant:hover .menuderoulant2 {
        top: 0;
        left: 0;
    }

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
                            <img class="image_serie img-responsive" src="{{ asset('img/' . $serie->image) }}">
                        <h1 class="title">{{$serie->name}}</h1>
                            <h3> Nombre de likes : {{ $nbrelikes }}</h3>
                            <h3> Note de la série :</h3>
                                @if($nombre > 0)
                                        @if(($somme / $nombre) > 4.5)
                                            ★★★★★
                                            (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                        @elseif(($somme / $nombre) > 3.5)
                                             ★★★★
                                    (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                        @elseif(($somme / $nombre) > 2.5)
                                            ★★★
                                    (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                        @elseif(($somme / $nombre) > 1.5)
                                            ★★
                                    (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                        @elseif(($somme / $nombre) > 0.5)
                                            ★
                                    (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                            @else
                                            Inférieur à 0.5
                                    (Note moyenne : {{$somme / $nombre}} -- Nombre de votes : {{$nombre}})
                                            @endif
                                    @else
                                    {{ "La moyenne de cette série n'est pas disponible" }}
                                    @endif<br>
                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_share_toolbox_fxn8"></div>
                            <br>

                                    <p>{{$serie->resume}}</p>

                            @foreach ($serie->saison as $saison)
                                <ul class="list-group menuderoulant">

                                    <li class="list-group-item menuderoulant1">
                                            {{ $saison->name }}
                                         <br>
                                        @foreach ($saison->episode as $episode)
                                            <li class="list-group-item menuderoulant2">
                                                <a href="{{route('episodes.show', ['id' => $episode->id])}}"> {{ $episode->name }} </a>
                                            </li>
                                        </li>
                                        @endforeach
                                    <br><br>
                                </ul>
                            @endforeach

                            <select>
                                @foreach ($serie->saison as $saison)
                                    <option onselect="episodes()"> {{$saison->name}}</option>
                                @endforeach
                            </select>
                            
                            <script>

                            </script>

                            <script>
                                function episodes(){

                                }
                            </script>


                            @if(Auth::check())

                                        <a class="btn btn-primary navbar-btn" href="{{ route('serie.like', $serie->id) }}">Aimer la serie</a><br>


                                <div class="rating" >
                                    <h3>Noter la série</h3>
                                    <form id="test" method="POST" action="/series/{{ $serie->id }}/notes" onchange="document.getElementById('test').submit();">
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


                            <h1>Personnages</h1>
                            @foreach ($serie->personnage as $personnage)
                                <div class="perso">
                                <img class="image_perso" src="{{ asset('img/' . $personnage->image) }}">

                                <li class="list-group-item" id="noms">
                                    {{ $personnage->acteur }} <br> {{ $personnage->name }}
                                </li></div>
                            @endforeach


                        <hr>
                            <a class="btn btn-default navbar-btn" href="{{route('series.index')}}">Retour</a>
                            <a class="btn btn-primary" href="{{route('series.show', ['id' => $serie->id - 1])}}"> Série précédente </a>
                            <a class="btn btn-primary" href="{{route('series.show', ['id' => $serie->id + 1])}}"> Série suivante </a>

                        <div class="card">
                            <div class="card-block">
                                @if(Auth::check())
                                        <form method="POST" action="/series/{{ $serie->id }}/comments">

                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                    <textarea name="message" placeholder="Votre commentaire." class="form-control">

                                                    </textarea>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Ajouter</button>
                                            </div>
                                        </form>
                                @else
                                    <h3>Veuillez vous connecter pour écrire un commentaire </h3>
                                @endif
                            </div>
                        </div>

                        <hr>

                            <div class="comments">
                                <ul class="list-group">
                                    <h3> Nombre de commentaires : {{ $nbrecomments }}</h3>
                                    @foreach ($serie->comments as $comment)
                                        <li class="list-group-item">
                                            <strong>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </strong>
                                            {{ $comment->message }}<br>
                                            @if (Auth::check())
                                                    @if (Auth::user()->id == $comment->user_id)
                                                    <a href="{{route('comments.edit', ['id' => $comment->id])}}">
                                                        Modifier le commentaire
                                                    </a>
                                                        @endif
                                                @else
                                            @endif
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

