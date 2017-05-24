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

                            <h2>{{Auth::user()->name}}</h2>
                            <p>{{Auth::user()->email}}</p>
                             <p>{{Auth::user()->created_at}}</p>

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
                                                <a class="btn btn-default navbar-btn" href="{{route('user.show', ['id' => $user->id])}}}">{{ $user->name }}</a> <br>
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
