@extends('layouts.app')

<style>

    .comment {
        color:white;
    }

    .comment:hover {
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
                        @forelse($comments as $comment)
                            <h1>{{ $comment->message }}</h1>

                                <button class="btn btn-primary"><a class="comment" href="{{route('admin.editcomments', [$comment->id])}}">
                                Modifier le commentaire
                                 </a></button>
                                <button class="btn btn-primary"><a class="comment" href="{{route('admin.destroycomments', ['id' => $comment->id])}}">
                                        Supprimer le commentaire
                                    </a></button>
                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <div class="text-center">
                        {{$comments->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
