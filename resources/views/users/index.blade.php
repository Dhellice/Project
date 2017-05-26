@extends('layouts.app')
<style>
    .well{
        width: 190px;
        height: 190px;
        background-color: #a94442 !important;
    }
    .image{
    }
    .info{
        margin-top: 2%;
    }
    .alignement{
        display: inline-block;
    }

    br{
        content: "";
        display: block;
        margin-bottom: -1.6em;
    }

    hr.style {
        border-top: 1px solid #8c8b8b;
        text-align: center;
        width: 300px;
        margin-right: 65%;
    }
    hr.style:after {
        content: '§';
        display: inline-block;
        position: relative;
        top: -14px;
        padding: 0 10px;
        background: #FFFFFF;
        color: #8c8b8b;
        font-size: 18px;
        -webkit-transform: rotate(60deg);
        -moz-transform: rotate(60deg);
        transform: rotate(60deg);
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-12" style="margin-left: 15%;">
            <div class="col-md-4 image">
                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        <h1>Mon Profil :</h1>
                            <div class="well">
                                <img src="/img/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius: 50%; margin-right:25px">
                            </div>
                    </div>
            </div>
                <div class="col-md-8 info">
                    <h1>Mes Informations :</h1>
                    <h3 class="alignement">Nom : </h3> <h2 class="alignement">{{Auth::user()->name}}</h2><hr class="style"><br>
                    <h3 class="alignement">E-Mail : </h3><p class="alignement">{{Auth::user()->email}}</p><hr class="style"><br>
                    <h3 class="alignement">Date de création : </h3><p class="alignement">{{Auth::user()->created_at}}</p>
                </div>
        </div>
    </div>
<br>
    <div class="container" style="margin-top: 5%; margin-left: 16.5%;">
    <div class="row">
        <div class="col-md-12">
        <form enctype="multipart/form-data" action="user" method="POST">
            <label>Mettre à jour mon image de profil : </label>
            <input type="file" name="avatar">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"><hr class="style" style="margin-right: 100%;">
            <input type="submit" class="btn btn-sm btn-primary">
        </form>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="margin-left: 12%;">
                <div class="col-md-6">
                    <h3> Mes Séries Préférées :</h3>
                   <ul>
                       <li>@foreach ($likeables as $likeable)
                        @if (Auth::check())
                            @if (Auth::user()->id == $likeable->user_id)
                                @foreach ($series as $serie)
                                    @if ($serie->id == $likeable->likeable_id)
                                                        {{ $serie->name }} <br>
                                    @endif
                                @endforeach
                            @endif
                        @else
                        @endif
                    @endforeach
                       </li>
                   </ul>
                </div>
                <div class="col-md-6">
                    <h3> Mes Amis :</h3>
                    @foreach ($amis as $ami)
                        @if (Auth::check())
                            @if (Auth::user()->id == $ami->user_id)
                                @foreach ($users as $user)
                                    @if ($user->id == $ami->ami_id)
                                        <a class="btn btn-default navbar-btn" href="{{route('ami.show', ['id' => $ami->id])}}}">{{ $user->name }}</a>
                                    @endif
                                @endforeach
                            @endif
                        @else
                        @endif
                    @endforeach
                @endsection
                </div>
            </div>
        </div>
    </div>