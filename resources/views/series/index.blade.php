@extends('layouts.app')
<style>
    .row{
        margin-left: 10px;
    }

    .block{
        padding: 20px;
    }

    .serie {
        color:white;
    }

    .serie:hover {
        color:black;
        text-decoration:none;
    }

    .title{
        text-align: center;
    }
    .image{
        width: 100%;

    }
    .list-group{
        text-align: center;
    }
    h1{
        text-align: center;
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-heading"><h1>Les series</h1></div>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
            <ul class="list-group">
            @foreach($categories as $categorie)
                    <button class="btn btn-primary"><a class="serie" href="{{route('categories.show', ['id' => $categorie->id])}}">{{$categorie->name}}</a></button>
            @endforeach
            </ul>
            </div>
                        @forelse($series as $serie)

                                <div class="col-xs-5 col-md-4 block">
                                <h3 class="title">{{ $serie->name }}</h3>
                                    <img class="image" src="{{ asset('img/' . $serie->image) }}">
                                    <p><br>   @php
                                           // header('Content-type: text/html; charset=UTF-8');
                                                    $resume = utf8_encode(utf8_decode($serie->resume)) ;
                                                    if(strlen($resume)>=2)
                                                    {
                                                    //on "bride" notre titre a 30 caracteres par exemple
                                                        $resume=substr($resume,0,200);

                                                    //on recupere la derniere position de l'espace, ici $espace=28
                                                        $espace=strrpos($resume, ' ');

                                                    //puis nous rebridons notre titre a 28 caracteres (donc juste avant l'espace) et nous rajoutons nos trois petits points
                                                        $resume=substr($resume,0,$espace)."...";

                                                    }

                                                    echo $resume;

                                        @endphp</p>
                                <br><button class="btn btn-primary"><a class="serie" href="{{route('series.show', ['id' => $serie->id])}}">
                                    Voir la série
                                </a></button>
                                </div>
                        @empty
                            Rien du tout
                        @endforelse

                    <div class="text-center">
                        {{$series->links()}}
                    </div>
    </div>
@endsection