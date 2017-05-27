@extends('layouts.app')

<style>

    .serie {
        color:white;
    }

    .serie:hover {
        color: black;
        text-decoration: none;
    }

    .alignement{
        margin-left: 35%;
        margin-top: -0px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <h2 class="text-center">Pour jouer à Dieu c'est ici ( ADMIN ONLY )</h2>

            <div class="panel-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif

                <div class="well"><h1 class="alignement">Modifier les Séries : </h1>
                        <button class="btn btn-primary alignement"><a class="serie" href="{{route('admin.series')}}">
                             Voir les séries
                        </a></button>
                         <button class="btn btn-primary"><a class="serie" href="{{route('admin.createseries')}}">
                                 Ajouter une série
                        </a></button></div><br>

                    <div class="well"><h1 class="alignement">Modifier les Commentaires : </h1>
                    <button class="btn btn-primary alignement"><a class="serie" href="{{route('admin.comments')}}">
                            Voir les commentaires
                        </a></button></div><br>

                        <div class="well"><h1 class="alignement">Modifier les Membres : </h1>
                    <button class="btn btn-primary alignement"><a class="serie" href="{{route('admin.users')}}">
                            Voir les membres
                        </a></button></div><br>
    </div>
        </div>
    </div>
@endsection