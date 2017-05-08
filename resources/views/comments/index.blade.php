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
                        @forelse($comments as $comment)
                            <h1>{{ $comment->message }}</h1>
                            <a href="{{route('comments.show', ['id' => $comment->id])}}">
                                Voir mon commentaire
                            </a>
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
