@extends('layouts.app')

<style>

    .user {
        color:white;
    }

    .user:hover {
        color: black;
        text-decoration: none;
    }
</style>

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
                        @forelse($users as $user)
                                <h2>{{$user->name}}</h2>
                                <p>{{$user->email}}</p>
                                <p>{{$user->created_at}}</p>

                            <button class="btn btn-primary"><a class="user" href="{{route('admin.editusers', [$user->id])}}">
                                    Modifier l'utilisateur
                                </a></button>
                            <button class="btn btn-primary"><a class="user" href="{{route('admin.destroyusers', ['id' => $user->id])}}">
                                    Supprimer l'utilisateur
                                </a></button>
                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <div class="text-center">
                        {{$users->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
