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

                                            $resume=  $serie->resume ;
                                            if(strlen($resume)>=200)
                                            {
                                            //on "bride" notre titre a 30 caracteres par exemple
                                            $resume=substr($resume,0,800);

                                            //on recupere un tableau contenant chaque mot
                                            $mot=str_word_count($resume, 1);

                                            //et on affiche les 4 premiers mots
                                            foreach($mot as $key => $mots)
                                            {
                                            if($key<50)
                                            {
                                            echo $mots." ";
                                            }
                                            }

                                            }

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