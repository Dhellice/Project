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

                        @forelse($series as $serie)
                            <h1>{{ $serie->name }}</h1>
                            <p>{{ $serie->resume }}</p>
                                <a href="{{route('series.show', ['id' => $serie->id])}}">
                                    Voir la série
                                </a>

                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <div class="text-center">
                        {{$series->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection