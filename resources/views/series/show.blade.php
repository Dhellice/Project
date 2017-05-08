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

                        <h1>{{$serie->name}}</h1>
                        <p>{{$serie->resume}}</p>

                        <hr>


                        <div class="card">
                            <div class="card-block">
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
                            </div>
                        </div>

                        <a class="btn btn-default navbar-btn" href="{{route('series.index')}}">Retour</a>
                        <hr>

                            <div class="comments">
                                <ul class="list-group">
                                    @foreach ($serie->comments as $comment)
                                        <li class="list-group-item">
                                            <strong>
                                                {{ $comment->created_at->diffForHumans() }}
                                            </strong>
                                            {{ $comment->message }}
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

