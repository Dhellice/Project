@extends('layouts.app')
<style>
    .row{
        margin-left: 10px;
    }
    .image{
        width: 100%;

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
    .panel-heading{
        text-align: center;
    }

</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-heading"><h1>Les series de la catégorie {{$categorie->name}}</h1></div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
            <br>
                    <button class="btn btn-primary button" onclick="history.go(-1)" target="_blank" style="border: none!important;">
                        <span>Retour</span>
                    </button>
            <br>
    <h2>{{$categorie->name}}</h2>
    @foreach ($categorie->serie as $serie)
                <div class="col-xs-5 col-md-4 block">
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
    @endforeach

        </div>
@endsection