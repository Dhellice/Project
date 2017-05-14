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
                        <li class="list-group-item"><h1>{{$episode->name}}</h1> </li>
                            <li class="list-group-item"><p>{{$episode->resume}}</p></li>

                        <hr>

                            <a href="{{route('series.index')}}">Retour</a>
                            <a class="btn btn-primary" href="{{route('episodes.show', ['id' => $episode->id - 1])}}"> Article précédent </a>
                            <a class="btn btn-primary" href="{{route('episodes.show', ['id' => $episode->id + 1])}}"> Article suivant </a>
                        <hr>


                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
