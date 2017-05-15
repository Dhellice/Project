<style>
    .image_serie {
        width:80%;
        margin: 0 auto;
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
                        <h1>{{$serie->name}}</h1>
                        <p>{{$serie->resume}}</p>

                            @foreach ($serie->saison as $saison)
                                <li class="list-group-item">
                                    {{ $saison->name }}
                                </li> <br>
                                @foreach ($saison->episode as $episode)
                                    <li class="list-group-item">
                                        <a href="{{route('episodes.show', ['id' => $episode->id])}}"> {{ $episode->name }} </a>
                                    </li>
                                @endforeach
                                <br><br>
                            @endforeach

                            <h1>Personnages</h1>
                            @foreach ($serie->personnage as $personnage)
                                <img src="{{ asset('img/' . $personnage->image) }}">

                                <li class="list-group-item">
                                    {{ $personnage->acteur }} as {{ $personnage->name }}
                                </li> <br>
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
                                    @foreach ($serie->comments as $comment)
                                        <li class="list-group-item">
                                            <strong>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </strong>
                                            {{ $comment->message }}<br>
                                            @if (Auth::user()->id == $comment->user_id)
                                            <a href="{{route('comments.edit', ['id' => $comment->id])}}">
                                                Modifier le commentaire
                                            </a>
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

