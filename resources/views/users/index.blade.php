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
                        <h1>Profil</h1>

                            <img src="/img/avatars/{{ Auth::user()->avatar }}" style="width:150px; height:150px; float:left; border-radius: 50%; margin-right:25px">
                                <h2>{{Auth::user()->name}}</h2>
                            <p>{{Auth::user()->email}}</p>
                             <p>{{Auth::user()->created_at}}</p>

<br>                    <form enctype="multipart/form-data" action="user" method="POST">
                                <label>Update Profile Image</label>
                                <input type="file" name="avatar">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="pull-right btn btn-sm btn-primary">
                            </form>

                        <h3> Séries Préférées :</h3>
                        @foreach ($likeables as $likeable)
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


                        <h3> Amis :</h3>

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


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
