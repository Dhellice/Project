@extends('layouts.app')

<style>

    .serie {
        color:white;
    }

    .serie:hover {
        color: black;
        text-decoration: none;
    }
</style>
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-heading">Page Admin</div>

            <div class="panel-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif

                <h1> Les Séries</h1>
                        <button class="btn btn-primary"><a class="serie" href="{{route('admin.series')}}">
                             Voir les séries
                        </a></button>
                         <button class="btn btn-primary"><a class="serie" href="{{route('admin.createseries')}}">
                                 Ajouter une série
                        </a></button>

                    <h1> Les Commentaires</h1>
                    <button class="btn btn-primary"><a class="serie" href="{{route('admin.comments')}}">
                            Voir les commentaires
                        </a></button>

                    <h1> Les membres</h1>
                    <button class="btn btn-primary"><a class="serie" href="{{route('admin.users')}}">
                            Voir les membres
                        </a></button>
    </div>
        </div>
    </div>
@endsection