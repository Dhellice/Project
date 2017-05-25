@extends('layouts.app')
<style>
    .row{
        margin-left: 10px;
    }

</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-heading">Les series de la catégorie {{$categorie->name}}</div>
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
    {{$categorie->name}}
    @foreach ($categorie->serie as $serie)
        <li class="list-group-item menuderoulant2">
            <a href="{{route('series.show', ['id' => $serie->id])}}"> {{ $serie->name }} </a>
        </li>
        </li>
    @endforeach

        </div>
@endsection