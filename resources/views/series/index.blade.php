@extends('layouts.app')
<style>
    .block {
        height:300px;
    }

    .serie {
        color:white;
    }

    .serie:hover {
        color:black;
        text-decoration:none;
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Les series</div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        @forelse($series as $serie)
                                <div class="col-xs-9 col-md-6 block">
                                <h1>{{ $serie->name }}</h1>
                                    <p>@php
                                            header('Content-type: text/html; charset=UTF-8');
                                                    $resume=  $serie->resume ;
                                                    if(strlen($resume)>=33)
                                                    {
                                                    //on "bride" notre titre a 30 caracteres par exemple
                                                        $resume=substr($resume,0,230);

                                                    //on recupere la derniere position de l'espace, ici $espace=28
                                                        $espace=strrpos($resume, ' ');

                                                    //puis nous rebridons notre titre a 28 caracteres (donc juste avant l'espace) et nous rajoutons nos trois petits points
                                                        $resume=substr($resume,0,$espace)." ...";

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
                    </div>
                    <div class="text-center">
                        {{$series->links()}}
                    </div>
                </div>
        </div>
    </div>
@endsection