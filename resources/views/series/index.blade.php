@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Les series</div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        @forelse($series as $serie)
                                <div class="col-xs-9 col-md-6">
                            <h1>{{ $serie->name }}</h1>
                            <p>{{ $serie->resume }}</p>
                                    @php

                                    $resume=  $serie->resume ;
                                    if(strlen($resume)>=30)
                                    {
                                        $resume=substr($resume,0,234) . " ..." ;
                                    }

                                    echo $resume;

                                    @endphp
                                <a href="{{route('series.show', ['id' => $serie->id])}}">
                                    Voir la série
                                </a>
                                </div>

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
@endsection