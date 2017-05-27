@extends('layouts.app')
<style>
 body{
     background-color: #32608e !important;

 }
</style>
@section('content')
    <body>
                    <h2 class="text-center" style="margin-top: 6% !important; color: white;">Profil de l'ami : </h2>
                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        <div class="comments" style="margin-left: 10%; margin-right: 10%;">
                            <ul class="list-group" >
                                <li class="list-group-item">
                                    <strong>
                                    @foreach($users as $user)
                                            @if ($user->id == $ami->ami_id)
                                                <img  src="/img/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius: 50%; margin-right:25px; margin-left: 35%;">
                                        <h2  style="margin-left: 50%;">{{$user->name}}</h2>
                                        <p  style="margin-left: 50%;">{{$user->created_at}}</p>

                                    </strong>
                                    <h3> Ses Séries Préférées :</h3>
                                    @foreach ($likeables as $likeable)
                                            @if ($user->id == $likeable->user_id)
                                                @foreach ($series as $serie)
                                                    @if ($serie->id == $likeable->likeable_id)
                                                        {{ $serie->name }} <br>
                                                    @endif
                                                @endforeach
                                            @endif
                                    @endforeach<br>


                                    <a  style="margin-left: 35%;" class="btn btn-primary" href="{{route('ami.edit', ['id' => $ami->id])}}">
                                        Supprimer de mes amis </a>
                                        @endif
                                    @endforeach
                                </li>

                            </ul>
                        </div>
                        <hr>
                        <a class="btn btn-default navbar-btn" href="{{route('user.index')}}">Retour</a>
                    </div>
    </body>
@endsection