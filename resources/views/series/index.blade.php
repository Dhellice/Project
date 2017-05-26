@extends('layouts.app')
<style>
    .row{
        margin-left: 10px;
    }

    .block{
        padding: 20px;
    }

    .serie {
        color:white;
    }

    .serie:hover {
        color:black;
        text-decoration:none;
    }

    .title{
        text-align: center;
    }
    .image{
        width: 100%;

    }
    .list-group{
        text-align: center;
    }
    h1{
        text-align: center;
    }
    .mg-image img {
        -webkit-transition: all 1s ease; /* Safari and Chrome */
        -moz-transition: all 1s ease; /* Firefox */
        -o-transition: all 1s ease; /* IE 9 */
        -ms-transition: all 1s ease; /* Opera */
        transition: all 1s ease;
        max-width: 100%;
    }
    .mg-image:hover img {
        -webkit-transform:scale(1.25); /* Safari and Chrome */
        -moz-transform:scale(1.25); /* Firefox */
        -ms-transform:scale(1.25); /* IE 9 */
        -o-transform:scale(1.25); /* Opera */
        transform:scale(1.25);
    }
    .mg-image {
        overflow: hidden;
    }

    .button-two {
        border-radius: 4px;
        background-color:#a94442 !important;
        border: #a94442 !important;
        border: none;
        width: 140px;
        transition: all 0.5s;
    }


    .button-two span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
    }

    .button-two span:after {
        content: '»';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
    }

    .button-two:hover span {
        padding-right: 25px;
    }

    .button-two:hover span:after {
        opacity: 1;
        right: 0;
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="panel-heading"><h1>Les series</h1></div>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
            <ul class="list-group">
            @foreach($categories as $categorie)
                    <button class="btn btn-primary"><a class="serie" href="{{route('categories.show', ['id' => $categorie->id])}}">{{$categorie->name}}</a></button>
            @endforeach
            </ul>
            </div>
                        @forelse($series as $serie)

                                <div class="col-xs-5 col-md-4 block well" style="">
                                <h3 class="title">{{ $serie->name }}</h3>
                                    <div class="mg-image"><img class="image" src="{{ asset('img/' . $serie->image) }}"></div>
                                    <p><br>   @php
                                           // header('Content-type: text/html; charset=UTF-8');
                                                    $resume = utf8_encode(utf8_decode($serie->resume)) ;
                                                    if(strlen($resume)>=2)
                                                    {
                                                    //on "bride" notre titre a 30 caracteres par exemple
                                                        $resume=substr($resume,0,200);

                                                    //on recupere la derniere position de l'espace, ici $espace=28
                                                        $espace=strrpos($resume, ' ');

                                                    //puis nous rebridons notre titre a 28 caracteres (donc juste avant l'espace) et nous rajoutons nos trois petits points
                                                        $resume=substr($resume,0,$espace)."...";

                                                    }

                                                    echo $resume;

                                        @endphp</p>
                                <br><button class="btn btn-primary button-two" style="margin-left: 28%;"><a class="serie" href="{{route('series.show', ['id' => $serie->id])}}">
                                            <span>Voir la série</span>
                                </a></button>
                                </div>
                        @empty
                            Rien du tout
                        @endforelse
    </div>
    <div class="text-center">
        {{$series->links()}}
    </div>
@endsection