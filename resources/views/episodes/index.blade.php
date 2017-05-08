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

                        @forelse($episodes as $episode)
                            <h1>{{ $episode->name }}</h1>
                            <p>{{ $episode->resume }}</p>
                            <a href="{{route('episodes.show', ['id' => $episode->id])}}">
                                Voir l'épisode
                            </a>

                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <div class="text-center">
                        {{$episodes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection