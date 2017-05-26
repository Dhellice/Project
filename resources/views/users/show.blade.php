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


                        <div class="comments">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <strong>
                                    @foreach($users as $user)
                                            @if ($user->id == $ami->ami_id)
                                                <img src="/img/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius: 50%; margin-right:25px">
                                        <h2>{{$user->name}}</h2>
                                        <p>{{$user->created_at}}</p>

                                    </strong>
                                    <h3> Séries Préférées :</h3>
                                    @foreach ($likeables as $likeable)
                                            @if ($user->id == $likeable->user_id)
                                                @foreach ($series as $serie)
                                                    @if ($serie->id == $likeable->likeable_id)
                                                        {{ $serie->name }} <br>
                                                    @endif
                                                @endforeach
                                            @endif
                                    @endforeach<br>


                                    <a class="btn btn-primary" href="{{route('ami.edit', ['id' => $ami->id])}}">
                                        Supprimer des amis </a>
                                        @endif
                                    @endforeach
                                </li>

                            </ul>
                        </div>


                        <hr>



                        <a class="btn btn-default navbar-btn" href="{{route('user.index')}}">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection