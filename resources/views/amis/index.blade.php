@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-heading"><h1>Ajoutez aux amis</h1></div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif


            @forelse($users as $user)
                @if (Auth::user()->id != $user->id )

                <div class="col-xs-5 col-md-4 block">
                    <img src="/img/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius: 50%; margin-right:25px">
                    <h3 class="title">{{ $user->name }}</h3>
                    <br>
                    @if(Auth::check())
                        <a class="btn btn-primary navbar-btn" href="{{ route('user.ami', $user->id) }}">Ajouter en ami</a><br>
                    @endif
                </div>
                @endif


            @empty
                Rien du tout
            @endforelse

        </div>
    </div>
    @endsection